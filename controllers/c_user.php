<?php 
    $title = '';
    session_start();
    ob_start();
    if (!isset($_SESSION['user'])) {
        $_SESSION['user'] = [];
    }
    // Gữi/nhận dữ liệu thông qua models
    // Hiển thị dữ liệu thông qua view
    include_once 'models/m_user.php';
    if(isset($_GET['act'])){
        $get_user = get_User();
        if(is_array($get_user)){
            extract($get_user);
        }
        $checkUses = checkAccount($email, $password);
        if(is_array($checkUses)) {
            extract($checkUses);
            $list_infoUser = [
                                "id_user" => $id,
                                "avatar_user" => $img,
                                "name_user" => $username,
                                "password_user" => $password,
                                "email_user" => $email,
                                "fullName_user" => $fullname,
                                "phone_user" => $phone,
                                "address_user" => $address,
                                "country_user" => $country,
                                "bio_user" => $bio
                            ];
            // array_push($_SESSION["user"], $list_infoUser);
            $_SESSION['user'] = $list_infoUser;
            if($_SESSION['user']['avatar_user'] == "") {
                $_SESSION['user']['avatar_user'] = 'avatar-none.png';
            }else {
                $_SESSION['user']['avatar_user'] = $img;
            }
        }
        switch ($_GET['act']){
            case 'general':
                // lấy dữ liệu
                include_once 'models/m_user.php';
                // hiển thị dữ liệu
                $view_name = 'general';
                $title = 'Tổng Quan';

                // xử lí khi người dùng nhập form
                if(isset($_POST['button__submit'])) {
                    $id_user = $_POST['id_user'];
                    if($_POST['new_username'] != "") {
                        $new_username = $_POST['new_username'];
                    }else {
                        $new_username = $_SESSION['user']['name_user'];
                    }
                    if($_POST['new_email'] != "") {
                        $new_email = $_POST['new_email'];
                    }else {
                        $new_email = $_SESSION['user']['email_user'];
                    }
                    update_userName_email($new_username, $new_email, $id_user);
                    header('location: ?mod=user&act=general');
                }
                break;
            case 'editprofile':
                // lấy dữ liệu
                include_once 'models/m_user.php';

                // hiển thị dữ liệu
                $view_name = 'editprofile';
                $title = 'Chỉnh sửa thông tin';

                // xử lí khi người dùng nhập form
                if(isset($_POST['button__submit'])) {
                    $id_user = $_POST['id_user'];
                    $bio = $_POST['bio'];
                    $new_avatar = $_FILES['avatar__user']['name'];
                    if($new_avatar != "") {
                        $target_file = "upload/users/".$new_avatar;
                        move_uploaded_file($_FILES["avatar__user"]["tmp_name"], $target_file);
                        // lấy ảnh từ db về
                        // foreach (get_imgAvatar($id_user) as $key) {
                        //     $path_img = $key;
                        // }
                        // if($path_img != "avatar-none.png") {
                        //     $hinh = "upload/users/".$path_img;
                        //     if(file_exists($hinh)) {
                        //         unlink($hinh);
                        //     }
                        // }
                    }else {
                        $new_avatar = $_SESSION['user']['avatar_user'];
                    }
                    if($_POST['new_fullname'] != "") {
                        $new_fullname = $_POST['new_fullname'];
                    }else {
                        $new_fullname = $_SESSION['user']['user_fullName'];
                    }
                    if($_POST['country'] != "") {
                        $country = $_POST['country'];
                    }else {
                        $country = $_SESSION['user']['country_user'];
                    }
                    if($_POST['bio'] != "") {
                        $bio = $_POST['bio'];
                    }else {
                        $bio = $_SESSION['user']['bio_user'];
                    }
                    update_fullName_country_bio_avatar($new_fullname, $country, $bio, $new_avatar, $id_user);
                    header('location: ?mod=user&act=editprofile');
                }
                if(isset($_POST['delete_avatar'])) {
                    $id_user = $_POST['id_user'];
                    // lấy ảnh từ db về
                    foreach (get_imgAvatar($id_user) as $key) {
                        $path_img = $key;
                    }
                    $hinh = "upload/users/".$path_img;
                    echo var_dump($hinh);
                    if(file_exists($hinh)) {
                        unlink($hinh);
                    }
                    $new_avatar = "";
                    remove_avatar($new_avatar, $id_user);
                    header('location: ?mod=user&act=editprofile');
                }
                break;
            case'password':
                include_once 'models/m_user.php';

                // hiển thị dữ liệu
                $view_name = 'password';
                $title = "Mật Khẩu";


                break;

            case 'address':
                include_once 'models/m_user.php';

                // hiển thị dữ liệu
                $view_name = 'address';
                $title = "Địa Chỉ";

                #code
                $id_user = $_SESSION['user']['id_user'];
                $list_addressUser = get_address($id_user);
                $list_fullName_user = get_fullName_user($id_user);

                if(isset($_POST['back_address'])) {
                    header('location: ?mod=user&act=address');
                }

                if(isset($_POST['add_address'])) {
                    $value = $_POST['add_address'];
                }
                if(isset($_POST['button_address'])) {
                    
                }
                break;
            default:
                $title = '';
                break;
        }
        require_once 'views/v_user_layout.php';
}
?>