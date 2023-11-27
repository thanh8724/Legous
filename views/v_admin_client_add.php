<?php
if (isset($_POST['btn_update'])) {
    $error = array();
    if (!empty($_POST['fullname'])) {
        $fullname = $_POST['fullname'];
    } else {
        $error['fullname'] = "Không được để trống tên đăng nhập";
    }
    if (!empty($_POST['username'])) {
        $UserRegis = getFullNameUser();
        foreach ($UserRegis as $value) {
            if ($value == $_POST['username']) {
                $error['username'] = "Tên đăng nhập bị trùng";
            } else {
                $username = $_POST['username'];
            }
        }
    } else {
        $error['username'] = "Không được để trống tên đăng nhập";
    }
    $patternPassword = "/^.{6,}$/";
if (!empty($_POST['password'])) {
    if (preg_match($patternPassword, $_POST['password'])) {
        $password = $_POST['password'];
    } else {
        $error['password'] = "Mật khẩu phải có ít nhất 6 ký tự";
    }
} else {
    $error['phone'] = "Không được để trống mật khẩu";
}
    $paternPhone = "/^(0[2|3|5|6|7|8|9])+([0-9]{8})$/";
    if (!empty($_POST['phone'])) {
        if (preg_match($paternPhone, $_POST['phone'])) {
            $phone = $_POST['phone'];
        } else {
            $error['phone'] = "Số điện thoại không khả dụng";
        }
    } else {
        $error['phone'] = "Không được để trống mật khẩu";
    }

    if (!empty($_POST['email'])) {
        $email = $_POST['email'];
    } else {
        $error['email'] = "Không được để trống số điện thoại";
    }

    if (!empty($_POST['address'])) {
        $address = $_POST['address'];
    } else {
        $error['address'] = "Không được để trống địa chỉ";
    }

    $role = $_POST['role'];
    $bio = $_POST['bio'];
    if (isset($_FILES['file'])) {
        //Thư mục chứa file upload
        $upload_dir = './public/assets/media/images/users/';
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


        if(empty($error)) {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_file)) {
                $image = $new_filename.$type;
                addUserProfile($fullname, $username, $password, $email, $address, $image, $role, $bio, $phone);

                header("Location: ?mod=admin&act=client");
            } else {
                echo "Upload file thất bại";
            }
        }
    }
    // if (empty($error)) {
    // } else {

    //     $error = "Loi64";
    // }
}
?>
<section class="dashboard">
    <!----======== Header DashBoard ======== -->
    <div class="top">
        <i class="fas fa-angle-left sidebar-toggle"></i>
        <div class="search-box">
            <form action="" method="post">
                <i class="far fa-search"></i>
                <input type="text" placeholder="Search here...">
            </form>
        </div>
        <div class="info-user">
            <div class="notifiComment">
                <i class="far fa-comment-alt btnShowFeature"></i>
                <ul class="showFeatureAdminHeader box-shadow1">
                    <?php
                    $getCmt = getAllComment();
                    arsort($getCmt);
                    $getCmt = array_slice($getCmt, 0, 6, true);
                    foreach ($getCmt as $item) {
                       
                        $getUser = getUserById($item['id_user']);
                        $getProduct = getProductById($item['id_product']);
                        ?>
                        <li>
                            <div class="col-12 d-flex">
                                <div class="col-2">
                                    <img class="notifiAdminImg"
                                        src="./public/assets/media/images/users/<?php echo $getUser['img'] ?>" alt="">
                                </div>
                                <div class="col-10">
                                    <p class="notifiAdminText body-small"><strong>
                                            <?php echo $getUser['fullname'] ?>
                                        </strong><span> đã bình luận ở sản phẩm <strong><a href="">
                                                    <?php echo $getProduct['name'] ?>
                                                </a></strong></span></p>
                                </div>
                            </div>
                        </li>
                        <?php
                    }
                    ?>
                </ul>
            </div>
            <div class="notifiBell">
                <i class="fal fa-bell btnShowFeature"></i>
                <ul class="showFeatureAdminHeader box-shadow1">
                <?php
                    $getBill = getBill();
                    arsort($getBill);
                    $getBill = array_slice($getBill, 0, 6, true);
                    foreach ($getBill as $item) {
                       
                        $getUser = getUserById($item['id_user']);
                        ?>
                        <li>
                        <div class="col-12 d-flex">
                            <div class="col-2">
                                <img class="notifiAdminImg" src="./public/assets/media/images/users/profile.jpg" alt="">
                            </div>
                            <div class="col-10">
                                <p class="notifiAdminText body-small"><strong><?php echo $getUser['fullname']?></strong><span> vừa mua
                                        một mô hình với mã đơn hàng <strong><?php echo $item['id']?></strong></span></p>
                            </div>
                        </div>
                    </li>
                        <?php
                    }
                    ?>
                    
                </ul>
            </div>
            <div class="imgUserAdmin">
                <?php
                $getID = $_SESSION['admin']['id_user'];
                $getUser = getUserById($getID);
                ?>
                <img style="" class="btnShowFeature"
                    src="./public/assets/media/images/users/<?php echo $getUser['img'] ?>" alt="">
                <ul class="showFeatureAdminHeader box-shadow1">

                    <li><a class="body-small" href="#statisticalChart">Thống kê đơn hàng</a></li>
                    <li><a class="body-small" href="#recentOrder">Đơn Hàng Gần Đây</a></li>
                    <li><a class="body-small" href="#overviewDashboard">Tổng quan</a></li>
                    <li><a class="body-small" href="?mod=user&act=logOut-account">Đăng Xuất</a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="flex-column p30 g30" style="align-self: stretch; align-items: flex-start;">
        <div class="text">
            <h1 class="label-large-prominent" style="font-size: 24px;
              line-height: 32px;">Thêm Tài Khoản</h1>
        </div>
        <!--DateTimelocal-->
        <div class="flex-between width-full" style="gap: 8px;
            align-items: center;">
            <div class="flex g8">
                <span class="label-large">Admin /</span><a href="?mod=admin&act=client" class="label-large"
                    style="text-decoration: none;">Khách Hàng</a>
            </div>
            <!-- <div class="flex-center g8">
            <span><i class="fa-solid fa-calendar-days"></i></span>
            <input class="label-large-prominent" type="datetime-local" style="color: #625B71; border: none; font-size: 16px;
                ">
          </div> -->
        </div>
    </div>
    <!----======== End Header DashBoard ======== -->
    <div class="containerAdmin_order-detail p30">

        <form enctype="multipart/form-data" action="" method="POST">
            <div class="sliderDashboard_order-add-create sliderDashboard_order-detail rounded-4">
                <div class="body_sliderDashboard_order-add-create p20 row">
                    <div class="col-7">
                        <div class="left-order-add-create">
                            <h2>Họ Và Tên</h2>
                            <input name="fullname" class="" type="text" placeholder="Nhập Họ Và Tên"
                                aria-label="default input example">
                        </div>
                        <div class="left-order-add-create">
                            <h2>Tên Đăng Nhập</h2>
                            <input name="username" class="" type="text" placeholder="Nhập Tên Đăng Nhập"
                                aria-label="default input example">
                        </div>
                        <div class="left-order-add-create">
                            <h2>Mật Khẩu</h2>
                            <input name="password" class="" type="password" placeholder="Nhập Mật Khẩu"
                                aria-label="default input example">
                        </div>
                        <div class="left-order-add-create">
                            <h2>Email</h2>
                            <input name="email" class="" type="email" placeholder="Email"
                                aria-label="default input example">
                        </div>
                        <div class="left-order-add-create">
                            <h2>Số điện thoại</h2>
                            <input name="phone" class="" type="number" placeholder="Nhập Số Điện Thoại"
                                aria-label="default input example">
                        </div>
                        <div class="left-order-add-create">
                            <h2>Địa Chỉ</h2>
                            <input name="address" class="" type="text" placeholder="Nhập Địa chỉ"
                                aria-label="default input example">
                        </div>
                        <div class="describe-order_detail">
                            <h2>Mô Tả</h2>
                            <textarea name="bio" id="" cols="30" rows="10"
                                placeholder="Nhập mô tả người dùng"></textarea>
                        </div>

                        <div class="Dropdowns_categogy">
                            <h2>Vai Trò</h2>
                            <div class="custom-select">
                                <!-- Dropdown -->
                                <select name="role" id="dropdown" onchange="updateInput()">
                                    <option value="0">User thường</option>
                                    <option value="2023">Admin</option>
                                </select>
                            </div>
                        </div>

                    </div>
                    <div class="col-5 col-md">
                        <div class="right-order-add-create p30 d-flex justify-content-center flex-column ">
                            <div class="img_order-add-create rounded-4">
                                <!-- <img src="../public/assets/media/images/product/00e8115d9521e69a31f8ee479cb7814e6cdb0b49550b8f06d49a21fd.jpg" alt=""> -->
                                <img src="./public/assets/media/images/users/<?php echo $userInfo[0]['img'] ?>">

                            </div>
                            <hr>
                            <div style="width: 100%;" id="drop-area">
                                <h3>Kéo thả ảnh ở đây</h3>
                                <input name="file" type="file" id="fileInput">
                            </div>

                            <div style="width: 100%;" id="demo" class="demo .box-shadow1">

                            </div>
                            <div style="width: 100%;" id="deleteButtonImg" class="button_delete_img row">
                                <div class="col-4"></div>
                                <div class="col-8 d-flex flex-end">
                                    <input name="btn_update" value="Cập Nhật" type="submit"
                                        class="btn btn-primary "></input>
                                    <button type="button" class="btn box-shadow1 ">Hủy</button>
                                </div>
                            </div>
                        </div>
                        <div class="">
                            <span class="flex"></span>
                        </div>
                    </div>
                </div>
            </div>
        </form>


    </div>
</section>