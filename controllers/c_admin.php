<?php
// Gữi/nhận dữ liệu thông qua model
require_once './models/m_user.php';
// Hiển thị dữ liệu thông qua view
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'home':
             // lấy dữ liệu
            // hiển thị dữ liệu  
            $view_name='admin_home';
            break;
        case 'categories':
            include_once 'models/m_admin.php';
            // lấy dữ liệu  
            // $get_Category = get_Categoris(0,4);
            if(isset($_GET['page'])){
                $count_Categoris = count_Categoris()['soluong'];
                $number_Page = ceil($count_Categoris / 4);
                $get_Category = get_Categoris(($_GET['page']-1)*4,4);
                $page_nows = $_GET['page'];      
            }
            // Cập nhật dữ liệu
            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $id_category = $_GET['id'];
                $getidCategories = getidCategories($id_category);
            
                if (!$getidCategories) {
                    // Xử lý trường hợp không tìm thấy danh mục
                    // Ví dụ: thông báo lỗi hoặc chuyển hướng
                }
            
                if (isset($_POST['submit'])) {
                    $name_cg = $_POST['name_cg'] ?? '';
                    $description_cg = $_POST['description_cg'] ?? '';
                    
                    // Thêm các bước kiểm tra và làm sạch dữ liệu ở đây
            
                    update_Category($id_category, $name_cg, $description_cg);
                    // Xử lý sau khi cập nhật thành công, ví dụ: chuyển hướng hoặc thông báo
                    header('Location:?mod=admin&act=categories&page='.$page_nows);
                }   
            }
          
            $categories = getCategoriesSorted();
            

            //$getidCategories = getidCategories($_GET['id']);
            // hiển thị dữ liệu  
            $view_name='admin_categories';
            break;
        case 'client':
             // lấy dữ liệu
            // hiển thị dữ liệu  
            $user_list = getUser();
           
            $view_name='admin_client';
            break;
        case 'client-edit':
            $view_name = 'admin_client_edit';
                if(@$_GET['id']) {
                $idUser = $_GET['id'];
                $userInfo = getUserInfo($idUser);
              }
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
