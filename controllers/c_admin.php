<?php
// Gữi/nhận dữ liệu thông qua model
// Hiển thị dữ liệu thông qua view

if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'home':
             // lấy dữ liệu
            // hiển thị dữ liệu  
            $view_name='admin_home';
            break;
        case 'categories':
            // lấy dữ liệu  
            // include_once 'models/m_categories.php';

            
            // hiển thị dữ liệu  
            $view_name='admin_categories';
            break;
        case 'client':
             // lấy dữ liệu
            // hiển thị dữ liệu  
            $view_name='admin_client';
            break;
        case 'orders':
             // lấy dữ liệu
            // hiển thị dữ liệu  
            $view_name='admin_orders';
            break;

        case 'orders-add':
             // lấy dữ liệu
            // hiển thị dữ liệu  
            $view_name='admin_orders-add';
            break;
        case 'orders-edit':
             // lấy dữ liệu
            // hiển thị dữ liệu  
            $view_name='admin_orders-edit';
            break;

        case 'orders-detail':
            $view_name='admin_orders-detail';

            break;
        case 'products':
            $view_name='admin_products';

            break;
        default:

            break;
    }
    include_once 'views/v_admin_layout.php';
}
