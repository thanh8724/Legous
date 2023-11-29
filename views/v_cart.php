<?php
// render cart products 
$cartHtml = '';
$productSummary = '';
$cartAmount = 0;
$cartTotal = 0;
if (isset($_SESSION['cart']) && count($_SESSION['cart']) > 0) {
    $cartAmount = count($_SESSION['cart']);

    foreach ($_SESSION['cart'] as $item) {
        extract($item);
        $cartTotal += $price * $qty;
        $tax = $cartTotal * 0.1;
        $imgPath = constant('PRODUCT_PATH') . $img;
        $categoryName = getCategoryById(getIdCategoryByIdProducts($id))['name'];
        $price = formatVND($item['price'] * $qty);

        $cartHtml .=
            <<<HTML
                <!-- single cart product start -->
                <a href="#" class="cart__product flex-between v-center g12">
                    <div class="flex g12 v-center">
                        <div class="mobile"><input type="checkbox"></div>
                        <div class="cart__product__banner">
                            <img src="$imgPath" alt="" class="img-cover">
                        </div>
                    </div>
                    <div class="row g20 v-center flex-full flex-between">
                        <div class="flex-column g12">
                            <div class="title-medium ttu cart__product__name">$name</div>
                            <div class="body-medium">Category: $categoryName</div>
                        </div>
                        <div class="headline-small cart__product__price" data-price="$item[price]">$price</div>
                        <div class="cart__product__qty__form flex g12">
                            <button class="minus-btn icon-btn"><i class="fa-solid fa-minus" data-product-id="$id"></i></button>
                            <input class="fw-smb primary-text qty__input form__input" type="number" name="amount" id="amount" value="$qty"
                                min="1" max="100" readonly>
                            <button class="plus-btn icon-btn"><i class="fa-solid fa-plus" data-product-id="$id"></i></button>
                        </div>
                        <button class="icon-btn desktop"><i class="fal fa-times"> </i></button>
                    </div>
                </a>
                <!-- single cart product end -->
HTML;

        $productSummary .=
            <<<HTML
                <!-- single summary product name - price start -->
                <div class="summary__product flex v-center g12">
                    <div class="title-medium ttu summary__product__name">$name</div>
                    <div class="title-medium summary__product__qty">X $qty</div>
                    <div class="light-devider pi20 flex-full" style="height: .1rem"></div>
                    <div class="title-medium ttu summary__product__price" data-price="$item[price]">$price</div>
                </div>
                <!-- single summary product name - price end -->
            HTML;
    }
} else {
    $cartHtml =
        <<<HTML
            <div class="block tac">
                <div class="text-38 primary-text">Giỏ hàng của bạn đang trống</div>
                <a href="?mod=page&act=home" class="btn primary-btn rounded-100">Mua sắm ngay</a>
            </div>
        HTML;
}
?>


<!-- cart top bar start -->
<div class="mobile-top__bar mobile-top__bar--shop p12 flex-center">
    <div class="mobile-top__inner flex-full flex-between v-center g12">
        <button class="icon-btn back-btn"><i class="fal fa-chevron-left"></i></button>
        <form action="#" class="form mobile__search-form flex-full">
            <div class="form__group width-full por">
                <button class="icon-btn poa" style="top: 50%; transform: translateY(-50%)">
                    <i class="fal fa-search"></i>
                </button>
                <input type="text" class="form__input rounded-100 width-full" style="padding-left: 4rem">
            </div>
        </form>
        <button class="icon-btn cart-btn"><i class="fal fa-trash-alt"></i></button>

        <!-- guest widget -->
        <!-- <button class="icon-btn user-btn"><i class="fal fa-user"></i></button> -->

        <!-- member widget -->
        <!-- <div class="por member-widget">
                <button class="icon-btn more-btn"><i class="far fa-ellipsis-h"></i></button>
                <ul class="poa option__list oh p10 box-shadow1 rounded-8">
                    <li class="option__item">
                        <a href="#" class="option__link ttc">trang chủ</a>
                    </li>
                    <li class="option__item">
                        <a href="#" class="option__link ttc">chia sẻ</a>
                    </li>
                    <li class="option__item">
                        <a href="#" class="option__link ttc">tìm kiếm</a>
                    </li>
                    <li class="option__item">
                        <a href="#" class="option__link ttc">tin nhắn</a>
                    </li>
                    <li class="option__item">
                        <a href="#" class="option__link ttc">tài khoản của tôi</a>
                    </li>
                    <li class="option__item">
                        <a href="#" class="option__link ttc">báo cáo</a>
                    </li>
                    <li class="option__item">
                        <a href="#" class="option__link ttc">trợ giúp</a>
                    </li>
                    <li class="option__item">
                        <a href="#" class="option__link ttc">phản hồi</a>
                    </li>
                </ul>
            </div> -->
    </div>
