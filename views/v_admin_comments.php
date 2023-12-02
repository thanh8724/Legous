    <section class="dashboard">
    <!----======== Header DashBoard ======== -->
    <div class="top">
        <i class="fas fa-angle-left sidebar-toggle"></i>
        <form style="width: 100%;display:flex; justify-content: center;" action="" method="post">
            <div class="search-box">
                <input type="submit" value=""><i class="far fa-search"></i>

                <input name="act_search" value="" type="text" placeholder="Tìm kiếm...">
            </div>
        </form>
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
              line-height: 32px;">Bình Luận</h1>
        </div>
        <!--DateTimelocal-->
        <div class="flex-between width-full" style="gap: 8px;
            align-items: center;">
            <div class="flex g8">
                <span class="label-large">Admin /</span><a href="?mod=admin&act=comments" class="label-large"
                    style="text-decoration: none;">Bình Luận</a>
            </div>
        </div>
    </div>
    <!----======== End Header DashBoard ======== -->

    <!----======== Body DashBoard ======== -->
    <div class="containerAdmin">
        <div class="width-full d-flex align-items-center justify-content-between">
            <div class="content-filter dropdown-center width-full d-flex align-items-center justify-content-between">
                <button id="btn_addMore_admin" type="button"
                    style="width:130px;height:45px;background-color:#6750a4;border-radius:10px"><a
                        style="color: white; font-size: 12px; text-decoration: none; padding: 10px 5px;"
                        href="?mod=admin&act=client-add">Thêm danh mục</a></button>
                <button id="filter" class="flex-center g8" style="padding: 10px 16px;
                  border: 1px solid #79747E; border-radius: 100px;
                  margin-left: auto;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                        <path d="M7.5 13.5H10.5V12H7.5V13.5ZM2.25 4.5V6H15.75V4.5H2.25ZM4.5 9.75H13.5V8.25H4.5V9.75Z"
                            fill="#6750A4" />
                        <span class="label-medium fw-smb" style="color: #6750a4;">Lọc</span>
                    </svg>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="?mod=admin&act=client">Mới Nhất</a></li>
                    <li><a href="?mod=admin&act=client&sort=old">Cũ nhất</a></li>
                    <li><a href="?mod=admin&act=client&sort=atoz">Từ A - Z</a></li>
                    <li><a href="?mod=admin&act=client&sort=ztoa">Từ Z - A</a></li>
                </ul>
            </div>
        </div>
        <table id="example1" class="content-table width-full">
            <thead>
                <tr>
                    <th style="text-align: start;">
                        <input type="checkbox" style="width: 18px; height: 18px;">
                        </input>
                    </th>
                    <th>ID</th>
                    <th>Họ Và Tên</th>
                    <th>Email</th>
                    <th>Bị Tố cáo</th>
                    <th>Bình Luận</th>
                    <th>Tạo Ngày</th>
                    <th>Khác</th>
                </tr>
            </thead>
            <tbody>
                <?php
                if (!empty($getComment)) {
                    foreach ($getComment as $comment) {
                        $getUserByID = getUserInfo($comment['id_user']);
                        foreach ($getUserByID as $item) {
                            ?>
                            <?php 
                                if($comment['reported'] > 0 && $comment['is_appear'] == 1) {
                                    ?>
                                    <tr class="reported" style="background: #f8d7da; border-color: #f5c6cb">
                                <td style="text-align: start;">
                                    <input type="checkbox" style="width: 18px; height: 18px;">
                                    </input>
                                </td>
                                <td>
                                    <?php echo $comment['id'] ?>
                                </td>
                                <td>
                                    <?php echo $item['fullname'] ?>
                                </td>
                                <td>
                                    <?php echo $item['email'] ?>
                                </td>
                                <td>
                                    <?php echo $comment['reported'] ?>
                                </td>
                                <td style="width: 600px; max-width: 600px;">
                                    <p>
                                        <?php echo $comment['content'] ?>
                                    </p>
                                </td>
                                <td>
                                    <p>
                                        <?php echo $comment['create_date']?>
                                    </p>
                                </td>
                                <td><a href="?mod=admin&act=hiddenCmt&id=<?php echo $comment['id']?>">Ẩn</a> / <a href="?mod=admin&act=delCmt&id=<?php echo $comment['id']?>">Xóa</a></td>
                            </tr>
                                    <?php 
                                }elseif($comment['is_appear'] == 0) {
                                    ?>
                                    <tr class="notAppear">
                                <td style="text-align: start;">
                                    <input type="checkbox" style="width: 18px; height: 18px;">
                                    </input>
                                </td>
                                <td>
                                    <?php echo $comment['id'] ?>
                                </td>
                                <td>
                                    <?php echo $item['fullname'] ?>
                                </td>
                                <td>
                                    <?php echo $item['email'] ?>
                                </td>
                                <td>
                                    <?php echo $comment['reported'] ?>
                                </td>
                                <td style="width: 600px; max-width: 600px;">
                                    <p>
                                        <?php echo $comment['content'] ?>
                                    </p>
                                </td>
                                <td>
                                    <p>
                                        <?php echo $comment['create_date']?>
                                    </p>
                                </td>
                                <td><a href="?mod=admin&act=showCmt&id=<?php echo $comment['id']?>">Hiện</a> / <a href="?mod=admin&act=delCmt&id=<?php echo $comment['id']?>">Xóa</a></td>
                            </tr>
                                <?php 
                                }else {
                                    ?>
                                    <tr>
                                <td style="text-align: start;">
                                    <input type="checkbox" style="width: 18px; height: 18px;">
                                    </input>
                                </td>
                                <td>
                                    <?php echo $comment['id'] ?>
                                </td>
                                <td>
                                    <?php echo $item['fullname'] ?>
                                </td>
                                <td>
                                    <?php echo $item['email'] ?>
                                </td>
                                <td>
                                    <?php echo $comment['reported'] ?>
                                </td>
                                <td style="width: 600px; max-width: 600px;">
                                    <p>
                                        <?php echo $comment['content'] ?>
                                    </p>
                                </td>
                                <td>
                                    <p>
                                        <?php echo $comment['create_date']?>
                                    </p>
                                </td>
                                <td><a href="?mod=admin&act=hiddenCmt&id=<?php echo $comment['id']?>">Ẩn</a> / <a href="?mod=admin&act=delCmt&id=<?php echo $comment['id']?>">Xóa</a></td>
                            </tr>
                                    <?php 
                                    
                                }
                                    ?>
                            <?php
                        }
                    }
                }
                ?>
                <!-- Thêm các hàng dữ liệu vào đây -->
            </tbody>
        </table>

    </div>
    </div>

    <!----======== End Body DashBoard ======== -->

</section>