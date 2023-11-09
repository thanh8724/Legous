<?php 
    // Gữi/nhận dữ liệu thông qua models
    // Hiển thị dữ liệu thông qua view
    if(isset($_GET['act'])){
        switch ($_GET['act']){
            case 'home':
                // lấy dữ liệu
                include_once 'models/m_cart.php';
                
                // hiển thị dữ liệu
                $view_name = 'home';
                break;
            case 'login':
                // lấy dữ liệu
                include_once 'models/m_user.php';
                
                // hiển thị dữ liệu
                $view_name = 'login';
                break;

            case 'cart':
                 // lấy dữ liệu
                include_once 'models/m_history.php';
                // echo 'hello';

                // hiển thị dữ liệu
                $view_name = 'page_cart';
                break;

            default:
                
                break;
        }
        require_once 'views/v_user_layout.php';
}
?>