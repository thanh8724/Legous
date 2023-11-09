<?php
// Gữi/nhận dữ liệu thông qua model
// Hiển thị dữ liệu thông qua view
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'login':

            // lấy dữ liệu
            include_once 'model/m_cart.php';

            // lấy sách theo chủ đề

            // hiển thị dữ liệu
            $view_name = 'book_detail';
            break;

        case 'logout':
         
 
            break;
            
        case 'register':
             // lấy dữ liệu


            // hiển thị dữ liệu  
            $view_name = 'user_register';
            break;



        default:

            break;
    }
    include_once 'view/v_home_layout.php';
}
