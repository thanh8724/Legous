<?php
session_start();
ob_start();
// Gữi/nhận dữ liệu thông qua model
require_once './models/m_user.php';
require_once './models/m_comment.php';
// Hiển thị dữ liệu thông qua view
if($_SESSION['role'] == 0 || !empty($_SESSION['userLogin'])) {
    header("Location: ?mod=page&act=home");
    exit();
}
if (isset($_GET['act'])) {
    switch ($_GET['act']) {
        case 'home':
            // lấy dữ liệu
            // hiển thị dữ liệu  
            $view_name = 'admin_home';
            break;
            case 'categories-add':
                include_once 'models/m_admin.php';
                // lấy dữ liệu
                if (isset($_POST['btn_update_cg'])){
                   $add_name_cg = $_POST['add_name_cg']; 
                   // check name add_category
                   if (empty($add_name_cg)) {
                    //$error = "Vui lòng không bỏ trống ô input";
                    $error = '<div class="p-3 mb-2 bg-danger text-white">Không được bỏ trống tên danh mục</div>';
                  } else {
                    // Xử lý dữ liệu khi validation thành công
    
                    
                   $add_description_cg = $_POST['add_description_cg']; 
                   $add_color_cg = $_POST['add_color_cg']; 
                   if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
                    //Thư mục chứa file upload
                    $upload_dir = './public/assets/media/images/category/';
                    $upload_new = $_FILES['file']['name'];
                    //Đường dẫn của file sau khi upload
                    $upload_file = $upload_dir . $_FILES['file']['name'];
                    //Xử lý upload đúng file ảnh
                    $type_allow = array('png', 'jpg', 'jpeg', 'gif');
                    //PATHINFO_EXTENSION lấy đuôi file
                    $type = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                    // echo $type;
                    if(!in_array(strtolower($type), $type_allow)) {
                        $error['type'] = "Chỉ được upload file có đuôi PNG, JPG, GIF, JPEG";
                    }
                
                    #Upload file có kích thước cho phép (<20mb ~ 29.000.000BYTE)
                    $file_size = $_FILES['file']['size'];
                    if($file_size > 29000000) {
                        $error['file_size'] = "Chỉ được upload file bé hơn 20MB";
                    }
                    #Kiểm tra trùng file trên hệ thống
                    if(file_exists($upload_file)) {
                        // $error['file_exists'] = "File đã tồn tại trên hệ thống";
                        // Xử lý đổi tên file tự động
                
                        #Tạo file mới
                        // TênFile.ĐuôiFile
                        $filename = pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME);
                        $new_filename = $filename.'- Copy.';
                        $new_upload_file = $upload_dir.$new_filename.$type;
                        $k=1;
                        while(file_exists($new_upload_file)) {
                            $new_filename = $filename." - Copy({$k}).";
                            $k++;
                            $new_upload_file = $upload_dir.$new_filename.$type;
                        }
                        $upload_file = $new_upload_file;
                    }
                
                    if (empty($error)) {
                        if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_file)) {
                            // if (!empty($img_cg) && file_exists($img_cg)) {
                            //     unlink($img_cg);
                            // }else{
                                $add_img_cg = $upload_new; // Sử dụng $upload_file thay vì $new_filename.$type
                            
                        } else {
                            echo "Upload file thất bại";
                        }
                    }
                }
                if(empty($error)) {
                    add_Category($add_name_cg, $add_img_cg, $add_description_cg, $add_color_cg);
                }else {
                    $error = "Loi64";
                }
                   // load về trang categories
                   header('Location:?mod=admin&act=categories&page=1');
                }
            }
                // hiển thị dữ liệu     
                $view_name = 'admin_categories-add';
                break;
            case 'categories':
                include_once 'models/m_admin.php';
                if (isset($_GET['page'])) {
                    $count_Categoris = count_Categoris()['soluong'];
                    if (isset($_POST['kyw_cg'])) {
                        $get_kyw = $_POST['kyw_cg'];
                        header('Location: ?mod=admin&act=categories&page=1&search_category=' . urlencode($get_kyw));
                        exit; // Đảm bảo chuyển hướng ngay lập tức sau khi gửi header
                    } else if (isset($_GET['search_category'])) {
                        $kyw_cg = $_GET['search_category'];
                        if (isset($_GET['sort'])) {
                            $sort = $_GET['sort'];
                            $get_Category = get_Categoris(($_GET['page'] - 1) * 4, 4, $kyw_cg, $sort);
                        } else {
                            $get_Category = get_Categoris(($_GET['page'] - 1) * 4, 4, $kyw_cg);
                        }
                    } else {
                        if (isset($_GET['sort'])) {
                            $sort = $_GET['sort'];
                            $get_Category = get_Categoris(($_GET['page'] - 1) * 4, 4, "", $sort);
                        } else {
                            $get_Category = get_Categoris(($_GET['page'] - 1) * 4, 4);
                        }
                    }
                    $perPage = 4;
                    $number_Page = ceil($count_Categoris / $perPage);
                    $page_nows = $_GET['page'];
                    $startPage = max(1, $page_nows - 2);
                    $endPage = min($startPage + 5, $number_Page);

                    if ($endPage - $startPage < 5) {
                        $startPage = max(1, $endPage - 5);
                    }
                }        
                // Cập nhật dữ liệu
                if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                    $id_category = $_GET['id'];
                    $getidCategories = getidCategories($id_category);
                    $get_appear = $getidCategories['is_appear'];
                    $is_special = $getidCategories['is_special'];
                    if (!$getidCategories) {
                        // Xử lý trường hợp không tìm thấy danh mục
                    }
                    if (isset($_POST['submit'])) {
    
                        $name_cg = $_POST['name_cg'] ?? '';
                        $description_cg = $_POST['description_cg'] ?? '';
                        $is_appear = $_POST['is_appear']; 
                        $is_special =   $_POST['is_special'];
                        $error = []; // Khởi tạo mảng lỗi
                        $img_cg = $getidCategories['img']; // Giữ lại đường dẫn ảnh cũ nếu không có file mới
                        if (isset($_FILES['file']) && $_FILES['file']['error'] == 0) {
                            //Thư mục chứa file upload
                            $upload_dir = './public/assets/media/images/category/';
                            $upload_new = $_FILES['file']['name'];
                            //Đường dẫn của file sau khi upload
                            $upload_file = $upload_dir . $_FILES['file']['name'];
                            //Xử lý upload đúng file ảnh
                            $type_allow = array('png', 'jpg', 'jpeg', 'gif');
                            //PATHINFO_EXTENSION lấy đuôi file
                            $type = pathinfo($_FILES['file']['name'], PATHINFO_EXTENSION);
                            // echo $type;
                            if(!in_array(strtolower($type), $type_allow)) {
                                $error['type'] = "Chỉ được upload file có đuôi PNG, JPG, GIF, JPEG";
                            }
                        
                            #Upload file có kích thước cho phép (<20mb ~ 29.000.000BYTE)
                            $file_size = $_FILES['file']['size'];
                            if($file_size > 29000000) {
                                $error['file_size'] = "Chỉ được upload file bé hơn 20MB";
                            }
                            #Kiểm tra trùng file trên hệ thống
                            if(file_exists($upload_file)) {
                                // $error['file_exists'] = "File đã tồn tại trên hệ thống";
                                // Xử lý đổi tên file tự động
                        
                                #Tạo file mới
                                // TênFile.ĐuôiFile
                                $filename = pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME);
                                $new_filename = $filename.'- Copy.';
                                $new_upload_file = $upload_dir.$new_filename.$type;
                                $k=1;
                                while(file_exists($new_upload_file)) {
                                    $new_filename = $filename." - Copy({$k}).";
                                    $k++;
                                    $new_upload_file = $upload_dir.$new_filename.$type;
                                }
                                $upload_file = $new_upload_file;
                            }
                        
                            if (empty($error)) {
                                if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_file)) {
                                        $upload_dir = './public/assets/media/images/category/';
                                        $del_new = $_FILES['file']['name'];
                                            //Đường dẫn của file sau khi del
                                        $del_file = $upload_dir .$img_cg;
                                        unlink($del_file);
                                        $img_cg = $upload_new; // Sử dụng $upload_file thay vì $new_filename.$type
                                } else {
                                    echo "Upload file thất bại";
                                }
                            }
                        }
                        if(empty($error)) {
                            var_dump($img_cg);
                            update_Category($id_category, $name_cg, $description_cg, $img_cg, $is_appear, $is_special);
                        }else {
                            $error = "Loi64";
                        }
                        // update_Category($id_category, $name_cg, $description_cg);
                         // Xử lý sau khi cập nhật thành công.
                        header('Location:?mod=admin&act=categories&page=' . $page_nows); 
                    }                
                    
                }
                //$getidCategories = getidCategories($_GET['id']);
                // hiển thị dữ liệu  
                

                $view_name = 'admin_categories';
                break;
        case 'client':
            // lấy dữ liệu
            // hiển thị dữ liệu  
            $user_list = getUser();

            $view_name = 'admin_client';
            break;
        case 'client-edit':
            $view_name = 'admin_client_edit';
            if (@$_GET['id']) {
                $idUser = $_GET['id'];
                $userInfo = getUserInfo($idUser);
            }
            break;
        case 'client-add':
            $view_name = 'admin_client_add';
            break;
        case 'orders':
            // lấy dữ liệu
            include_once 'models/m_admin.php';
            $get_Order = get_Order_bill(); 
            if(isset($_GET['filter'])){
                $get_Order = get_Order_bill($_GET['filter']); 
                if(isset($_GET['status'])){
                $get_Order = get_Order_bill($_GET['filter'], $_GET['status']); 
                }
            }
            if(isset($_GET['id'])){
                $get_Cart_bill = get_Cart_bill($_GET['id']);
                $shippingResult = shipping($_GET['id']);
                $shippingName = $shippingResult[0]['name'];
                if (isset($_POST['submit'])) {
                    $change_status = $_POST['change_status'];
                    update_Change_status($change_status, $_GET['id']);
                    header('Location:?mod=admin&act=orders');
                }
            }
            // hiển thị dữ liệu  
            $view_name = 'admin_orders';
            break;

        case 'orders-add':
            // lấy dữ liệu
            // hiển thị dữ liệu  
            $view_name = 'admin_orders-add';
            break;
        case 'orders-edit':
            // lấy dữ liệu
            // hiển thị dữ liệu  
            $view_name = 'admin_orders-edit';
            break;
        case 'orders-delete':
            $view_name = 'admin_client';

            break;
        case 'orders-detail':
            $view_name = 'admin_orders-detail';

            break;
        case 'products':
            include_once 'models/m_admin.php';
            include_once 'models/m_category.php';
            if (isset($_POST['page'])) {
                $redirectPage = $_POST['page'];
                header("Location: index.php?mod=products&act=products-detail&page=$redirectPage");
                exit; // Kết thúc kịch bản sau khi chuyển hướng
            }
            
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            
            $getproductAdmin = productAdmin($page);
            $totalProducts = product_CountTotal();
            $getAllCategory = getCategories();
            $perPage = 9;
            $soTrang = ceil($totalProducts / $perPage);
            $startPage = max(1, $page - 2);
            $endPage = min($startPage + 5, $soTrang);

            if ($endPage - $startPage < 5) {
                $startPage = max(1, $endPage - 5);
            }

            // hiển thị dữ liệu
            $view_name = 'admin_products';
            break;
        case 'products-detail':
            include_once 'models/m_admin.php';
            include_once 'models/m_category.php';

            // lấy dữ liệu
            $productdetail = product_getById($_GET['id']);
            $getAllCategory = getCategories();

            // hiển thị dữ liệu  
            $view_name = 'admin_products-detail';
            break;
        case 'products-add':
            include_once 'models/m_admin.php';
            include_once 'models/m_category.php';

            $getAllCategory = getCategories();
            // lấy dữ liệu


            // hiển thị dữ liệu  
            $view_name = 'admin_products-add';
            break;

        case 'products-delete':
            include_once 'models/m_admin.php';
            if (isset($_GET['id']) && is_numeric($_GET['id'])) {
                $product_id = $_GET['id'];
                remove_product($product_id);
                header('location: ?mod=admin&act=products');
            } else {
                // Xử lý khi không có hoặc id không hợp lệ
                echo "ID sản phẩm không hợp lệ";
            }            

            break;

        case 'products-search':
            include_once 'models/m_admin.php';
            if (isset($_POST['keyword'])) {
                $inputSearch = $_POST['keyword'];
                header("location: index.php?mod=admin&act=products-search&page=1&kw=" . urlencode($inputSearch));
                exit; // Kết thúc việc chuyển hướng
            }
            
            // Lấy dữ liệu
            $keyword = isset($_GET['kw']) ? $_GET['kw'] : ''; // Lấy từ khóa tìm kiếm từ URL
            $page = isset($_GET['page']) ? $_GET['page'] : 1;
            $perPage = 9; // Số kết quả muốn hiển thị trên mỗi trang
            $totalResults = product_searchTotal($keyword);
            $soTrang = ceil($totalResults / $perPage);
            $startPage = max(1, $page - 2);
            $endPage = min($startPage + 5, $soTrang);
            
            if ($endPage - $startPage < 5) {
                $startPage = max(1, $endPage - 5);
            }
            
            $ketqua = productSearchAdmin($keyword, $page, $perPage);
            $getAllCategory = getCategories();
            
            $view_name = 'admin_products-search';
            break;

        case 'products-category-fil';
            include_once 'models/m_category.php';
            include_once 'models/m_admin.php';
            
            $getproductCategory = getproductbyCategory($_GET['id']);
            $getAllCategory = getCategories();
        
            $view_name = 'admin_products-category-fil';
            break;
            
        case 'comments':
            $getComment = getComment();
            $view_name = 'admin_comments';
            break;
        case 'hiddenCmt':
            $id = $_GET['id'];
            editCmtStatus($id, 0);
            header("Location: ?mod=admin&act=comments");
            break;
        case 'showCmt':
            $id = $_GET['id'];
            editCmtStatus($id, 1);
            header("Location: ?mod=admin&act=comments");
            case 'delCmt':
                $id = $_GET['id'];
                delCmt($id);
                header("Location: ?mod=admin&act=comments");
        default:

            break;
    }
    include_once 'views/v_admin_layout.php';
}
