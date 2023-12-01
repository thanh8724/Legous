<section class="dashboard">
    <!----======== Header DashBoard ======== -->
    <div class="top">
        <i class="fas fa-angle-left sidebar-toggle"></i>
        <div class="search-box">
        <form action="" method="post">
            <i class="far fa-search"></i>
            <input type="text" name="kyw_order" placeholder="Tìm đơn hàng...">
            <button type="submit" name="btn_search" ></button>
            </form>
            <!-- <form action="" method="post">
                <i class="far fa-search"></i>
                <input type="text" name="kyw_order" placeholder="Tìm đơn hàng...">
                <button type="submit" name="btn_search"></button>
            </form> -->

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
            line-height: 32px;">Đơn Hàng</h1>
        </div>
        <!--DateTimelocal-->
        <div class="flex-between width-full" style="gap: 8px;
          align-items: center;">
            <div class="flex g8">
                <span class="label-large">Admin /</span><a href="#" class="label-large"
                    style="text-decoration: none;">Đơn Hàng</a>
            </div>
            <div class="flex-center g8">
            </div>
        </div>
    </div>
    <!----======== End Header DashBoard ======== -->

    <!----======== Body DashBoard ======== -->
    <div class="containerAdmin">
        <div class="flex-column width-full">
        <div class="content-filter dropdown-center width-full d-flex align-items-center justify-content-between">
          <button id="btn_addMore_admin" type="button" style="width:130px;height:45px;background-color:#6750a4;border-radius:10px"><a style="color: white; font-size: 12px; text-decoration: none; padding: 10px 5px;" href="?mod=admin&act=orders-add">Thêm Đơn Hàng</a></button>
                <button id="filter" class="flex-center g8" style="padding: 10px 16px;
                border: 1px solid #79747E; border-radius: 100px;
                margin-left: auto;" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                        <path d="M7.5 13.5H10.5V12H7.5V13.5ZM2.25 4.5V6H15.75V4.5H2.25ZM4.5 9.75H13.5V8.25H4.5V9.75Z"
                            fill="#6750A4" />new DataTable('#example', {
    fixedColumns: true,
    paging: false,
    scrollCollapse: true,
    scrollX: true,
    scrollY: 300
});
                        <span class="label-medium fw-smb" style="color: #6750a4;">Lọc</span>
                    </svg>
                </button>
                <ul class="dropdown-menu">
                    <li><a href="?mod=admin&act=orders&filter=old">Mới Nhất</a></li>
                    <li><a href="?mod=admin&act=orders&filter">Cũ Nhất</a></li>
                    <li><a href="?mod=admin&act=orders&filter=status&status=1">Đang Chờ Xác Nhận</a></li>
                    <li><a href="?mod=admin&act=orders&filter=status&status=2">Đang Chờ Lấy Hàng</a></li>
                    <li><a href="?mod=admin&act=orders&filter=status&status=3">Đang Giao</a></li>
                    <li><a href="?mod=admin&act=orders&filter=status&status=6">Đã Hủy</a></li>
                    <li><a href="?mod=admin&act=orders&filter=status&status=5">Đã Giao</a></li>  
                    <li><a href="?mod=admin&act=orders&filter=status&status=4">Hoàn Đơn</a></li>  
                    <li><a href="?mod=admin&act=orders&filter=price">Đơn (1 Triệu >)</a></li>  
                </ul>
            </div>
        </div>
        <table  id="example1" class="content-table width-full">
            <thead>
                <tr>
                    <!-- <th style="text-align: start;">
                        <input type="checkbox" style="width: 18px; height: 18px;">
                        </input>
                    </th> -->
                    <th>Order ID</th>
                    <th>Tên Khách Hàng</th>
                    <th>Phương Thức Thanh Toán</th>
                    <th>Ngày Đặt</th>
                    <th>Trạng Thái</th>
                    <th>Tổng giá</th>
                    <th>Khác</th>
                </tr>
            </thead>
            <tbody>
                <!-- Thêm các hàng dữ liệu vào đây -->
                <!-- <tr>
            <td style="text-align: start;">
              <input type="checkbox" style="width: 18px; height: 18px;">
              </input>
            </td>
            <td>#123891</td>
            <td>David Johnson</td>
            <td>Paypal</td>
            <td>Feb 24, 2023</td>
            <td style="color: #00B3FF;">Đã Giao Hàng</td>
            <td>12.289.090 đ</td>
            <td><a href="">Xem chi tiết</a></td>
          </tr>
          <tr>
            <td style="text-align: start;">
              <input type="checkbox" style="width: 18px; height: 18px;">
              </input>
            </td>
            <td>#123891</td>
            <td>David Johnson</td>
            <td>Paypal</td>
            <td>Feb 24, 2023</td>
            <td style="color: #00C58A;">Đang Chờ</td>
            <td>12.289.090 đ</td>
            <td><a href="">Xem chi tiết</a></td>
          </tr>
          <tr>
            <td style="text-align: start;">
              <input type="checkbox" style="width: 18px; height: 18px;">
              </input>
            </td>
            <td>#123891</td>
            <td>David Johnson</td>
            <td>Paypal</td>
            <td>Feb 24, 2023</td>
            <td style="color: #B3261E;">Đã Hủy</td>
            <td>12.289.090 đ</td>
            <td><a href="">Xem chi tiết</a></td>
          </tr> -->
                <?php foreach ($get_Order as $value):?>
                  
                <?php
                $getUser = getUserById($value['id_user']);
                $getPayment = payment($value['id_user']);
                $getProduct = getProductById($value['id_user']);
                $getShipping = shipping($value['id_shipping']);
            //number_format
            $formatted_number = number_format($value['total'], 0, ',', '.');
            $status_order = '';
                if($value['status'] == 1){
                  $status_order = '<td style="color:#00C58A;">Đang Chờ</td>';
                }
                elseif($value['status'] == 2){
                  $status_order = '<td style="color:#707070;">Chờ Lấy Hàng</td>';
                }
                elseif($value['status'] == 3){
                  $status_order = '<td style="color:#FF9900;">Đang Giao</td>';
                }
                elseif($value['status'] == 4){
                  $status_order = '<td style="color:#B3261E;">Hoàn Đơn</td>';
                }
                elseif($value['status'] == 6){
                  $status_order = '<td style="color:#B3261E;">Đã Hủy</td>';
                }
                elseif($value['status'] == 5){
                  $status_order = '<td style="color:#00B3FF;">Đã Giao</td>';
                }
              ?>
              <?php
              $bill_cl_st = '';
                if($value['status'] == 6)
                $bill_cl_st = 'style = "background-color: rgba(128, 128, 128, 0.233);"';
                elseif($value['status'] == 5)
                $bill_cl_st = 'style = "background-color:rgba(34,187,51, 0.3);"';
              ?>
                <tr <?=$bill_cl_st?>>
                    <!-- <td style="text-align: start;">
                        <input type="checkbox" style="width: 18px; height: 18px;">
                        </input>
                    </td> -->
                    <td>
                        <?=$value['id']?>
                    </td>
                    <td>
                        <?=$getUser['fullname']?>
                    </td>
                    <td>
                    <?=$getPayment[0]['name']?>   
                    </td>
                    <td>
                        <?=$value['create_date']?>
                    </td>
                    <?=$status_order?>
                    <td>
                        <?=$formatted_number?> đ
                    </td>
                    <td><a href="?mod=admin&act=orders&id=<?=$value['id']?>">Xem chi tiết</a></td>
                </tr>
                <?php endforeach;?>
                <?php if(@$_GET['id']):?>
                <div style=" 
                font-size: 16px;
                display:block;
                position: fixed; /* Stay in place */
                z-index: 99; /* Sit on top */
                padding-top: 15px; /* Location of the box */
                left: 0;
                top: 0;
                width: 100%; /* Full width */
                height: 100%; /* Full height */
                overflow: auto; /* Enable scroll if needed */
                background-color: rgba(0,0,0,0.4); /* Black w/ opacity */" id="myModal" class="modal">
                    <!-- Modal content -->
                    <div style=" background-color: #fefefe;
                margin: auto;
                padding: 20px;
                border: 1px solid #888;
                width: 70%;" class="modal-content">
                        <a href="?mod=admin&act=orders" style="width:100%;"><span style="float: inline-end;font-size:20px; cursor: pointer;"
                                class="close">&times;</span></a>
                        <form action="?mod=admin&act=orders&id=<?=$_GET['id']?>" method="POST" enctype="multipart/form-data">
                          <div class="row d-flex">
                            <div class="col-6" style="overflow: auto; height:600px;">
                              <h1 style="margin-bottom: 20px;">Người Đặt</h1>
                              <div style="margin-bottom: 20px;">
                                <hr>
                                <?php
                                ?>
                                  <h4>Tên Người Mua</h4>
                                  <p><?=$name_user['fullname']?></p>
                                </div>
                              <div style="margin-bottom: 20px;">
                                <h4>Địa Chỉ Người Mua</h4>
                                <p><?=$getAddress['address']?></p>
                              </div>
                              <div style="margin-bottom: 20px;">
                                <h4>Email</h4>
                                <p><?=$name_user['email']?></p>
                              </div>
                              <div style="margin-bottom: 20px;">
                                <h4>Số Điện Thoại</h4>
                                <p><?=$name_user['phone']?></p>
                                <hr>
                              </div>
                              <h1 style="margin-bottom: 20px;">Người Nhận</h1>
                              <div style="margin-bottom: 20px;">
                                  <h4>Tên Người Nhận</h4>
                                  <p><?=$Id_bill[0]['name_recipient']?></p>
                              </div>
                              <div style="margin-bottom: 20px;">
                                <h4>Địa Người Nhận</h4>
                                <p><?=$Id_bill[0]['address_recipient']?></p>
                              </div>
                              <div style="margin-bottom: 20px;">
                                <h4>Email</h4>
                                <p><?=$Id_bill[0]['email_recipient']?></p>
                              </div>
                              <div style="margin-bottom: 20px;">
                                <h4>Số Điện Thoại</h4>
                                <p><?=$Id_bill[0]['phone_recipient']?></p>
                              </div>
                            </div>
                            <div class="col-6"> 
                            <h1 style="margin-bottom: 20px;">Đơn Hàng</h1>
                            <div class="row d-flex">
                              <hr>
                              <div style="margin-bottom: 20px;">
                                <h4>Tên Đơn Hàng - Danh Mục:</h4>
                                <?php foreach ($get_product_order as $value):?>
                                  <?php
                                      $category_bill = getCategoryById($value['category']);
                                    ?>
                                  <div class="d-flex">
                                    <p><?=$value['product_name']?></p> -
                                    <p><?=$category_bill['name']?></p>
                                  </div>
                                <?php endforeach;?>
                              </div>
                              
                              <div style="margin-bottom: 20px;" class="d-flex align-items-center">
                                <h4 style="margin:0 5px 0 0 ;">Cách Thức Giao Hàng:</h4>
                                <p> <?=$shipping[0]['name'] ?></p>
                              </div>
                              <div style="margin-bottom: 20px;" class="d-flex align-items-center">
                                <h4 style="margin:0 5px 0 0 ;">Áp Dụng Mã Giảm Giá:</h4>
                                <p></p>
                              </div>
                              <div style="margin-bottom: 20px;" class="d-flex align-items-center">
                                <h4 style="margin:0 5px 0 0 ;">Phương thức thanh toán:</h4>
                                <p><?=$payment[0]['name']?></p>
                              </div>
                              <div style="margin-bottom: 20px;" class="d-flex align-items-center">
                                <h4 style="margin:0 5px 0 0 ;">Ngày Đặt Hàng: </h4>
                                <p><?=$Id_bill[0]['create_date']?></p>
                              </div>
                              <?php
                                  $tax = $Id_bill[0]['total'] * 0.1;
                                  $total = $Id_bill[0]['total'] - $tax;
                                  $formatted_number_id = number_format($total, 0, ',', '.');
                                ?>
                              <div>
                                <h4>Địa Chỉ Nhận hàng Hàng:</h4>
                                <p><?=$Id_bill[0]['address_recipient']?></p>
                                <hr>
                              </div>
                              <div><h5 style="margin:0 5px 0 0 ;">(Thuế 10%):-<?=number_format($tax, 0, ',', '.')?>đ</h5></div>
                              <div  class="d-flex align-items-center">
                                <h4 style="margin:0 5px 0 0 ;">Tổng Đơn Hàng: </h4>
                                
                                
                                <p><?=$formatted_number_id?>đ</p>
                              </div>
                              <div class="custom-select">
                                <hr>
                              <h4>Trạng Thái Đơn Hàng:(Hiện tại)</h4>
                                    <!-- Dropdown -->
                                    
                                    <select id="id_category" name="change_status">
                                            <?php
                                              if($Id_bill[0]['status'] == 1){
                                                echo'
                                                <option style="display:none;" value="1">Đang Chờ</option>
                                                <option value="2">Chờ Lấy Hàng</option>
                                                <option value="3">Đang Giao</option>
                                                <option style="display:none;" value="4">Hoàn Đơn</option>
                                                <option value="5">Đã Giao</option>
                                                <option value="6">Hủy Đơn</option>
                                                ';
                                              }
                                              elseif($Id_bill[0]['status'] == 2){
                                                echo'
                                                <option style="display:none;" value="2">Chờ Lấy Hàng</option>
                                                <option value="3">Đang Giao</option>
                                                <option value="4">Hoàn Đơn</option>
                                                <option value="5">Đã Giao</option>
                                                <option value="6">Hủy Đơn</option>
                                                <option value="1">Đang Chờ</option>
                                                ';
                                              }
                                              elseif($Id_bill[0]['status'] == 3){
                                                echo'
                                                <option style="display:none;" value="3">Đang Giao</option>
                                                <option value="4">Hoàn Đơn</option>
                                                <option value="5">Đã Giao</option>
                                                <option value="6">Hủy Đơn</option>
                                                <option style="display:none;" value="1">Đang Chờ</option>
                                                <option style="display:none;" value="2">Chờ Lấy Hàng</option>
                                                ';
                                              }
                                              elseif($Id_bill[0]['status'] == 4){
                                                echo'
                                                <option style="display:none;" value="4">Hoàn Đơn</option>
                                                <option value="5">Đã Giao</option>
                                                <option value="6">Hủy Đơn</option>
                                                <option value="1">Đang Chờ</option>
                                                <option value="2">Chờ Lấy Hàng</option>
                                                <option value="3">Đang Giao</option>
                                                ';
                                              }
                                              elseif($Id_bill[0]['status'] == 5){
                                                echo'
                                                <option value="5">Đã Giao</option>
                                                <option style="display:none;" value="6">Hủy Đơn</option>
                                                <option style="display:none;" value="1">Đang Chờ</option>
                                                <option style="display:none;" value="2">Chờ Lấy Hàng</option>
                                                <option style="display:none;" value="3">Đang Giao</option>
                                                <option style="display:none;" value="4">Hoàn Đơn</option>
                                                ';
                                              }
                                              elseif($Id_bill[0]['status'] == 6){
                                                echo'
                                                <option value="6">Hủy Đơn</option>
                                                <option style="display:none;" value="1">Đang Chờ</option>
                                                <option style="display:none;" value="2">Chờ Lấy Hàng</option>
                                                <option style="display:none;" value="3">Đang Giao</option>
                                                <option style="display:none;" value="4">Hoàn Đơn</option>
                                                <option style="display:none;" value="5">Đã Giao</option>
                                                ';
                                              }
                                            ?>
                                    </select>
                            </div>
                          </div>
                            <button type="submit" name="submit" class="btn btn-primary float-end p-3">Cập nhật</button>
                            <a type="submit" data-bs-toggle="modal" role="button" href="#exampleModalToggle" name="submit" class="btn btn-danger mx-5 float-end p-3">Xóa Đơn Hàng</a>
                        </form>
                    </div>
                </div>
                <?php endif;?>

            </tbody>
        </table>

    </div>
    </div>
<!-- Popup thông báo -->
<form action="" method="post">
<div style="background-color: rgba(128, 128, 128, 0.99);" class="modal fade" id="exampleModalToggle" aria-hidden="true" aria-labelledby="exampleModalToggleLabel" tabindex="-1">
                                <div  class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content">
                                    <div class="modal-header justify-content-center ">
                                        <h5 class="modal-title d-flex align-items-center"  id="staticBackdropLabel"><img src="./public/assets/media/images/logo.png" alt=""><p style="margin-left:10px; font-size:20px; color:#6750a4;">XÁC NHẬN</p></h5>
                                    </div>
                                    <div class="modal-body text-center">
                                        <h3 class="text-danger">Bạn có muốn xóa đơn hàng này ?</h3>
                                    </div>
                                    <div class="modal-footer d-flex justify-content-between">
                                        <button style="padding:12px 20px;" type="button" class="btn btn-danger" data-bs-dismiss="modal">Không Xóa</button>
                                        <input style="padding:12px 20px;" class="btn btn-primary" type="submit" name="delete_bill" value="Chập Nhận Xóa">
                                    </div>
                                    </div>
                                </div>
</div>
</form>
                                
    <!--End popup thông báo -->
    <!----======== End Body DashBoard ======== -->

</section>