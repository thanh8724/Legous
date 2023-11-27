    <section class="dashboard">
    <!----======== Header DashBoard ======== -->
    <div class="top">
        <i class="fas fa-angle-left sidebar-toggle"></i>
        <form style="width: 100%;display:flex; justify-content: center;" action="" method="post">
            <div class="search-box">
                <input type="submit" value=""><i class="far fa-search"></i>

                <input name="act_search" value="" type="text" placeholder="Search here...">
            </div>
        </form>
        <div class="info-user">
            <i class="far fa-comment-alt"></i>
            <i class="fal fa-bell"></i>
            <img src="/public/assets/media/images/users/user-1.svg" alt="">
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
                    <th>Ảnh</th>
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
                                    <div
                                        class="col-12 d-flex flex-wrap justify-content-center position-relative align-items-center cmt_img_item">
                                        <img class="position-relative cmt_img" style="width: 50px; height: 50px; border-radius: 5px;"
                                            src="../assets/media/images/users/profile.jpg" alt="">
                                        <p class="position-absolute cmt_img_amount label-large" style="width:20px;height:20px;background-color: #6750a4; border-radius:5px; color:white; top:-10px;right:0;">6</p>
                                    </div>
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
                                    <div
                                        class="col-12 d-flex flex-wrap justify-content-center position-relative align-items-center cmt_img_item">
                                        <img class="position-relative cmt_img" style="width: 50px; height: 50px; border-radius: 5px;"
                                            src="../assets/media/images/users/profile.jpg" alt="">
                                        <p class="position-absolute cmt_img_amount label-large" style="width:20px;height:20px;background-color: #6750a4; border-radius:5px; color:white; top:-10px;right:0;">6</p>
                                    </div>
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
                                    <div
                                        class="col-12 d-flex flex-wrap justify-content-center position-relative align-items-center cmt_img_item">
                                        <img class="position-relative cmt_img" style="width: 50px; height: 50px; border-radius: 5px;"
                                            src="../assets/media/images/users/profile.jpg" alt="">
                                        <p class="position-absolute cmt_img_amount label-large" style="width:20px;height:20px;background-color: #6750a4; border-radius:5px; color:white; top:-10px;right:0;">6</p>
                                    </div>
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