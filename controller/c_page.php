<?php 
    // Gữi/nhận dữ liệu thông qua model
    // Hiển thị dữ liệu thông qua view
    if(isset($_GET['act'])){
        switch ($_GET['act']){
            case 'home':
                
                // lấy dữ liệu
                include_once 'model/m_cart.php';
                
                // hiển thị dữ liệu
                $view_name = 'page_home';
                break;

            case 'cart':
                 // lấy dữ liệu
                include_once 'model/m_history.php';
                echo 'hello';

                // hiển thị dữ liệu
                $view_name = 'page_cart';
                break;

            case 'history':
                 // lấy dữ liệu
                include_once 'model/m_history.php';

                // hiển thị dữ liệu
                $view_name = 'page_history';
                break;
        

                default:
                    
                    break;
            }
            include_once 'view/v_home_layout.php';
    }
?>