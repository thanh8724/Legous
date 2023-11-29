<?php


define('PRODUCT_PATH', './public/assets/media/images/product/');
define('CATEGORY_PATH', './public/assets/media/images/category/');
// remove_product.php

session_start();
ob_start();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    if (isset($_SESSION['cart'])) {
        // Retrieve the JSON data from the request body
        $jsonData = file_get_contents('php://input');

        // Decode the JSON data into an associative array
        $data = json_decode($jsonData, true);

        // Access the JSON data as needed
        $productIds = $data['productIds'];

        if (isset($_SESSION['userLogin'])) {
            $idUser = $_SESSION['userLogin']['id_user'];
        }

        // Remove the products from the database
        removeProductsFromDatabase($productIds, $idUser);

        // Loop through the cart to find the product by its unique identifier (e.g., product ID)
        foreach ($productIds as $productId) {
            foreach ($_SESSION['cart'] as $key => $product) {
                if ($product['id_product'] === $productId) {
                    // Remove the product from the cart
                    unset($_SESSION['cart'][$key]);
                    break;
                }
            }
        }

        // Update cart information
        $cartInfo = updateCartInfo();

        // Generate the updated cart HTML
        $cartHtml = generateCartHtml($_SESSION['cart']);

        // Combine cart information and HTML into a single response
        $response = array(
            'cartInfo' => $cartInfo,
            'cartHtml' => $cartHtml
        );

        // Return the response as JSON
        echo json_encode($response);
        exit;
    }
}

// If the product removal fails or the request is invalid
// Return an error response
echo json_encode(['success' => false]);

function updateCartInfo()
{
    $cartTotal = 0;
    $tax = 0;
    $btnLink = "";
    $btnText =  '';
    if (count($_SESSION['cart']) > 0) {
        if (isset($_SESSION['userLogin']) && $_SESSION['userLogin']) {
            $btnLink = "?mod=cart&act=checkout";
            $btnText = 'Thanh toán ngay';
        } else {
            $btnText = 'Đăng nhập để thanh toán';
            $btnLink = "?mod=page&act=login";
        }
    } else {
        $btnLink = "?mod=page&act=home";
        $btnText = 'Tiếp tục mua sắm';
    }

    if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
        foreach ($_SESSION['cart'] as $item) {
            extract($item);
            $cartTotal += $price * $qty;
        }

        $tax = $cartTotal * 0.1;
    }

    $cartAmount = count($_SESSION['cart']);

    $cartInfo = array(
        'cartAmount' => $cartAmount,
        'cartTotal' => formatVND($cartTotal),
        'cartTotalWithTax' => formatVND($cartTotal + $tax),
        'btnLink' => $btnLink,
        'btnText' => $btnText
    );

    return $cartInfo;
}

function removeProductsFromDatabase($productIds, $userId) {
    try {
        // Get the database connection
        $conn = pdo_get_connection();

        // Prepare the SQL statement to remove the products
        $placeholders = implode(',', array_fill(0, count($productIds), '?'));
        $stmt = $conn->prepare("DELETE FROM cart WHERE id_product IN ($placeholders) AND id_user = ?");

        // Bind the product IDs and user ID as parameters
        foreach ($productIds as $index => $productId) {
            $stmt->bindValue($index + 1, $productId);
        }
        $stmt->bindValue(count($productIds) + 1, $userId);

        // Execute the deletion query
        $stmt->execute();
    } catch (PDOException $e) {
        // Handle any database errors
        // You can log the error or display a custom error message
        // For simplicity, this example just throws an exception
        throw new Exception("Failed to remove products from the database: " . $e->getMessage());
    }
}

// If the product removal fails or the request is invalid
// Return an error response
echo json_encode(['success' => false]);

