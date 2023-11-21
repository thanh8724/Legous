<?php 
    session_start();
    ob_start();

    // Gữi/nhận dữ liệu thông qua models
    // Hiển thị dữ liệu thông qua view
    if(isset($_GET['act'])){
        switch ($_GET['act']){
            case 'home':
                // lấy dữ liệu
                include_once 'models/m_cart.php';
                include_once 'models/m_product.php';
                include_once 'models/m_partner.php';
                include_once 'models/m_user.php';
                $topLoveProduct = getProductsByLove(1);
                $loveProducts = getProductsByLove(12);
                $categories = getCategories();
                $partner = getPartner();
                $upcommingProduct = getFeatureProduct();
                
                // hiển thị dữ liệu
                $view_name = 'home';
                break;
            case 'login':
                // lấy dữ liệu
                $message = '';
                /** register */
                include_once 'models/m_user.php';
                if(isset($_POST['register']) && $_POST['register']) {
                    $username = $_POST['username'];
                    $email = $_POST['email'];
                    $password = $_POST['password'];

                    if(!empty($username) || !empty($email) || !empty($password)) {
                        $userId = insertUser($username, $email, $password);
                        $list_infoUser = [
                            "id_user" => $userId,
                            "name_user" => $username,
                            "password_user" => $password,
                            "email_user" => $email
                        ];
                        $_SESSION['user'] = $list_infoUser;
                        if (isset($_SESSION['user'])) {
                            extract($_SESSION['user']);
                            $message = 'Tạo tài khoản thành công <a href="#login-section">Nhấp vào đây để đăng nhập</a>';
                            $emailView = $email_user;
                            $passwordView = $password_user;
                            header("Location: ?mod=page&act=login#login-section");
                        }
                    } else {
                        $message = 'Please fill all the blank to continue';
                    }
                }

                /** login */
                $loginMessage = '';
                // if (isset($_SESSION['user'])){
                //     extract($_SESSION['user']);
                //     $emailView = $email_user;
                //     $passwordView = $password_user;
                // }
                if(isset($_POST['login']) && $_POST['login']) {
                    $email = $_POST['email'];
                    $password = $_POST['password'];
                    $list_infoUser = [
                        "email_user" => $email,
                        "password_user" => $password
                    ];
                    if(!empty($email) || !empty($password)) {
                        if (count(checkUser($email, $password)) != 0) {
                            $user = getUserByInfo($email, $password);
                            extract($user);
                            if ($role == 0) {
                                #lưu thông tin user lên session
                                $_SESSION['user'] = $list_infoUser;
                                header("Location: ?mod=page&act=home&idUser= $id");
                            } else if ($role == 2023) {
                                header("Location: ?mod=admin&act=dashboard");
                            }
                        }
                    } else {
                        $loginMessage = 'Vui lòng nhập đầy đủ thông tin';
                    }
                }
                // hiển thị dữ liệu
                $view_name = 'login';
                break;
            case 'category':
                 // lấy dữ liệu
                include_once 'models/m_product.php';
                include_once 'models/m_category.php';
                
                if (isset($_GET['idCategory'])) {
                    $idCategory = $_GET['idCategory'];
                    $category = getCategoryById($idCategory);
                    $featureProducts = getFeatureProductOfCategory ($idCategory , $limit = 0);
                    $categoryProducts = getProductsByCategoryId($idCategory);

                    /** filter handler */
                    if (isset($_POST['priceFilter']) && $_POST['priceFilter']) {
                        $min = $_POST['minPrice'];
                        $max = $_POST['maxPrice'];

                        $categoryProducts = getCategoryProductsByPriceFilter($min , $max , $idCategory);
                    }
                }
                
                // hiển thị dữ liệu
                $view_name = 'category';
                break;
            case'general':
                include_once 'models/m_user.php';
                $view_name = 'general';
                break;

            // case 'filter':
            //     include_once 'models/m_product.php';
            //     include_once 'models/m_category.php';
                
                
            //     break;
            default:
                
                break;
        }
        require_once 'views/v_user_layout.php';
    }
?>