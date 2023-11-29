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
                                    <p class="notifiAdminText body-small"><strong>
                                            <?php echo $getUser['fullname'] ?>
                                        </strong><span> vừa mua
                                            một mô hình với mã đơn hàng <strong>
                                                <?php echo $item['id'] ?>
                                            </strong></span></p>
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
                        <span class="label-large">Admin /</span><a href="?mod=admin&act=products" class="label-large"
                            style="text-decoration: none;"> Sản Phẩm</a>
                    </div>
                    <div>

                    </div>
                </div>  
            </div>
        </div>

        <div class="sliderDashboard_order-add-create sliderDashboard_order-detail rounded-4">
            <?php if (isset($_SESSION['thongbao'])): ?>
                <div class="alert alert-success" role="alert">
                    <?= $_SESSION['thongbao'] ?>
                </div>
            <?php endif;
            unset($_SESSION['thongbao']) ?>
            <?php if (isset($_SESSION['loi'])): ?>
                <div class="alert alert-danger" role="alert">
                    <?= $_SESSION['loi'] ?>
                </div>
            <?php endif;
            unset($_SESSION['loi']) ?>

            <form action="" method="post">
                <div class="body_sliderDashboard_order-add-create p20 row">
                    <div class="col-7">
                        <div class="left-order-add-create">
                            <label class="title-medium">Tên Sản Phẩm</label>
                            <input class="" type="text" id="name" name="name" placeholder="Nhập tên sản phẩm"
                                aria-label="default input example">
                        </div>
                        <div class="describe-order_detail">
                            <label class="title-medium">Mô Tả</label>
                            <textarea name="description" id="description" cols="30" rows="10"
                                placeholder="Nhập mô tả sản phẩm"></textarea>
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
                                <input class="" type="text" name="qty" placeholder="1000"
                                    aria-label="default input example">
                            </div>

                        </div>
                        <div class="row">
                            <div class="col-6">
                                <label class="title-medium">Giá</label>
                                <input class="" type="text" id="price" name="price" placeholder="Nhập giá tiền"
                                    aria-label="default input example">
                            </div>
                            <div class="col-6">
                                <label class="title-medium">Giá khuyến mãi</label>
                                <input class="" type="text" placeholder="Nhập giá khuyến mãi"
                                    aria-label="default input example">
                            </div>
                        </div>
                    </div>
                    <div class="col-5 col-md">
                        <div class="right-order-add-create p30 d-flex justify-content-center flex-column ">
                            <div class="img_order-add-create rounded-4">
                                <img src="../assets/media/images/category/dragon ball/Gohan - ZBC Studio/ab0332c4e1a739a15332b87eca29d1c71afce4f8a289fbc786c188c0 (1).png"
                                    alt="">
                            </div>
                            <hr>
                            <div style="width: 100%;" id="drop-area">
                                <label class="title-medium">Kéo thả ảnh ở đây</label>
                                <br>
                                <input type="file" id="img" name="img" accept="image/*" multiple>
                            </div>

                            <div style="width: 100%;" id="demo" class="demo .box-shadow1">

                            </div>
                            <div style="width: 100%;" id="deleteButtonImg" class="button_delete_img row">
                                <div class="col-4"></div>
                                <div class="col-8 d-flex justify-content-between">
                                    <button type="button " class="btn btn-primary ">Cập nhật</button>
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
                <button class="btn btn-primary" type="submit" name="submit" value="submit">Xác nhận</button>
            </form>

        </div>

    </div>

    <!----======== End Body DashBoard ======== -->

</section>