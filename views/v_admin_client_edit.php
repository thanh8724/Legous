<?php 
    if(isset($_POST['btn_update'])) {
        $error = array();
        if(!empty($_POST['fullname'])) {
            $fullname = $_POST['fullname'];
        }else {
            $error['fullname'] = "Không được để trống tên đăng nhập";
        }
        if(!empty($_POST['username'])) {
            $username = $_POST['username'];
        }else {
            $error['username'] = "Không được để trống tên đăng nhập";
        }

        if(!empty($_POST['password'])) {
            $password = $_POST['password'];
        }else {
            $error['password'] = "Không được để trống mật khẩu";
        }

        if(!empty($_POST['phone'])) {
            $phone = $_POST['phone'];
        }else {
            $error['phone'] = "Không được để trống số điện thoại";
        }

        if(!empty($_POST['email'])) {
            $email = $_POST['email'];
        }else {
            $error['email'] = "Không được để trống số điện thoại";
        }

        if(!empty($_POST['address'])) {
            $address = $_POST['address'];
        }else {
            $error['address'] = "Không được để trống địa chỉ";
        }
        
        $role = $_POST['role'];
        $id = $_GET['id'];
        if(empty($error)) {
            echo $id;
            echo $fullname;
            echo $password;
            echo $username;
            editUserProfile($id,$fullname, $username, $password, $email, $address);
        }else {
            $error = "Loi64";
        }
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
          <i class="far fa-comment-alt"></i>
          <i class="fal fa-bell"></i>
          <img src="/public/assets/media/images/users/user-1.svg" alt="">
        </div>
      </div>
      <div class="flex-column p30 g30" style="align-self: stretch; align-items: flex-start;">
        <div class="text">
          <h1 class="label-large-prominent" style="font-size: 24px;
              line-height: 32px;">Danh Mục</h1>
        </div> 
        <!--DateTimelocal-->
        <div class="flex-between width-full" style="gap: 8px;
            align-items: center;">
          <div class="flex g8">
            <span class="label-large">Admin /</span><a href="#" class="label-large" style="text-decoration: none;">Danh Mục</a>
          </div>
          <div class="flex-center g8">
            <span><i class="fa-solid fa-calendar-days"></i></span>
            <input class="label-large-prominent" type="datetime-local" style="color: #625B71; border: none; font-size: 16px;
                ">
          </div>
        </div>
      </div>
      <!----======== End Header DashBoard ======== -->
<div class="containerAdmin_order-detail p30">
                <div class="localDashboard">
                    <div class="col-12 d-flex">
                        <div class="col-6">
                            <div class="col-12">
                                <h2>Chi tiết sản phẩm</h2>
                            </div>
                            <div class="col-12">
                                <span class="label-large">Admin /</span><a href="#" class="label-large"
                                    style="text-decoration: none;">Sản Phẩm</a>
                            </div>
                            <div>

                            </div>
                        </div>
                    </div>
                </div>
                <form enctype="multipart/form-data" action="" method="POST">
                <div class="sliderDashboard_order-add-create sliderDashboard_order-detail rounded-4">
                    <div class="body_sliderDashboard_order-add-create p20 row">
                        <div class="col-7">
                                <div class="left-order-add-create">
                                    <h2>Họ Và Tên</h2>
                                    <input name="fullname" class="" type="text" value="<?php echo $userInfo[0]['fullname'] ?>" placeholder="Nhập Họ Và Tên"
                                        aria-label="default input example">
                                </div>
                                <div class="left-order-add-create">
                                    <h2>Tên Đăng Nhập</h2>
                                    <input name="username" class="" type="text" value="<?php echo $userInfo[0]['username'] ?>" placeholder="Nhập Tên Đăng Nhập"
                                        aria-label="default input example">
                                </div>
                                <div class="left-order-add-create">
                                    <h2>Mật Khẩu</h2>
                                    <input name="password" class="" type="text" value="<?php echo $userInfo[0]['password'] ?>" placeholder="Nhập Mật Khẩu"
                                        aria-label="default input example">
                                </div>
                                <div class="left-order-add-create">
                                    <h2>Email</h2>
                                    <input name="email" class="" type="text" value="<?php echo $userInfo[0]['email'] ?>" placeholder="Email"
                                        aria-label="default input example">
                                </div>
                                <div class="left-order-add-create">
                                    <h2>Số điện thoại</h2>
                                    <input name="phone" class="" type="text" value="<?php echo $userInfo[0]['phone'] ?>" placeholder="Nhập Số Điện Thoại"
                                        aria-label="default input example">
                                </div>
                                <div class="left-order-add-create">
                                    <h2>Địa Chỉ</h2>
                                    <input name="address" class="" type="text" value="<?php echo $userInfo[0]['address'] ?>" placeholder="Nhập Địa chỉ"
                                        aria-label="default input example">
                                </div>
                                <div class="describe-order_detail">
                                    <h2>Mô Tả</h2>
                                    <textarea name="bio" id="" cols="30" rows="10"
                                        placeholder="Nhập mô tả người dùng" value="<?php echo $userInfo[0]['bio'] ?>"><?php echo $userInfo[0]['bio'] ?></textarea>
                                </div>

                                <div class="Dropdowns_categogy">
                                    <h2>Vai Trò</h2>
                                    <div class="custom-select">
                                        <!-- Dropdown -->
                                        <select name="role" id="dropdown" onchange="updateInput()">
                                            <option value="0">User thường</option>
                                            <option value="1">Admin</option>
                                        </select>
                                    </div>
                                </div>
                                
                        </div>
                        <div class="col-5 col-md">
                            <div class="right-order-add-create p30 d-flex justify-content-center flex-column ">
                                <div class="img_order-add-create rounded-4">
                                    <img src="../public/assets/media/images/product/00e8115d9521e69a31f8ee479cb7814e6cdb0b49550b8f06d49a21fd.jpg" alt="">
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
                                    <div class="col-8 d-flex justify-content-between">
                                        <input name="btn_update" value="Cập Nhật" type="submit" class="btn btn-primary "></input>
                                        <button type="button" id="deleteButtonAll" class="btn btn-danger">Xóa</button>
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
