<main class="main__user">
    <div class="main__inner">
        <div class="main__inner--bottom flex-column">
            <div class="main__inner--bottom-container flex-column rounded-2 p30 g30 ">
                <?php
                    foreach ($order as $item) {
                       extract($item);
                       $name_payment = get_namePayment($id_payment);
                       $name_shipping = get_nameShipping($id_shipping);
                       $fullname = get_fullname($id_user);
                       $getHTML = "";
                       if($status == 1){
                           $getHTML = '<span style="color: gray;" class="label-large-prominent">Chờ xác nhận</span>';
                       }elseif($status == 2){
                           $getHTML = '<span style="color: black;" class="label-large-prominent pending">Chờ lấy hàng</span>';
                       }elseif($status == 3){
                           $getHTML = '<span class="label-large-prominentd elivered">Đang giao hàng</span>';
                       }elseif($status == 4){
                           $getHTML = '<span class="label-large-prominent return">Hoàn/Trả</span>';
                       }elseif($status == 5){
                           $getHTML = '<span class="label-large-prominent  pending">Đã giao hàng</span>';
                       }
                       else{
                           $getHTML = '<span class="label-large-prominent canceled">Đã hủy</span>';
                       }
                       echo'
                            <div class="main__inner--bottom  fist--container flex-column">
                                Mã đơn hàng : #'.$id.'
                                <div class="fist--container date  center ">
                                    <i style="margin-right: 1rem;" class="fa-solid fa-calendar-days"></i>'.$create_date.'
                                </div>
                                <div class="pending">'.$getHTML.'</div>
                            </div>
                            <div class="main__inner--bottom light-devider " style="height: .1rem; width: 100%"></div>
                            <div class="main__inner--bottom second--container flex   g30">
                                <div class="second--container box-content flex g30 ">
                                    <i class="fa-regular fa-user"></i>
                                    <div class="box-content content flex-column  g8">
                                        <h3>Khách hàng</h3>
                                        <p style="font-size: 1.5rem";>Họ và tên:  '.$fullname.'</p>
                                        <p>Email: '.$email_recipient.'</p>
                                        <p>Điện thoại: '.$phone_recipient.'</p>
                                        
                                    </div>
                                </div>
                                <div class="second--container box-content flex g30 ">
                                    <i class="fa-solid fa-wallet"></i>
                                    <div class="box-content content flex-column  g8">
                                        <h3>Thông tin đặt hàng</h3>
                                        <p>Phương thức vận chuyển: </br> '. $name_shipping.' </p>
                                        <p>Phương thức thanh toán:  </br>'.$name_payment.'</p>
                                        
                                    </div>
                                </div>
                                <div class="second--container box-content flex g30 ">
                                    <i class="fa-solid fa-wallet"></i>
                                    <div class="box-content content flex-column  g8">
                                        <h3>Giao hàng tới</h3>
                                        <p>Địa chỉ: '.$address_recipient.' </p>
                                        
                                    </div>
                                </div>
                            </div>

                       ';
                    }
                ?>
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
                            $shipping_price = get_priceShipping($id_shipping);
                            $coupon = get_priceCoupon($id_coupon);
                            $total_all = ($total_price + $tax + $shipping_price) - $coupon ; 
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
                                        <span>Phí vận chuyển</span>
                                        <span>'.formatVND($shipping_price).'</span>
                                </div>
                                <div class="main__inner--info-orderTop---item flex flex-between g60">
                                    <span>Giảm giá</span>
                                    <span>- '.formatVND($coupon).'</span>
                                </div>
                                <div class="main__inner--info-orderTop---item flex flex-between g60">
                                    <span class="all_price">Tổng giá</span>
                                    <span class="all_price">'.formatVND($total_all).'</span>
                                </div>
                                
                            ';
                        
                        ?>
                     
                    </div>
                </div>
                <div class="main__inner--info-orderBottom flex v-center label-large text-btn btn rounded-100" onclick="button_back()" style="width: fit-content">
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