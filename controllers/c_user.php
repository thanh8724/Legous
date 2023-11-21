<?php
    session_start();
    ob_start();
    // Gữi/nhận dữ liệu thông qua models
    // Hiển thị dữ liệu thông qua view
    include_once 'models/m_user.php';
    if(isset($_GET['act'])){
        if(isset($_SESSION['user'])) {
            extract($_SESSION['user']);
            $id_user =  $_SESSION['id_user'];
        }
        $checkUses = checkAccount($id_user);
        $avatar_user = '';
        if(is_array($checkUses)) {
            extract($checkUses);
            if($img == "") {
                $avatarImage_user = 'avatar-none.png';
            }else if($img != '') {
                $avatarImage_user = $img;
            }
        }
        switch ($_GET['act']){
            case 'general':
                // lấy dữ liệu
                include_once 'models/m_user.php';
                // hiển thị dữ liệu
                $view_name = 'general';
                # code bên trang v_general.php nha... <3
                break;

            case 'editprofile':
                // lấy dữ liệu
                include_once 'models/m_user.php';
                // hiển thị dữ liệu
                $view_name = 'editprofile';
                # code bên trang v_editprofile.php nha... <3
                break;

            case 'password':
                include_once 'models/m_user.php';
                $view_name = 'user_password';
                break;

            case 'address':
                include_once 'models/m_user.php';
                // hiển thị dữ liệu
                $view_name = 'address';
               # qua v_address.php kiếm code đi fen....
                break;

            case 'edit-address':
                include_once 'models/m_user.php';
                $view_name = 'form-editAddress';
                break;

            case 'delete-address':
                include_once 'models/m_user.php';
                $view_name = 'form-editAddress';
               # xóa địa chỉ
                if(isset($_GET['id-address']) && ($_GET['id-address']) > 0) {
                    $id_address = $_GET['id-address'];
                    delete_address($id_address);
                    header('location: ?mod=user&act=address');
                }
                break;
            
            case 'order-history':
                include_once 'models/m_user.php';
                $view_name = 'user_orderHistory';
                $id_user = $_SESSION['id_user'];
                $order_history = get_orderHistory($id_user);
                break;
        
            case 'order-detail':
                include_once 'models/m_user.php';
                $view_name = 'user_orderDetail';
                if (isset($_GET['id'])) {
                    $id_order = ($_GET['id']);
                    $order = get_order($id_order);
                    $product_order = get_product_order($id_order);
                    // var_dump($product_order);
                }
                break;

            case 'logOut-account':
                include_once 'models/m_user.php';
                if(isset($_GET['id-account'])) {
                    $id_user = $_GET['id-account'];
                    extract(checkAccount($id_user));
                }
                
                // # lấy id thiết bị người dùng
                // $id_deviceUser = $_SERVER['HTTP_USER_AGENT'];
                // # tạo cookie
                // $cookie_account = array(
                //     'name' => 'remember_account',
                //     'value' => json_encode(array('username' => $username, 'email' => $email, 'avatar' => $img)),
                //     'name_device' => $id_deviceUser
                //   );
                // setcookie($cookie_account['name'], $cookie_account['value'], $cookie_account['name_device'], '/', '', true);
                // session_destroy();
                // header('location: ?mod=page&act=login');
                break;

            case 'delete-account':
                include_once 'models/m_user.php';
                $view_name = 'user-deleteAccount';
                break;
            default:
                break;
        }
        require_once 'views/v_user_layout.php';
}
?>