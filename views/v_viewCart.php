<?php 
    if (isset($_SESSION['cart'])) {
        print_r($_SESSION['cart']);
    }
?>


<section class="section shop__title flex-column mt80 g30">
    <div class="flex flex-between a-end" style="">
        <div class="flex g6">
            <span class="primary-masking-text text-46" style="">3</span>
            <span class="text-small-primary-masking" style="">SẢN PHẨM</span>
        </div>
        <div class="info flex-column g20">
            <h1 class="text-large">GIỎ HÀNG</h1>
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="4" viewBox="0 0 63 4" fill="none">
                <path d="M1.99219 2H61.0007" stroke="black" stroke-opacity="0.2" stroke-width="4"
                    stroke-linecap="round" />
            </svg>
            <span class="label-large fw-smb">LEGOUS / CART</span>
        </div>
    </div>
    <div class="container-cart flex-column flex-center flex-full g20" style="justify-content: space-between;">
        <!-- cart -->
        <div class="cart flex-center width-full" style="justify-content: space-between;">
            <div class="info-cart-start flex g16">
                <div class="img-cart">
                    <img src="/public/assets/media/images/product/v944cyfrwt851.webp" alt="">
                </div>
                <div class="text-cart text-start flex-column g18 flex-center" style="align-items: flex-start;">
                    <h1 class="title-medium fw-smb">ProductName</h1>
                    <div class="collection__item flex g6">
                        <span class="body-medium fw-normal">Collection</span>
                        <span class="body-medium">NARUTO</span>
                    </div>
                </div>
            </div>
            <div class="heart">
                <!--<i class="fas fa-heart pulse"></i> -->
                <i class="far fa-heart js-heart heart"></i>
            </div>
            <div class="priceProduct">
                <span class="fw-smb">1.289.099 VNĐ</span>
            </div>
            <div class="quality flex">
                <button class="minus-btn" onclick="handleMinus()"><i class="fa-solid fa-minus"></i></button>
                <input class="fw-smb" type="text" name="amount" id="amount" value="1">
                <button class="plus-btn" onclick="handlePlus()"><i class="fa-solid fa-plus"></i></button>
            </div>
            <div class="close">
                <button class="btn-close"><i class="fa-solid fa-x"></i></button>
            </div>
        </div>
        <div class="cart flex-center width-full" style="justify-content: space-between;">
            <div class="info-cart-start flex g16">
                <div class="img-cart">
                    <img src="/public/assets/media/images/product/v944cyfrwt851.webp" alt="">
                </div>
                <div class="text-cart text-start flex-column g18 flex-center" style="align-items: flex-start;">
                    <h1 class="title-medium fw-smb">ProductName</h1>
                    <div class="collection__item flex g6">
                        <span class="body-medium fw-normal">Collection</span>
                        <span class="body-medium">NARUTO</span>
                    </div>
                </div>
            </div>
            <div class="heart">
                <!--<i class="fas fa-heart pulse"></i> -->
                <i class="far fa-heart js-heart heart"></i>
            </div>
            <div class="priceProduct">
                <span class="fw-smb">1.289.099 VNĐ</span>
            </div>
            <div class="quality flex">
                <button class="minus-btn" onclick="handleMinus()"><i class="fa-solid fa-minus"></i></button>
                <input class="fw-smb" type="text" name="amount" id="amount" value="1">
                <button class="plus-btn" onclick="handlePlus()"><i class="fa-solid fa-plus"></i></button>
            </div>
            <div class="close">
                <button class="btn-close"><i class="fa-solid fa-x"></i></button>
            </div>
        </div>
        <div class="cart flex-center width-full" style="justify-content: space-between;">
            <div class="info-cart-start flex g16">
                <div class="img-cart">
                    <img src="/public/assets/media/images/product/v944cyfrwt851.webp" alt="">
                </div>
                <div class="text-cart text-start flex-column g18 flex-center" style="align-items: flex-start;">
                    <h1 class="title-medium fw-smb">ProductName</h1>
                    <div class="collection__item flex g6">
                        <span class="body-medium fw-normal">Collection</span>
                        <span class="body-medium">NARUTO</span>
                    </div>
                </div>
            </div>
            <div class="heart">
                <!--<i class="fas fa-heart pulse"></i> -->
                <i class="far fa-heart js-heart heart"></i>
            </div>
            <div class="priceProduct">
                <span class="fw-smb">1.289.099 VNĐ</span>
            </div>
            <div class="quality flex">
                <button class="minus-btn" onclick="handleMinus()"><i class="fa-solid fa-minus"></i></button>
                <input class="fw-smb" type="text" name="amount" id="amount" value="1">
                <button class="plus-btn" onclick="handlePlus()"><i class="fa-solid fa-plus"></i></button>
            </div>
            <div class="close">
                <button class="btn-close"><i class="fa-solid fa-x"></i></button>
            </div>
        </div>

        <!-- cart end -->
    </div>
    <div class="line flex-center">
        <div style="min-width: 468px; height: 2px; background: #CAC4D0; border-radius: 8px;">

        </div>
    </div>
    <!-- bill check out -->
    <div class="bill-checkout flex" style="padding: 60px 0px;justify-content: space-between;">
        <div class="bill-text-left flex-column g20">
            <h1 class="text-large">TỔNG ĐƠN</h1>
            <svg xmlns="http://www.w3.org/2000/svg" width="50" height="4" viewBox="0 0 63 4" fill="none">
                <path d="M1.99219 2H61.0007" stroke="black" stroke-opacity="0.2" stroke-width="4"
                    stroke-linecap="round" />
            </svg>
            <span class="label-large fw-smb">GIỎ HÀNG</span>
        </div>
        <div class="bill-text-right flex-column" style="gap: 36px; width: 45%;">
            <div class="tex-products flex-column g16">
                <!-- text products -->
                <div class="flex g16" style="justify-content: space-between;">
                    <h1 class="title-medium">ProductName</h1>
                    <div class="line flex-center">
                        <div style="min-width: 200px; height: 2px; background: #CAC4D0; border-radius: 8px;">
                        </div>
                    </div>
                    <span class="title-medium">1.289.089 VNĐ</span>
                </div>
                <div class="flex g16" style="justify-content: space-between;">
                    <h1 class="title-medium">ProductName</h1>
                    <div class="line flex-center">
                        <div style="min-width: 200px; height: 2px; background: #CAC4D0; border-radius: 8px;">
                        </div>
                    </div>
                    <span class="title-medium">1.289.089 VNĐ</span>
                </div>
                <div class="flex g16" style="justify-content: space-between;">
                    <h1 class="title-medium">ProductName</h1>
                    <div class="line flex-center">
                        <div style="min-width: 200px; height: 2px; background: #CAC4D0; border-radius: 8px;">
                        </div>
                    </div>
                    <span class="title-medium">1.289.089 VNĐ</span>
                </div>
                <!-- text products end -->
            </div>
            <div class="line flex-center">
                <div class="width-full" style="height: 2px; background: #CAC4D0; border-radius: 8px;">
                </div>
            </div>
            <div class="text-shiping-method flex-column g6">
                <h1 class="title-medium">Phương thức vận chuyển</h1>
                <p class="body-medium">Dựa trên phương thức vận chuyển mà bạn lựa chọn ở bước tiếp theo, chúng tôi sẽ
                    tính thêm khoản phí tương ứng vào đơn hàng của bạn.</p>
            </div>
            <div class="line flex-center">
                <div class="width-full" style="height: 2px; background: #CAC4D0; border-radius: 8px;">
                </div>
            </div>
            <div class="text-shiping-method flex-column g6">
                <h1 class="title-medium">Phương thức thanh toán</h1>
                <p class="body-medium">Dựa trên phương thức thanh toán mà bạn lựa chọn ở bước tiếp theo, đơn hàng sẽ
                    được thanh toán nhanh nhất có thể dựa trên lựa chọn của bạn.</p>
            </div>
            <div class="flex g16" style="justify-content: space-between;">
                <h1 class="title-medium" style="font-size: 18px;">Tổng tiền</h1>
                <div class="line flex-center">
                    <div style="min-width: 300px; height: 2px; background: #CAC4D0; border-radius: 8px;">
                    </div>
                </div>
                <span class="toltal-money title-medium">9.999.999 VNĐ</span>
            </div>

            <button class="btn primary-btn">Đăng nhập</button>
        </div>
    </div>
    <!-- bill check out  end -->
</section>