</div>
<!-- cart top bar end -->

<!-- cart start -->
<main class="cart__main mt80 section">
    <div class="cart__title flex-between a-end">
        <div class="flex a-end g6">
            <span class="text-46 primary-masking-text" style="line-height: unset;">
                <?= $cartAmount ?>
            </span>
            <span class="primary-masking-text ttu">sản phẩm</span>
        </div>
        <div class="flex-column a-end g12">
            <div class="text-68 ttu">Giỏ hàng</div>
            <div class="light-devider" style="width: 10rem; height: .4rem;"></div>
            <div class="label-large ttu">legous / cart</div>
        </div>
    </div>
    <div class="cart__product-wrapper mt60 flex-column g20">
        <?= $cartHtml ?>
    </div>
</main>
<!-- cart end -->

<!-- cart summary start -->
<section class="cart__summary desktop section auto-grid g30">
    <div class="flex-column g12">
        <div class="text-68 ttu">Tổng giỏ hàng</div>
        <div class="light-devider" style="width: 10rem; height: .4rem;"></div>
        <div class="label-large ttu">legous / giỏ hàng</div>
    </div>
    <div class="summary__main">
        <div class="summary__product__inner flex-column g20">
            <!-- summary product start -->
            <?= $productSummary ?>
            <!-- summary product end -->

            <div class="light-devider flex-full mt12 mb12" style="height: .1rem"></div>

            <!-- summary shipping method start -->
            <div class="title-medium fw-smb">Phương thức vận chuyển</div>
            <div class="body-medium">Dựa trên phương thức vận chuyển mà bạn lựa chọn ở bước tiếp theo, chúng tôi
                sẽ tính thêm khoản phí tương ứng vào đơn hàng của bạn.</div>
            <!-- summary shipping method end -->

            <div class="light-devider flex-full mt12 mb12" style="height: .1rem"></div>

            <!-- summary payment method start -->
            <div class="title-medium fw-smb">Phương thức thanh toán</div>
            <div class="body-medium">Dựa trên phương thức thanh toán mà bạn lựa chọn ở bước tiếp theo, đơn hàng
                sẽ được thanh toán nhanh nhất có thể dựa trên lựa chọn của bạn.</div>
            <!-- summary payment method end -->

            <!-- summary total start -->
            <div class="flex mt12 v-center g12">
                <div class="title-medium">Thuế: </div>
                <div class="title medium primary-text fw-bold">10%</div>
            </div>
            <div class="flex mt12 v-center">
                <div class="headline-small">Tổng tiền</div>
                <div class="light-devider flex-full pi20" style="height: .1rem"></div>
                <div class="primary-masking-text headline-small cart__total">
                    <?= formatVND($cartTotal + $tax) ?>
                </div>
            </div>
            <button class="btn primary-btn rounded-8 ttu" style="background: black; color: white;">
                <i class="fal fa-arrow-right"></i>
                đi đến thanh toán
            </button>
            <!-- summary total end -->
        </div>
</section>
<!-- cart summary end -->

<!-- cart bottom bar start -->
<div class="cart__bottom-bar p10 mobile">
    <div class="cart__bottom-bar__inner rounded-8 box-shadow1 p10">
        <div class="flex-between">
            <div class="flex g12 v-center">
                <input type="checkbox" id="checkAll">
                <label for="checkAll" class="title-medium fw-smb primary-text">Tất cả 3</label>
            </div>
            <button class="text-btn fw-smb btn rounded-100">
                <i class="fal fa-arrow-right"></i>
                Thêm mã giả giá
            </button>
        </div>
        <div class="flex v-center">
            <div class="title-large fw-bold">Tổng tiền</div>
            <div class="light-devider flex-full mi20" style="height: .1rem"></div>
            <div class="body-large primary-masking-text cart__total">
                <?= formatVND($cartTotal + $tax) ?>
            </div>
        </div>
        <button class="btn bar-btn rounded-8 ttu mt12 width-full" style="background: black; color: white;">
            <i class="fal fa-arrow-right"></i>
            đi đến thanh toán
        </button>
    </div>
