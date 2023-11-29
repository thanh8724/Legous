<?php
session_start();
ob_start();
// Gữi/nhận dữ liệu thông qua model
// Hiển thị dữ liệu thông qua view
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'addCart':
            // lấy dữ liệu
            include_once 'models/m_cart.php';
            // lấy sách theo chủ đề
            

            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $name = $_POST['name'];
                $price = $_POST['price'];
                $img = $_POST['img'];
                $qty = $_POST['qty'];
                $id = $_POST['id'];

                $product = [
                    "name" => $name,
                    "price" => $price,
                    "img" => $img,
                    "qty" => $qty,
                    "id_product" => $id,
                ];
                
                if (!isset($_SESSION['cart']) || !is_array($_SESSION['cart']))
                    $_SESSION['cart'] = [];
                // check product appeared
                $isAvailable = false;
                $productKey = -1;

                // Loop through the cart to find the product by its unique identifier (e.g., product ID)
                foreach ($_SESSION['cart'] as $key => $value) {
                    if ($id == $key) {
                        $isAvailable = true;
                        $productKey = $key;
                        break;
                    }
                }

                if ($isAvailable) {
                    // If the product is already in the cart, update the quantity
                    $newQty = $qty + $_SESSION['cart'][$productKey]['qty'];
                    $_SESSION['cart'][$productKey]['qty'] = $newQty;
                } else {
                    // If the product is not in the cart, add it
                    $_SESSION['cart'][$id] = $product;
                }

                // After successful login
                if (isset($_SESSION['userLogin'])) {
                    // Retrieve the user ID after successful login
                    $user_id = $_SESSION['userLogin']['id_user'];

                    // Check if the session cart exists
                    if (isset($_SESSION["cart"]) && !empty($_SESSION["cart"])) {
                        // Get the products from the session cart
                        $products = $_SESSION["cart"];

                        // Loop through the products and add them to the database cart table
                        foreach ($products as $product) {
                            extract($product);
                            $totalCost = $qty * $price;

                            // Check if the product already exists in the database cart table for the user
                            $existingProduct = getProductFromDatabaseCart($user_id, $id_product);

                            if ($existingProduct) {
                                // If the product already exists, update the quantity and total cost
                                $newQty = $qty + $existingProduct['qty'];
                                $newTotalCost = $newQty * $price;
                                updateProductInDatabaseCart($user_id, $id, $newQty, $newTotalCost);
                            } else {
                                // If the product does not exist, insert it into the database cart table
                                insertCart($user_id, $id, $name, $price, $img, $qty, $totalCost);
                            }
                        }

                        // Clear the session cart
                        // $_SESSION["cart"] = array();
                    }
                }

                header('Location: ?mod=cart&act=viewCart');
            }
            break;

        case 'viewCart':
            // if (isset($_SESSION['cart'])) {
            //     // print_r($_SESSION['cart']);
            //     unset($_SESSION['cart']);
            // }
            $view_name = 'cart';
            break;

        case 'checkout':

            $view_name = 'checkout';
            break;
        case 'deleteProduct':
            if (isset($_GET['idProduct'])) {
                $idProduct = $_GET['idProduct'];

                unset($_SESSION['cart'][$idProduct]);

                if (isset($_SESSION['userLogin'])) {
                    $idUser = $_SESSION['userLogin']['id_user'];
                    removeCartProduct ($idUser, $idProduct);
                }
                
                header("Location: ?mod=cart&act=viewCart");
                exit();
            }
            break;
        default:

            break;
    }
    include_once 'views/v_user_layout.php';
}
