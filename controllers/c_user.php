<?php 
    require '../models/m_user.php';
    if (isset($_GET['act'])) {
        switch ($_GET['act']) {
            case 'client':
                 // lấy dữ liệu
                // hiển thị dữ liệu  
                $view_name='admin_client';
                break;
            
            default:
    
                break;
        }
        include_once 'views/v_admin_layout.php';
    }
    
?>