// Function to generate the cart HTML
// Function to generate the cart HTML
function generateCartHtml($cart)
{
    $html = '';
    if (count($cart) > 0) {
        foreach ($cart as $item) {  
            extract($item);

            $linkToDetail = "?mod=page&act=productDetail&idProduct=$id_product";
            $deleteLink = "?mod=cart&act=deleteProduct&idProduct=$id_product";

            $imgPath = constant('PRODUCT_PATH') . $img;
            $categoryName = getCategoryById(getIdCategoryByIdProducts($id))['name'];
            $price = formatVND($item['price'] * $qty);

            $html .=
                <<<HTML
                    <!-- single cart product start -->
                    <div class="cart__product flex-between v-center g12">
                        <div class="flex g12 v-center">
                            <div class="mobile">
                                <input type="checkbox" name="product$id" id="product$id" value="$id">
                            </div>
                            <label for="product$id" class="cart__product__banner">
                                <img src="$imgPath" alt="" class="img-cover">
                            </label>
                        </div>
                        <a href="$linkToDetail" class="row g20 v-center flex-full flex-between">
                        <!-- <div class="auto-grid g20 cart__product__info"> -->
                            <div class="flex-column g12">
                                <div class="title-medium ttu cart__product__name">$name</div>
                                <div class="body-medium cart__product__category">Danh mục: $categoryName</div>
                            </div>
                            <div class="title-medium cart__product__price" data-price="$item[price]">$price</div>
                            <div class="cart__product__qty__form flex g12">
                                <button class="minus-btn icon-btn"><i class="fa-solid fa-minus" data-product-id="$id"></i></button>
                                <input class="fw-smb primary-text qty__input form__input" type="number" name="amount" id="amount" value="$qty"
                                    min="1" max="100" readonly>
                                <button class="plus-btn icon-btn"><i class="fa-solid fa-plus" data-product-id="$id"></i></button>
                            </div>
                            <a href="$deleteLink" class="icon-btn desktop remove-btn" data-product-id="$id"><i class="fal fa-times"> </i></a>
                        </a>
                    </div>
                    <!-- single cart product end -->
            HTML;
        }
    } else {
        $html =
            <<<HTML
                <div class="block tac">
                    <div class="text-38 primary-text">Giỏ hàng của bạn đang trống</div>
                    <a href="?mod=page&act=home" class="btn primary-btn rounded-100">Mua sắm ngay</a>
                </div>
            HTML;
    }
    return html_entity_decode($html);
}


function getCategoryById($idCategory)
{
    $sql = "SELECT * FROM category WHERE id = $idCategory";
    return pdo_query_one($sql);
}

function getIdCategoryByIdProducts($idProduct)
{
    $sql = "SELECT id_category FROM product WHERE id = $idProduct";
    return pdo_query_value($sql);
}

/**
 * Mở kết nối đến CSDL sử dụng PDO
 */
function pdo_get_connection()
{
    $dburl = "mysql:host=localhost;dbname=legous_db;charset=utf8";
    $username = 'root';
    $password = '';

    $conn = new PDO($dburl, $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    return $conn;
}
/**
 * Thực thi câu lệnh sql thao tác dữ liệu (INSERT, UPDATE, DELETE)
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_execute($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        return $conn->lastInsertId(); // Return the last inserted ID
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
/**
 * Thực thi câu lệnh sql truy vấn dữ liệu (SELECT)
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng các bản ghi
 * @throws PDOException lỗi thực thi câu lệnh
 */

function pdo_query($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $rows = $stmt->fetchAll();
        return $rows;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
/**
 * Thực thi câu lệnh sql truy vấn một bản ghi
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return array mảng chứa bản ghi
 * @throws PDOException lỗi thực thi câu lệnh
 */
function pdo_query_one($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return $row;
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
/**
 * Thực thi câu lệnh sql truy vấn một giá trị
 * @param string $sql câu lệnh sql
 * @param array $args mảng giá trị cung cấp cho các tham số của $sql
 * @return giá trị
 * @throws PDOException lỗi thực thi câu lệnh
 */

//Đếm số lượng của product
function pdo_query_value($sql)
{
    $sql_args = array_slice(func_get_args(), 1);
    try {
        $conn = pdo_get_connection();
        $stmt = $conn->prepare($sql);
        $stmt->execute($sql_args);
        $row = $stmt->fetch(PDO::FETCH_ASSOC);
        return array_values($row)[0];
    } catch (PDOException $e) {
        throw $e;
    } finally {
        unset($conn);
    }
}
/**
 * Thực thi câu lệnh sql truy vấn một giá trị
 * @param string $amount số tiền
 * @return giá trị tiền đã format
 */

function formatVND($amount)
{
    $formattedAmount = number_format($amount, 0, ',', '.');
    $formattedAmount .= ' đ';

    return $formattedAmount;
}

?>