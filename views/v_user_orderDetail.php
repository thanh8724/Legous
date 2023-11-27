<main class="main__user">
    <div class="main__inner">
        <div class="main__inner--bottom flex-column">
            <div class="main__inner--bottom-left menu__left--detail">
                <!-- menu mobile start -->
                <div class="box__menu--mobile">
                        <ul class="menu__mobile--ul auto-grid">
                            <li class="menu__mobile--li">
                                <a href="user-general.html">
                                    <i class="fas fa-home"></i>
                                    <span>Tổng quan</span>
                                </a>
                            </li>
                            <li class="menu__mobile--li">
                                <a href="user-editProfile.html">
                                    <i class="fas fa-edit"></i>
                                    <span>Chỉnh sửa</span>
                                </a>
                            </li>
                            <li class="menu__mobile--li">
                                <a href="user-password.html">
                                    <i class="fas fa-lock"></i>
                                    <span>Mật khẩu</span>
                                </a>
                            </li>
                            <li class="menu__mobile--li">
                                <a href="user-address.html">
                                    <i class="fas fa-map-marker-alt"></i>
                                    <span>Địa chỉ</span>
                                </a>
                            </li>
                            <li class="menu__mobile--li">
                                <a href="user-ordersHistory.html">
                                    <i class="fas fa-history"></i>
                                    <span>Đơn hàng</span>
                                </a>
                            </li class="menu__mobile--li">
                            <li class="menu__mobile--li">
                                <a href="">
                                    <i class="fas fa-sign-out-alt"></i>
                                    <span>Đăng xuất</span>
                                </a>
                            </li>
                            <li class="menu__mobile--li">
                                <a href="">
                                    <i class="fas fa-exchange-alt"></i>
                                    <span>Chuyển đổi</span>
                                </a>
                            </li>
                            <li class="delete__acccount menu__mobile--li">
                                <a href="user-deleteAccount.html">
                                    <i class="fas fa-user-times"></i>
                                <span>Xóa tài khoản</span>
                            </a>
                            </li>
                        </ul>
                    </div>
                <!-- menu mobile end -->
            </div>
            <div class="main__inner--bottom-container flex-column rounded-2 p30 g30 ">
                <?php
                    foreach ($order as $item) {
                        extract($item);
                        $name_payment = get_namePayment($id_payment);
                        $name_shipping = get_nameShipping($id_shipping);
                        $fullname = get_fullname($id_user);
                        echo'
                            <div class="main__inner--bottom  fist--container flex-column">
                                Mã đơn hàng :  '.$id.'
                                <div class="fist--container date  center ">
                                    <i style="margin-right: 1rem;" class="fa-solid fa-calendar-days"></i>'.$create_date.'
                                </div>
                                <div class="pending">'.$status.'</div>
                            </div>
                            <div class="main__inner--bottom light-devider " style="height: .1rem; width: 100%"></div>
                            <div class="main__inner--bottom second--container flex   g30">
                                <div class="second--container box-content flex g30 ">
                                    <i class="fa-regular fa-user"></i>
                                    <div class="box-content content flex-column  g8">
                                        <h3>Khách hàng</h3>
                                        <p style="font-size: 1.5rem";>Họ và tên:  '.$fullname.'</p>
                                        <p>Email:'.$email_recipient.'</p>
                                        <p>Điện thoại: '.$phone_recipient.'</p>
                                        <button class="text-btn ">Xem chi tiết</button>
                                    </div>
                                </div>
                                <div class="second--container box-content flex g30 ">
                                    <i class="fa-solid fa-wallet"></i>
                                    <div class="box-content content flex-column  g8">
                                        <h3>Thông tin đặt hàng</h3>
                                        <p>Phương thức vận chuyển: '. $name_shipping.' </p>
                                        <p>Phương thức thanh toán: '.$name_payment.'</p>
                                        <button class="text-btn ">Tải xuống chi tiết</button>
                                    </div>
                                </div>
                                <div class="second--container box-content flex g30 ">
                                    <i class="fa-solid fa-wallet"></i>
                                    <div class="box-content content flex-column  g8">
                                        <h3>Giao hàng tới</h3>
                                        <p>Địa chỉ: '.$address_recipient.' </p>
                                        <button class="text-btn ">Tải xuống chi tiết</button>
                                    </div>
                                </div>
                            </div>

                       ';
                    }
                ?>
                <!-- <div class="main__inner--bottom  fist--container flex-column">
                    Order ID: #234923
                    <div class="fist--container date  center ">
                        <i style="margin-right: 1rem;" class="fa-solid fa-calendar-days"></i>Aug 21, 2023 - Aug 28, 2023
                    </div>
                    <div class="pending">Pending</div>
                </div> -->
                <!-- <div class="main__inner--bottom light-devider " style="height: .1rem; width: 100%"></div> -->
                <!-- <div class="main__inner--bottom second--container flex start g30">
                    <div class="second--container box-content flex g30 ">
                        <i class="fa-regular fa-user"></i>
                        <div class="box-content content flex-column  g8">
                            <h3>Customer</h3>
                            <p>Full name: <br>  Don Vito Corleone</p>
                            <p>Email: <br> anonymus@gmail.com</p>
                            <p>Phone: <br> 0293848329</p>
                            <button class="text-btn ">View Profile</button>
                        </div>
                    </div>
                    <div class="second--container box-content flex g30 ">
                        <i class="fa-solid fa-wallet"></i>
                        <div class="box-content content flex-column  g8">
                            <h3>Order Info</h3>
                            <p>Shipping method: Standard</p>
                            <p>Payment method: Cash</p>
                            <p>Status:  Pending</p>
                            <button class="text-btn ">Download Info</button>
                        </div>
                    </div>
                    <div class="second--container box-content flex g30 ">
                        <i class="fa-solid fa-wallet"></i>
                        <div class="box-content content flex-column  g8">
                            <h3>Deliver To</h3>
                            <p>Address: Santa Ana, Illinois 85486 </p>
                            <p>2972 Westheimer Rd. Block 9A</p>
                            <button class="text-btn ">Download Info</button>
                        </div>
                    </div>
                </div> -->
                <div class="main__inner--bottom light-devider " style="height: .1rem; width: 100%"></div>
                <div class="main__inner--bottom finally--container flex-column ">
                    <h2>Sản phẩm</h2>
                    <div class="box__table">
                        <table>
                            <thead>
                                <tr>
                                    <!-- <th class="label-large-prominent"><input type="checkbox"></th> -->
                                    <th class="label-large-prominent">Tên Sản Phẩm</th>
                                    <th class="label-large-prominent">Giá Sản Phẩm</th>
                                    <th class="label-large-prominent">Số Lượng</th>
                                    <th class="label-large-prominent">Tổng Giá</th>
                                </tr>
                            </thead>
                            <?php
                                $total_price = 0;
                                foreach ($product_order as $item) {
                                    extract($item);
                                    $total_price += $total_cost;
                                    echo'<tbody>
                                        <tr>
                                            <td class="label-large-prominent"><span>'.$product_name.'</span></td>
                                            <td class="label-large-prominent"><span>'.formatVND($unit_price).'</span></td>
                                            <td class="label-large-prominent"><span>'.$qty.'</span></td>
                                            <td class="label-large-prominent"><span>'.formatVND($total_cost).'</span></td>
                                        </tr>
                                    </tbody>
                                    ';
                                }
                            ?>
                        </table>
                       
                    </div>
                </div>
            </div>
            <div class="main__inner--info-order full flex-column g30">
                <div class="main__inner--info-orderTop flex j-end">
                    <div class="ain__inner--info-orderTop---items flex-column g12">
                        <?php
                            $tax = $total_price / 100 * 10;
                            $total_all = $total_price + $tax; 
                            echo'
                                <div class="main__inner--info-orderTop---item flex flex-between g60">
                                <span>Tổng giá trị sản phẩm</span>
                                <span>'.formatVND($total_price).'</span>
                                </div>
                                <div class="main__inner--info-orderTop---item flex flex-between g60">
                                    <span>Thuế (10%)</span>
                                    <span>'.formatVND($tax).'</span>
                                </div>
                                <div class="main__inner--info-orderTop---item flex flex-between g60">
                                    <span>Giảm giá</span>
                                    <span>0 VNĐ</span>
                                </div>
                                <div class="main__inner--info-orderTop---item flex flex-between g60">
                                    <span class="all_price">Tổng giá</span>
                                    <span class="all_price">'.formatVND($total_all).'</span>
                                </div>
                                <div class="main__inner--info-orderTop---item flex flex-between g60">
                                    <span>Trạng thái</span>
                                    <span class="status-order">'.$status.'</span>
                                </div>
                            ';
                        
                    ?>
                     
                    </div>
                </div>
                <div class="main__inner--info-orderBottom flex v-center label-large" onclick="button_back()">
                    <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                        <path d="M15 8.25H5.8725L10.065 4.0575L9 3L3 9L9 15L10.0575 13.9425L5.8725 9.75H15V8.25Z" fill="#6750A4"/>
                        </svg>
                        Trở về lịch sử đơn hàng
                </div>
            </div>
        </div>
    </div>
    <div class="form__address--container" style="display: none;"></div>
</main>