</div>
<!-- cart bottom bar end -->
<!-- 
<script>
    jQuery(document).ready(() => {
        // Function to update the summary
        function updateSummary() {
            var total = 0;
            jQuery('.cart__product').each(function () {
                var product = jQuery(this);
                var productPrice = parseFloat(product.find('.cart__product__price').text().replace('$', ''));
                var productQuantity = parseInt(product.find('.qty__input').val());
                var subtotal = productPrice * productQuantity;
                product.find('.cart__product__price').text(subtotal.toFixed(2));
                total += subtotal;
            });

            jQuery('.summary__price span').text(total.toFixed(2));
            jQuery('.summary__total__price span').text(total.toFixed(2));
        }
        
        // AJAX to increase quantity
        jQuery(".plus-btn").on('click', function () {
            var product = jQuery(this).closest('.cart__product');
            var productId = jQuery(this).find('i').attr("data-product-id");
            jQuery.ajax({
                type: "POST",
                url: "./views/libs/updateCart.php",
                data: {
                    action: "increase",
                    product_id: productId
                },
                success: function (response) {
                    if (response.success) {
                        product.find('.qty__input').val(response.quantity);
                        updateSummary();
                    } else {
                        alert("Failed to increase quantity.");
                    }
                },
            });
        });

        // AJAX to decrease quantity
        jQuery(".minus-btn").click(function () {
            var product = jQuery(this).closest('.cart__product');
            var productId = jQuery(this).find('i').attr("data-product-id");
            jQuery.ajax({
                type: "POST",
                url: "./views/libs/updateCart.php",
                data: {
                    action: "decrease",
                    product_id: productId
                },
                success: function (response) {
                    if (response.success) {
                        product.find('.qty__input').val(response.quantity);
                        updateSummary();
                    } else {
                        alert("Failed to decrease quantity.");
                    }
                },
            });
        });
    });


</script> -->

<script>
    jQuery(document).ready(() => {
        // Function to update the summary
        function updateSummary(product) {
            var productPrice = parseFloat(product.find('.cart__product__price').attr('data-price'));
            var productQuantity = parseInt(product.find('.qty__input').val());
            var subtotal = productPrice * productQuantity;
            product.find('.cart__product__price').text(formatCurrency(subtotal));

            // Update summary product price
            var summaryQuantity = 0;
            var summarySubtotal = 0;
            jQuery('.cart__product').each(function() {
                var cartProduct = jQuery(this);
                var cartProductPrice = parseFloat(cartProduct.find('.cart__product__price').attr('data-price'));
                var cartProductQuantity = parseInt(cartProduct.find('.qty__input').val());
                summaryQuantity += cartProductQuantity;
                summarySubtotal += cartProductPrice * cartProductQuantity;
            });
            jQuery('.summary__product__qty').text(summaryQuantity);
            jQuery('.summary__product__price').text(formatCurrency(summarySubtotal));
        }

        // Function to update the summary total
        function updateSummaryTotal() {
            var subtotal = 0;
            jQuery('.cart__product').each(function() {
                var product = jQuery(this);
                var productPrice = parseFloat(product.find('.cart__product__price').attr('data-price'));
                var productQuantity = parseInt(product.find('.qty__input').val());
                subtotal += productPrice * productQuantity;
            });

            var tax = subtotal * 0.1; // Calculate 10% tax
            var total = subtotal + tax;

            jQuery('.cart__total').text(formatCurrency(total));
        }

        // AJAX to update quantity
        jQuery(".plus-btn, .minus-btn").on('click', function() {
            var product = jQuery(this).closest('.cart__product');
            var productId = jQuery(this).find('i').data("product-id");
            var action = jQuery(this).hasClass("plus-btn") ? "increase" : "decrease";

            jQuery.ajax({
                type: "POST",
                url: "./views/libs/updateCart.php",
                data: {
                    action: action,
                    product_id: productId
                },
                success: function(response) {
                    if (response.success) {
                        product.find('.qty__input').val(response.quantity);
                        updateSummary(product);
                        updateSummaryTotal();
                    } else {
                        alert("Failed to update quantity.");
                    }
                },
                error: function() {
                    alert("An error occurred while updating the quantity.");
                }
            });
        });

        // Function to format currency
        function formatCurrency(value) {
            var formatter = new Intl.NumberFormat('vi-VN', {
                style: 'currency',
                currency: 'VND'
            });
            return formatter.format(value);
        }
    });
</script>

