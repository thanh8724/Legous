<?php 

if(isset($_POST['submit'])) {
    if (empty($_POST["name"]) || empty($_POST["id_category"]) ||  empty($_POST["price"])  || empty($_FILES["file"]["name"]) || empty($_POST["qty"])) {
        $_SESSION['loi'] = '<strong>Bạn cần điển đủ thông tin để tạo sản phẩm </strong>';
    } else {
        $name = $_POST['name'];
        $id_category = $_POST['id_category'];
        $description = $_POST['description'];
        $price = $_POST['price'];
        $img = $_FILES["file"]["name"];
        $qty = $_POST['qty'];
        $kq = product_checkName($name);
        if ($kq) {
            $_SESSION['loi'] = 'Không thể tạo trùng tên của sản phẩm <strong>' . $name . '</strong>';
        } else {
            product_add($name, $id_category, $description, $price, $img, $qty);
            $_SESSION['thongbao'] = 'Đã tạo thành công <strong>' . $name . '</strong>';
            
        }
    }
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
            if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_file)) {
                $image = $new_filename.$type;
            } 
        }else {
            if (move_uploaded_file($_FILES['file']['tmp_name'], $upload_file)) {
                $filename = pathinfo($_FILES["file"]["name"], PATHINFO_FILENAME);
                $image = $filename.$type;
            } 
        }
    }
}
?>
<section class="dashboard">
    <!----======== Header DashBoard ======== -->
    <div class="top">
        <i class="fas fa-angle-left sidebar-toggle"></i>
        <div class="search-box">
            <i class="far fa-search"></i>
            <input type="text" placeholder="Tìm Kiếm Tại Đây...">
        </div>
        <div class="info-user">
            <div class="notifiComment">
                <i class="far fa-comment-alt btnShowFeature"></i>
                <ul class="showFeatureAdminHeader box-shadow1">
                    <li>
                        <div class="col-12 d-flex">
                            <div class="col-2">
                                <img class="notifiAdminImg" src="../assets/media/images/users/profile.jpg" alt="">
                            </div>
                            <div class="col-10">
                                <p class="notifiAdminText body-small"><strong>Trần Thị Hồng Ngọc</strong><span> vừa mua một mô hình với mã đơn hàng <strong>#999</strong></span></p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="col-12 d-flex">
                            <div class="col-2">
                                <img class="notifiAdminImg" src="../assets/media/images/users/profile.jpg" alt="">
                            </div>
                            <div class="col-10">
                                <p class="notifiAdminText body-small"><strong>Trần Thị Hồng Ngọc</strong><span> vừa mua một mô hình với mã đơn hàng <strong>#999</strong></span></p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="col-12 d-flex">
                            <div class="col-2">
                                <img class="notifiAdminImg" src="../assets/media/images/users/profile.jpg" alt="">
                            </div>
                            <div class="col-10">
                                <p class="notifiAdminText body-small"><strong>Trần Thị Hồng Ngọc</strong><span> vừa mua một mô hình với mã đơn hàng <strong>#999</strong></span></p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="col-12 d-flex">
                            <div class="col-2">
                                <img class="notifiAdminImg" src="../assets/media/images/users/profile.jpg" alt="">
                            </div>
                            <div class="col-10">
                                <p class="notifiAdminText body-small"><strong>Trần Thị Hồng Ngọc</strong><span> vừa mua một mô hình với mã đơn hàng <strong>#999</strong></span></p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="col-12 d-flex">
                            <div class="col-2">
                                <img class="notifiAdminImg" src="../assets/media/images/users/profile.jpg" alt="">
                            </div>
                            <div class="col-10">
                                <p class="notifiAdminText body-small"><strong>Trần Thị Hồng Ngọc</strong><span> vừa mua một mô hình với mã đơn hàng <strong>#999</strong></span></p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="notifiBell">
                <i class="fal fa-bell btnShowFeature"></i>
                <ul class="showFeatureAdminHeader box-shadow1">
                    <li>
                        <div class="col-12 d-flex">
                            <div class="col-2">
                                <img class="notifiAdminImg" src="../assets/media/images/users/profile.jpg" alt="">
                            </div>
                            <div class="col-10">
                                <p class="notifiAdminText body-small"><strong>Trần Thị Hồng Ngọc</strong><span> vừa mua một mô hình với mã đơn hàng <strong>#999</strong></span></p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="col-12 d-flex">
                            <div class="col-2">
                                <img class="notifiAdminImg" src="../assets/media/images/users/profile.jpg" alt="">
                            </div>
                            <div class="col-10">
                                <p class="notifiAdminText body-small"><strong>Trần Thị Hồng Ngọc</strong><span> vừa mua một mô hình với mã đơn hàng <strong>#999</strong></span></p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="col-12 d-flex">
                            <div class="col-2">
                                <img class="notifiAdminImg" src="../assets/media/images/users/profile.jpg" alt="">
                            </div>
                            <div class="col-10">
                                <p class="notifiAdminText body-small"><strong>Trần Thị Hồng Ngọc</strong><span> vừa mua một mô hình với mã đơn hàng <strong>#999</strong></span></p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="col-12 d-flex">
                            <div class="col-2">
                                <img class="notifiAdminImg" src="../assets/media/images/users/profile.jpg" alt="">
                            </div>
                            <div class="col-10">
                                <p class="notifiAdminText body-small"><strong>Trần Thị Hồng Ngọc</strong><span> vừa mua một mô hình với mã đơn hàng <strong>#999</strong></span></p>
                            </div>
                        </div>
                    </li>
                    <li>
                        <div class="col-12 d-flex">
                            <div class="col-2">
                                <img class="notifiAdminImg" src="../assets/media/images/users/profile.jpg" alt="">
                            </div>
                            <div class="col-10">
                                <p class="notifiAdminText body-small"><strong>Trần Thị Hồng Ngọc</strong><span> vừa mua một mô hình với mã đơn hàng <strong>#999</strong></span></p>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="imgUserAdmin">
                <img class="btnShowFeature" src="../assets/media/images/users/profile.jpg" alt="">
                <ul class="showFeatureAdminHeader box-shadow1">

                    <li><a class="body-small" href="#statisticalChart">Thống kê đơn hàng</a></li>
                    <li><a class="body-small" href="#recentOrder">Đơn Hàng Gần Đây</a></li>
                    <li><a class="body-small" href="#overviewDashboard">Tổng quan</a></li>
                    <li><a class="body-small" href="#">Đăng Xuất</a></li>
                </ul>
            </div>
        </div>
    </div>
    <!----======== End Header DashBoard ======== -->

    <!----======== Body DashBoard ======== -->
    <div class="containerAdmin_order-detail p30">
        <div class="localDashboard">
            <div class="col-12 d-flex">
                <div class="col-6">
                    <div class="col-12">
                        <h2>Thêm Sản Phẩm</h2>
                    </div>
                    <div class="col-12">
                        <span class="label-large">Admin /</span><a href="?mod=admin&act=products" class="label-large" style="text-decoration: none;"> Sản Phẩm</a>
                    </div>
                    <div>

                    </div>
                </div>
            </div>
        </div>

        <div class="sliderDashboard_order-add-create sliderDashboard_order-detail rounded-4">
            
            <?php if (isset($_SESSION['loi'])) : ?>
                <div class="alert alert-danger" role="alert"><?= $_SESSION['loi'] ?></div>
            <?php endif;
            unset($_SESSION['loi']) ?>

            <form action="" method="post" enctype="multipart/form-data">
                <div class="body_sliderDashboard_order-add-create p20 row">
                    <div class="col-7">
                        <div class="left-order-add-create">
                            <label class="title-medium">Tên Sản Phẩm</label>
                            <input type="text" name="name" placeholder="Nhập tên sản phẩm" aria-label="default input example">
                        </div>
                        <div class="describe-order_detail">
                            <label class="title-medium">Mô Tả</label>
                            <textarea name="description" id="description" cols="30" rows="10" placeholder="Nhập mô tả sản phẩm"></textarea>
                        </div>
                        <div class="Dropdowns_categogy">
                            <label class="title-medium">Danh mục</label>
                            <div class="custom-select">
                                <!-- Dropdown -->
                                <select id="id_category" name="id_category">
                                    <option value="1">Ninja Go</option>
                                    <option value="2">Naruto</option>
                                    <option value="3">dragon ball</option>
                                    <option value="4">Marvel & DC</option>
                                    <option value="5">One Piece</option>
                                    <option value="6">Car</option>
                                    <option value="7">Gundam</option>
                                    <option value="8">Kimetsu no Yaiba</option>
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12" style="margin-bottom: 30px;">
                                <label class="title-medium">Sản phẩm còn lại</label>
                                <input  type="text" name="qty" placeholder="1000" aria-label="default input example">
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="title-medium">Giá</label>
                                <input  type="text" id="price" name="price" placeholder="Nhập giá tiền" aria-label="default input example">
                            </div>
                            <div class="col-6">
                                <label class="title-medium">Giá khuyến mãi</label>
                                <input type="text" placeholder="Nhập giá khuyến mãi" aria-label="default input example">
                            </div>
                        </div>
                        <div class="row">
                            <div class="rol-6 mt-3">
                                <input style="color: #fff ;padding: 10px 15px; font-size: 14px; font-weight: 500;" class="btn btn-primary" type="submit" name="submit" value="Tạo Sản Phẩm">

                            </div>

                        </div>
                    </div>
                    <div class="col-5 col-md">
                        <div class="right-order-add-create p30 d-flex justify-content-center flex-column ">
                            <div class="img_order-add-create rounded-4">
                                <img src="../assets/media/images/category/dragon ball/Gohan - ZBC Studio/ab0332c4e1a739a15332b87eca29d1c71afce4f8a289fbc786c188c0 (1).png" alt="">
                            </div>
                            <hr>
                            <div style="width: 100%;" id="drop-area">
                                <label class="title-medium">Kéo thả ảnh ở đây</label>
                                <br>
                                <input type="file" id="img" name="file">
                            </div>

                            <div style="width: 100%;" id="demo" class="demo .box-shadow1">

                            </div>
                            <div style="width: 100%;" id="deleteButtonImg" class="button_delete_img row">
                            <div class="col-8 d-flex justify-content-between">
                                        <button type="button " class="btn btn-primary ">Cập nhật</button>
                                        <button type="button" id="deleteButtonAll" class="btn btn-danger">Xóa</button>
                                        <button type="button" class="btn box-shadow1 ">Hủy</button>
                                    </div>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </form>

        </div>

    </div>

    <!----======== End Body DashBoard ======== -->

</section>