<?php
session_start();
ob_start();
// Gữi/nhận dữ liệu thông qua model
// Hiển thị dữ liệu thông qua view
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'addCart':
            // lấy dữ liệu
            include_once 'model/m_cart.php';
            // lấy sách theo chủ đề

            if (isset($_POST['addCart']) && $_POST['addCart']) {
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
                    "id" => $id,
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

                header('location: ?mod=cart&act=viewCart');
            }
            // hiển thị dữ liệu
            // $view_name = 'addCart';
            break;

        case 'viewCart':


            $view_name = 'viewCart';
            break;




        default:

            break;
    }
    include_once 'views/v_user_layout.php';
}
