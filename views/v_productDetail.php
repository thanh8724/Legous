<?php
    if (isset($_GET['idProduct']) && $_GET['idProduct']) {
        $idProduct = $_GET['idProduct'];
        $product = getProductById($idProduct);
        $productThumbnails = getThumbnailsById($idProduct);
        print_r($productThumbnails);
        extract($product);
    }

    /** render gallery thumbnails */
    $galleryThumbnailsHtml = '';
    foreach ($productThumbnails as $item) {
        extract($item);
        $imgPath = constant('PRODUCT_PATH') . $src;
        $galleryThumbnailsHtml .= 
        <<<HTML
            <div class="gallery__thumbnails__item">
                <img src="$imgPath" alt="" class="img-cover">
            </div>
        HTML;
    }
?>


<!-- shop mobile top navigation bar start -->
<div class="mobile-top__bar mobile-top__bar--shop p12 flex-center">
    <div class="mobile-top__inner flex-full flex-between v-center g12">
        <button class="icon-btn back-btn"><i class="fal fa-chevron-left"></i></button>
        <form action="#" class="form mobile__search-form flex-full">
            <div class="form__group width-full por">
                <i class="fal fa-search poa" style="left: 2rem; top: 30%; transform: translate(-50%)"></i>
                <input type="text" class="form__input rounded-100 width-full" style="padding-left: 4rem">
            </div>
        </form>
        <button class="icon-btn cart-btn"><i class="fal fa-shopping-cart"></i></button>

        <!-- guest widget -->
        <!-- <button class="icon-btn user-btn"><i class="fal fa-user"></i></button> -->

        <!-- member widget -->
        <div class="por member-widget">
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
        </div>
    </div>
</div>
<!-- shop mobile top navigation bar end -->

<!-- product overview start -->
<main class="section single-product__main auto-grid g30 mt80">
    <div class="product__gallery mobile">
        <div class="gallery__spotlight">
            <img src="./public/assets/media/images/product/<?= $img ?>" alt="" class="img-cover">
        </div>
        <div class="gallery__thumbnails flex g12 mt12">
            <div class="gallery__thumbnails__item">
                <img src="/public/assets/media/images/product/sample-image1.png" alt="" class="img-cover">
            </div>
            <div class="gallery__thumbnails__item">
                <img src="/public/assets/media/images/product/sample-image2.png" alt="" class="img-cover">
            </div>
            <div class="gallery__thumbnails__item">
                <img src="/public/assets/media/images/product/sample-image3.png" alt="" class="img-cover">
            </div>
            <div class="gallery__thumbnails__item">
                <img src="/public/assets/media/images/product/sample-image4.png" alt="" class="img-cover">
            </div>
        </div>
    </div>
    <div class="product__info flex-column g30">
        <span class="label-large text-navagtion desktop">LEGOUS / CỬA HÀNG / SẢN PHẨM</span>
        <div class="flex-between v-center">
            <div class="product__name text-38 fw-smb" style="font-family: inherit;">
                <?= $name ?>
            </div>
            <button class="icon-btn love-btn toggle-btn mobile transparent"><i class="fal fa-heart"></i></button>
        </div>
        <p class="body-medium desktop"></p>
        <div class="flex-between v-center">
            <span class="text-38 fw-normal" style="font-family: inherit;">1.289.099 VND</span>
            <span class="label-medium"><?= $qty ?> sản phẩm</span>
        </div>
        <div class="flex g12 desktop">
            <button class="btn elevated-btn rounded-100"><i class="fal fa-shopping-cart-plus"></i>THÊM VÀO GIỎ
                HÀNG</button>
            <button class="btn primary-btn rounded-100"><i class="fal fa-arrow-right"></i>MUA NGAY</button>
        </div>
    </div>
    <div class="product__gallery por desktop" style="height: 60rem">
        <div class="gallery__spotlight flex-center" style="height: 100%">
            <img src="./public/assets/media/images/product/<?= $img ?>" alt="" class="img-contain" style="height: 100%;">
        </div>
        <div class="gallery__thumbnails poa flex-between flex-column g12">
            <?= $galleryThumbnailsHtml ?>
        </div>
    </div>
</main>
<!-- product overview end -->

<!-- product info start -->
<section class="product-info__section">
    <div class="tab__container full">
        <div class="tabs flex-center width-full">
            <div class="tab__item active">
                <span class="tab__item__label label-large ttu tac">MÔ TẢ SẢN PHẨM</span>
            </div>
            <div class="tab__item">
                <span class="tab__item__label label-large ttu tac">THÔNG TIN CHI TIẾT</span>
            </div>
            <div class="tab__item">
                <span class="tab__item__label label-large ttu tac">ĐÁNH GIÁ</span>
            </div>
            <div class="tab__item">
                <span class="tab__item__label label-large ttu tac">THÔNG TIN ĐẶT HÀNG</span>
            </div>
        </div>
        <div class="panels">
            <div class="panel__item active">
                MÔ TẢ SẢN PHẨM
            </div>
            <div class="panel__item">
                THÔNG TIN CHI TIẾT
            </div>
            <div class="panel__item comment__panel">
                <div class="block">
                    <div class="title-large fw-black">390 comments</div>
                    <form action="#" class="form comment__form flex-center" method="post">
                        <input type="text" class="form__input comment__input" placeholder="Comment">
                        <button class="icon-btn send-comment__btn"><i class="fal fa-paper-plane"></i></button>
                    </form>
                </div>

                <div class="mt30 comment__wrapper">
                    <!-- single comment start -->
                    <div class="comment__item mb30">
                        <div class="flex g12 comment__user">
                            <div class="user__avt avt"><img src="/public/assets/media/images/users/user-1.svg"
                                    alt="user 1" class="imgcover"></div>
                            <div class="flex-column flex-between">
                                <div class="user__name title-medium fw-smb">Lorem ipsum</div>
                                <div class="user-comment__date title-small">29/12/2023</div>
                            </div>
                        </div>
                        <div class="comment__content body-medium fw-normal mt12">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt cum qui voluptate! Libero est
                            vero sequi perspiciatis, ratione, praesentium, ipsam quisquam autem voluptates et minus
                            animi voluptas saepe. Asperiores, modi!
                        </div>
                    </div>
                    <!-- single comment end -->

                    <div class="comment__item mb30">
                        <div class="flex g12 comment__user">
                            <div class="user__avt avt"><img src="/public/assets/media/images/users/user-1.svg"
                                    alt="user 1" class="imgcover"></div>
                            <div class="flex-column flex-between">
                                <div class="user__name title-medium fw-smb">Lorem ipsum</div>
                                <div class="user-comment__date title-small">29/12/2023</div>
                            </div>
                        </div>
                        <div class="comment__content body-medium fw-normal mt12">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt cum qui voluptate! Libero est
                            vero sequi perspiciatis, ratione, praesentium, ipsam quisquam autem voluptates et minus
                            animi voluptas saepe. Asperiores, modi!
                        </div>
                    </div>
                    <div class="comment__item mb30">
                        <div class="flex g12 comment__user">
                            <div class="user__avt avt"><img src="/public/assets/media/images/users/user-1.svg"
                                    alt="user 1" class="imgcover"></div>
                            <div class="flex-column flex-between">
                                <div class="user__name title-medium fw-smb">Lorem ipsum</div>
                                <div class="user-comment__date title-small">29/12/2023</div>
                            </div>
                        </div>
                        <div class="comment__content body-medium fw-normal mt12">
                            Lorem ipsum dolor sit amet, consectetur adipisicing elit. Sunt cum qui voluptate! Libero est
                            vero sequi perspiciatis, ratione, praesentium, ipsam quisquam autem voluptates et minus
                            animi voluptas saepe. Asperiores, modi!
                        </div>
                    </div>
                </div>
            </div>
            <div class="panel__item">
                <div class="bill-info__panel auto-grid g20">
                    <div class="bill-info__box p20 rounded-8 box-shadow1 flex-column g12">
                        <h4 class="box__title title-medium fw-smb">Người nhận</h4>
                        <div class="box__content flex-column g12">
                            <h4 class="title-large">Hồ Duy Hoàng Giang</h4>
                            <p class="body-medium">Sđt: 0934630736</p>
                            <p class="body-medium">Email: giang@gmail.com</p>
                            <p class="body-medium">Địa chỉ: 212B, Baker street, London</p>
                        </div>
                    </div>
                    <div class="bill-info__box p20 rounded-8 box-shadow1 flex-column g12">
                        <h4 class="box__title title-medium fw-smb">Người đặt</h4>
                        <div class="box__content flex-column g12">
                            <h4 class="title-large">Hồ Duy Hoàng Giang</h4>
                            <p class="body-medium">Sđt: 0934630736</p>
                            <p class="body-medium">Email: giang@gmail.com</p>
                            <p class="body-medium">Địa chỉ: 212B, Baker street, London</p>
                        </div>
                    </div>
                    <div class="bill-info__box p20 rounded-8 box-shadow1 flex-column g12">
                        <h4 class="box__title title-medium fw-smb">Phương thức thanh toán</h4>
                        <div class="box__content flex-column g12">
                            <p class="body-medium">Tiền mặt</p>
                            <label for="#" class="body-small default-label">Mặc định</label>
                        </div>
                    </div>
                    <div class="bill-info__box p20 rounded-8 box-shadow1 flex-column g12">
                        <h4 class="box__title title-medium fw-smb">Phương thức vận chuyển</h4>
                        <div class="box__content flex-column g12">
                            <p class="body-medium">Thông thường (25k / 3 - 5 ngày)</p>
                            <label for="#" class="body-small default-label">Mặc định</label>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- product info end -->

<!-- related products section start -->
<section class="section related-product__section">
    <div class="block">
        <div class="text-38">
            SẢN PHẨM LIÊN QUAN
        </div>
        <span class="label-large">LEGOUS / SHOP / PRODUCT</span>
    </div>
    <div class="product__wrapper product__wrapper--normal product__wrapper--normal--slick__1 auto-grid g20 mt30">
        <!-- single product start -->
        <div class="product product__carousel">
            <a href="#" class="product__banner oh banner-cover rounded-8 por"
                style="background-image: url('/public/assets/media/images/product/v944cyfrwt851.webp')">
                <div class="product__overlay poa flex-center">
                    <div class="flex g12 in-stock__btn-set">
                        <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                        <button class="icon-btn love-btn toggle-btn"><i class="fa fa-heart"></i></button>
                        <button class="icon-btn"><i class="fal fa-shopping-cart"></i></button>
                    </div>
                    <!-- <div class="flex g12 sold-out__btn-set">
                                <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                                <button class="icon-btn"><i class="fal fa-plus"></i></button>
                                <button class="icon-btn"><i class="fal fa-arrow-right"></i></button>
                            </div> -->
                </div>
            </a>
            <a href="#" class="product__info">
                <div class="product__info__name title-medium fw-smb">Lorem ipsum para desbaren</div>
                <div class="product__info__price body-medium">289.000đ</div>
            </a>
            <div class="product__info flex-between width-full">
                <div class="product__info__view body-medium">1,2m+ views</div>
                <div class="product__info__rated flex g6 v-center body-medium">
                    4.4 <i class="fa fa-star start"></i>
                </div>
            </div>
        </div>
        <!-- single product end -->

        <div class="product product__carousel">
            <a href="#" class="product__banner oh banner-cover rounded-8 por"
                style="background-image: url('/public/assets/media/images/product/v944cyfrwt851.webp')">
                <div class="product__overlay poa flex-center">
                    <div class="flex g12 in-stock__btn-set">
                        <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                        <button class="icon-btn love-btn"><i class="fa fa-heart"></i></button>
                        <button class="icon-btn"><i class="fal fa-shopping-cart"></i></button>
                    </div>
                    <!-- <div class="flex g12 sold-out__btn-set">
                                <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                                <button class="icon-btn"><i class="fal fa-plus"></i></button>
                                <button class="icon-btn"><i class="fal fa-arrow-right"></i></button>
                            </div> -->
                </div>
            </a>
            <a href="#" class="product__info">
                <div class="product__info__name title-medium fw-smb">Lorem ipsum para desbaren</div>
                <div class="product__info__price body-medium">289.000đ</div>
            </a>
            <div class="product__info flex-between width-full">
                <div class="product__info__view body-medium">1,2m+ views</div>
                <div class="product__info__rated flex g6 v-center body-medium">
                    4.4 <i class="fa fa-star start"></i>
                </div>
            </div>
        </div>
        <div class="product product__carousel">
            <a href="#" class="product__banner oh banner-cover rounded-8 por"
                style="background-image: url('/public/assets/media/images/product/v944cyfrwt851.webp')">
                <div class="product__overlay poa flex-center">
                    <div class="flex g12 in-stock__btn-set">
                        <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                        <button class="icon-btn love-btn"><i class="fa fa-heart"></i></button>
                        <button class="icon-btn"><i class="fal fa-shopping-cart"></i></button>
                    </div>
                    <!-- <div class="flex g12 sold-out__btn-set">
                                <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                                <button class="icon-btn"><i class="fal fa-plus"></i></button>
                                <button class="icon-btn"><i class="fal fa-arrow-right"></i></button>
                            </div> -->
                </div>
            </a>
            <a href="#" class="product__info">
                <div class="product__info__name title-medium fw-smb">Lorem ipsum para desbaren</div>
                <div class="product__info__price body-medium">289.000đ</div>
            </a>
            <div class="product__info flex-between width-full">
                <div class="product__info__view body-medium">1,2m+ views</div>
                <div class="product__info__rated flex g6 v-center body-medium">
                    4.4 <i class="fa fa-star start"></i>
                </div>
            </div>
        </div>
        <div class="product product__carousel">
            <a href="#" class="product__banner oh banner-cover rounded-8 por"
                style="background-image: url('/public/assets/media/images/product/v944cyfrwt851.webp')">
                <div class="product__overlay poa flex-center">
                    <div class="flex g12 in-stock__btn-set">
                        <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                        <button class="icon-btn love-btn"><i class="fa fa-heart"></i></button>
                        <button class="icon-btn"><i class="fal fa-shopping-cart"></i></button>
                    </div>
                    <!-- <div class="flex g12 sold-out__btn-set">
                                <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                                <button class="icon-btn"><i class="fal fa-plus"></i></button>
                                <button class="icon-btn"><i class="fal fa-arrow-right"></i></button>
                            </div> -->
                </div>
            </a>
            <a href="#" class="product__info">
                <div class="product__info__name title-medium fw-smb">Lorem ipsum para desbaren</div>
                <div class="product__info__price body-medium">289.000đ</div>
            </a>
            <div class="product__info flex-between width-full">
                <div class="product__info__view body-medium">1,2m+ views</div>
                <div class="product__info__rated flex g6 v-center body-medium">
                    4.4 <i class="fa fa-star start"></i>
                </div>
            </div>
        </div>
        <div class="product product__carousel">
            <a href="#" class="product__banner oh banner-cover rounded-8 por"
                style="background-image: url('/public/assets/media/images/product/v944cyfrwt851.webp')">
                <div class="product__overlay poa flex-center">
                    <div class="flex g12 in-stock__btn-set">
                        <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                        <button class="icon-btn love-btn"><i class="fa fa-heart"></i></button>
                        <button class="icon-btn"><i class="fal fa-shopping-cart"></i></button>
                    </div>
                    <!-- <div class="flex g12 sold-out__btn-set">
                                <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                                <button class="icon-btn"><i class="fal fa-plus"></i></button>
                                <button class="icon-btn"><i class="fal fa-arrow-right"></i></button>
                            </div> -->
                </div>
            </a>
            <a href="#" class="product__info">
                <div class="product__info__name title-medium fw-smb">Lorem ipsum para desbaren</div>
                <div class="product__info__price body-medium">289.000đ</div>
            </a>
            <div class="product__info flex-between width-full">
                <div class="product__info__view body-medium">1,2m+ views</div>
                <div class="product__info__rated flex g6 v-center body-medium">
                    4.4 <i class="fa fa-star start"></i>
                </div>
            </div>
        </div>
        <div class="product product__carousel">
            <a href="#" class="product__banner oh banner-cover rounded-8 por"
                style="background-image: url('/public/assets/media/images/product/v944cyfrwt851.webp')">
                <div class="product__overlay poa flex-center">
                    <div class="flex g12 in-stock__btn-set">
                        <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                        <button class="icon-btn love-btn"><i class="fa fa-heart"></i></button>
                        <button class="icon-btn"><i class="fal fa-shopping-cart"></i></button>
                    </div>
                    <!-- <div class="flex g12 sold-out__btn-set">
                                <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                                <button class="icon-btn"><i class="fal fa-plus"></i></button>
                                <button class="icon-btn"><i class="fal fa-arrow-right"></i></button>
                            </div> -->
                </div>
            </a>
            <a href="#" class="product__info">
                <div class="product__info__name title-medium fw-smb">Lorem ipsum para desbaren</div>
                <div class="product__info__price body-medium">289.000đ</div>
            </a>
            <div class="product__info flex-between width-full">
                <div class="product__info__view body-medium">1,2m+ views</div>
                <div class="product__info__rated flex g6 v-center body-medium">
                    4.4 <i class="fa fa-star start"></i>
                </div>
            </div>
        </div>
        <div class="product product__carousel">
            <a href="#" class="product__banner oh banner-cover rounded-8 por"
                style="background-image: url('/public/assets/media/images/product/v944cyfrwt851.webp')">
                <div class="product__overlay poa flex-center">
                    <div class="flex g12 in-stock__btn-set">
                        <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                        <button class="icon-btn love-btn"><i class="fa fa-heart"></i></button>
                        <button class="icon-btn"><i class="fal fa-shopping-cart"></i></button>
                    </div>
                    <!-- <div class="flex g12 sold-out__btn-set">
                                <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                                <button class="icon-btn"><i class="fal fa-plus"></i></button>
                                <button class="icon-btn"><i class="fal fa-arrow-right"></i></button>
                            </div> -->
                </div>
            </a>
            <a href="#" class="product__info">
                <div class="product__info__name title-medium fw-smb">Lorem ipsum para desbaren</div>
                <div class="product__info__price body-medium">289.000đ</div>
            </a>
            <div class="product__info flex-between width-full">
                <div class="product__info__view body-medium">1,2m+ views</div>
                <div class="product__info__rated flex g6 v-center body-medium">
                    4.4 <i class="fa fa-star start"></i>
                </div>
            </div>
        </div>
        <div class="product product__carousel">
            <a href="#" class="product__banner oh banner-cover rounded-8 por"
                style="background-image: url('/public/assets/media/images/product/v944cyfrwt851.webp')">
                <div class="product__overlay poa flex-center">
                    <div class="flex g12 in-stock__btn-set">
                        <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                        <button class="icon-btn love-btn"><i class="fa fa-heart"></i></button>
                        <button class="icon-btn"><i class="fal fa-shopping-cart"></i></button>
                    </div>
                    <!-- <div class="flex g12 sold-out__btn-set">
                                <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                                <button class="icon-btn"><i class="fal fa-plus"></i></button>
                                <button class="icon-btn"><i class="fal fa-arrow-right"></i></button>
                            </div> -->
                </div>
            </a>
            <a href="#" class="product__info">
                <div class="product__info__name title-medium fw-smb">Lorem ipsum para desbaren</div>
                <div class="product__info__price body-medium">289.000đ</div>
            </a>
            <div class="product__info flex-between width-full">
                <div class="product__info__view body-medium">1,2m+ views</div>
                <div class="product__info__rated flex g6 v-center body-medium">
                    4.4 <i class="fa fa-star start"></i>
                </div>
            </div>
        </div>
        <div class="product product__carousel">
            <a href="#" class="product__banner oh banner-cover rounded-8 por"
                style="background-image: url('/public/assets/media/images/product/v944cyfrwt851.webp')">
                <div class="product__overlay poa flex-center">
                    <div class="flex g12 in-stock__btn-set">
                        <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                        <button class="icon-btn love-btn"><i class="fa fa-heart"></i></button>
                        <button class="icon-btn"><i class="fal fa-shopping-cart"></i></button>
                    </div>
                    <!-- <div class="flex g12 sold-out__btn-set">
                                <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                                <button class="icon-btn"><i class="fal fa-plus"></i></button>
                                <button class="icon-btn"><i class="fal fa-arrow-right"></i></button>
                            </div> -->
                </div>
            </a>
            <a href="#" class="product__info">
                <div class="product__info__name title-medium fw-smb">Lorem ipsum para desbaren</div>
                <div class="product__info__price body-medium">289.000đ</div>
            </a>
            <div class="product__info flex-between width-full">
                <div class="product__info__view body-medium">1,2m+ views</div>
                <div class="product__info__rated flex g6 v-center body-medium">
                    4.4 <i class="fa fa-star start"></i>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- related products section end -->

<!-- sale banner start -->
<section class="section sale-banner grid-2">
    <div class="flex-column g16">
        <div class="fw-black text-logo">Legous</div>
        <div class="flex g6 v-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 45 45" fill="none">
                <path
                    d="M22.275 17.1375C24.675 17.25 25.2938 19.2938 25.3313 20.25H28.6875C28.5375 16.5375 25.8938 14.2688 22.2188 14.2688C18.075 14.2688 15 16.875 15 22.7625C15 26.4 16.7438 30.7125 22.2 30.7125C26.3625 30.7125 28.5938 27.6187 28.65 25.1813H25.2937C25.2375 26.2875 24.45 27.7687 22.2375 27.8813C19.7812 27.8062 18.75 25.8938 18.75 22.7625C18.75 17.3438 21.15 17.175 22.275 17.1375ZM22.5 3.75C12.15 3.75 3.75 12.15 3.75 22.5C3.75 32.85 12.15 41.25 22.5 41.25C32.85 41.25 41.25 32.85 41.25 22.5C41.25 12.15 32.85 3.75 22.5 3.75ZM22.5 37.5C14.2313 37.5 7.5 30.7687 7.5 22.5C7.5 14.2313 14.2313 7.5 22.5 7.5C30.7687 7.5 37.5 14.2313 37.5 22.5C37.5 30.7687 30.7687 37.5 22.5 37.5Z"
                    fill="white" />
            </svg>/2023
        </div>
    </div>
    <div class="flex-column g16">
        <div class="text-38">GIẢM GIÁ CỰC SỐC MỪNG
            HALLOWEEN 20%</div>
        <span class="label-large">Khi nhập mã LEGOUS20</span>
    </div>
</section>
<!-- sale banner end -->

<!-- maybe you love section start -->
<section class="section related-product__section">
    <div class="block">
        <div class="text-38">
            CÓ THỂ BẠN SẼ THÍCH
        </div>
        <span class="label-large">LEGOUS / SHOP / PRODUCT</span>
    </div>
    <div class="product__wrapper product__wrapper--normal product__wrapper--normal--slick__1 auto-grid g20 mt30">
        <!-- single product start -->
        <div class="product product__carousel">
            <a href="#" class="product__banner oh banner-cover rounded-8 por"
                style="background-image: url('/public/assets/media/images/product/v944cyfrwt851.webp')">
                <div class="product__overlay poa flex-center">
                    <div class="flex g12 in-stock__btn-set">
                        <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                        <button class="icon-btn love-btn toggle-btn"><i class="fa fa-heart"></i></button>
                        <button class="icon-btn"><i class="fal fa-shopping-cart"></i></button>
                    </div>
                    <!-- <div class="flex g12 sold-out__btn-set">
                                <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                                <button class="icon-btn"><i class="fal fa-plus"></i></button>
                                <button class="icon-btn"><i class="fal fa-arrow-right"></i></button>
                            </div> -->
                </div>
            </a>
            <a href="#" class="product__info">
                <div class="product__info__name title-medium fw-smb">Lorem ipsum para desbaren</div>
                <div class="product__info__price body-medium">289.000đ</div>
            </a>
            <div class="product__info flex-between width-full">
                <div class="product__info__view body-medium">1,2m+ views</div>
                <div class="product__info__rated flex g6 v-center body-medium">
                    4.4 <i class="fa fa-star start"></i>
                </div>
            </div>
        </div>
        <!-- single product end -->

        <div class="product product__carousel">
            <a href="#" class="product__banner oh banner-cover rounded-8 por"
                style="background-image: url('/public/assets/media/images/product/v944cyfrwt851.webp')">
                <div class="product__overlay poa flex-center">
                    <div class="flex g12 in-stock__btn-set">
                        <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                        <button class="icon-btn love-btn"><i class="fa fa-heart"></i></button>
                        <button class="icon-btn"><i class="fal fa-shopping-cart"></i></button>
                    </div>
                    <!-- <div class="flex g12 sold-out__btn-set">
                                <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                                <button class="icon-btn"><i class="fal fa-plus"></i></button>
                                <button class="icon-btn"><i class="fal fa-arrow-right"></i></button>
                            </div> -->
                </div>
            </a>
            <a href="#" class="product__info">
                <div class="product__info__name title-medium fw-smb">Lorem ipsum para desbaren</div>
                <div class="product__info__price body-medium">289.000đ</div>
            </a>
            <div class="product__info flex-between width-full">
                <div class="product__info__view body-medium">1,2m+ views</div>
                <div class="product__info__rated flex g6 v-center body-medium">
                    4.4 <i class="fa fa-star start"></i>
                </div>
            </div>
        </div>
        <div class="product product__carousel">
            <a href="#" class="product__banner oh banner-cover rounded-8 por"
                style="background-image: url('/public/assets/media/images/product/v944cyfrwt851.webp')">
                <div class="product__overlay poa flex-center">
                    <div class="flex g12 in-stock__btn-set">
                        <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                        <button class="icon-btn love-btn"><i class="fa fa-heart"></i></button>
                        <button class="icon-btn"><i class="fal fa-shopping-cart"></i></button>
                    </div>
                    <!-- <div class="flex g12 sold-out__btn-set">
                                <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                                <button class="icon-btn"><i class="fal fa-plus"></i></button>
                                <button class="icon-btn"><i class="fal fa-arrow-right"></i></button>
                            </div> -->
                </div>
            </a>
            <a href="#" class="product__info">
                <div class="product__info__name title-medium fw-smb">Lorem ipsum para desbaren</div>
                <div class="product__info__price body-medium">289.000đ</div>
            </a>
            <div class="product__info flex-between width-full">
                <div class="product__info__view body-medium">1,2m+ views</div>
                <div class="product__info__rated flex g6 v-center body-medium">
                    4.4 <i class="fa fa-star start"></i>
                </div>
            </div>
        </div>
        <div class="product product__carousel">
            <a href="#" class="product__banner oh banner-cover rounded-8 por"
                style="background-image: url('/public/assets/media/images/product/v944cyfrwt851.webp')">
                <div class="product__overlay poa flex-center">
                    <div class="flex g12 in-stock__btn-set">
                        <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                        <button class="icon-btn love-btn"><i class="fa fa-heart"></i></button>
                        <button class="icon-btn"><i class="fal fa-shopping-cart"></i></button>
                    </div>
                    <!-- <div class="flex g12 sold-out__btn-set">
                                <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                                <button class="icon-btn"><i class="fal fa-plus"></i></button>
                                <button class="icon-btn"><i class="fal fa-arrow-right"></i></button>
                            </div> -->
                </div>
            </a>
            <a href="#" class="product__info">
                <div class="product__info__name title-medium fw-smb">Lorem ipsum para desbaren</div>
                <div class="product__info__price body-medium">289.000đ</div>
            </a>
            <div class="product__info flex-between width-full">
                <div class="product__info__view body-medium">1,2m+ views</div>
                <div class="product__info__rated flex g6 v-center body-medium">
                    4.4 <i class="fa fa-star start"></i>
                </div>
            </div>
        </div>
        <div class="product product__carousel">
            <a href="#" class="product__banner oh banner-cover rounded-8 por"
                style="background-image: url('/public/assets/media/images/product/v944cyfrwt851.webp')">
                <div class="product__overlay poa flex-center">
                    <div class="flex g12 in-stock__btn-set">
                        <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                        <button class="icon-btn love-btn"><i class="fa fa-heart"></i></button>
                        <button class="icon-btn"><i class="fal fa-shopping-cart"></i></button>
                    </div>
                    <!-- <div class="flex g12 sold-out__btn-set">
                                <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                                <button class="icon-btn"><i class="fal fa-plus"></i></button>
                                <button class="icon-btn"><i class="fal fa-arrow-right"></i></button>
                            </div> -->
                </div>
            </a>
            <a href="#" class="product__info">
                <div class="product__info__name title-medium fw-smb">Lorem ipsum para desbaren</div>
                <div class="product__info__price body-medium">289.000đ</div>
            </a>
            <div class="product__info flex-between width-full">
                <div class="product__info__view body-medium">1,2m+ views</div>
                <div class="product__info__rated flex g6 v-center body-medium">
                    4.4 <i class="fa fa-star start"></i>
                </div>
            </div>
        </div>
        <div class="product product__carousel">
            <a href="#" class="product__banner oh banner-cover rounded-8 por"
                style="background-image: url('/public/assets/media/images/product/v944cyfrwt851.webp')">
                <div class="product__overlay poa flex-center">
                    <div class="flex g12 in-stock__btn-set">
                        <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                        <button class="icon-btn love-btn"><i class="fa fa-heart"></i></button>
                        <button class="icon-btn"><i class="fal fa-shopping-cart"></i></button>
                    </div>
                    <!-- <div class="flex g12 sold-out__btn-set">
                                <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                                <button class="icon-btn"><i class="fal fa-plus"></i></button>
                                <button class="icon-btn"><i class="fal fa-arrow-right"></i></button>
                            </div> -->
                </div>
            </a>
            <a href="#" class="product__info">
                <div class="product__info__name title-medium fw-smb">Lorem ipsum para desbaren</div>
                <div class="product__info__price body-medium">289.000đ</div>
            </a>
            <div class="product__info flex-between width-full">
                <div class="product__info__view body-medium">1,2m+ views</div>
                <div class="product__info__rated flex g6 v-center body-medium">
                    4.4 <i class="fa fa-star start"></i>
                </div>
            </div>
        </div>
        <div class="product product__carousel">
            <a href="#" class="product__banner oh banner-cover rounded-8 por"
                style="background-image: url('/public/assets/media/images/product/v944cyfrwt851.webp')">
                <div class="product__overlay poa flex-center">
                    <div class="flex g12 in-stock__btn-set">
                        <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                        <button class="icon-btn love-btn"><i class="fa fa-heart"></i></button>
                        <button class="icon-btn"><i class="fal fa-shopping-cart"></i></button>
                    </div>
                    <!-- <div class="flex g12 sold-out__btn-set">
                                <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                                <button class="icon-btn"><i class="fal fa-plus"></i></button>
                                <button class="icon-btn"><i class="fal fa-arrow-right"></i></button>
                            </div> -->
                </div>
            </a>
            <a href="#" class="product__info">
                <div class="product__info__name title-medium fw-smb">Lorem ipsum para desbaren</div>
                <div class="product__info__price body-medium">289.000đ</div>
            </a>
            <div class="product__info flex-between width-full">
                <div class="product__info__view body-medium">1,2m+ views</div>
                <div class="product__info__rated flex g6 v-center body-medium">
                    4.4 <i class="fa fa-star start"></i>
                </div>
            </div>
        </div>
        <div class="product product__carousel">
            <a href="#" class="product__banner oh banner-cover rounded-8 por"
                style="background-image: url('/public/assets/media/images/product/v944cyfrwt851.webp')">
                <div class="product__overlay poa flex-center">
                    <div class="flex g12 in-stock__btn-set">
                        <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                        <button class="icon-btn love-btn"><i class="fa fa-heart"></i></button>
                        <button class="icon-btn"><i class="fal fa-shopping-cart"></i></button>
                    </div>
                    <!-- <div class="flex g12 sold-out__btn-set">
                                <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                                <button class="icon-btn"><i class="fal fa-plus"></i></button>
                                <button class="icon-btn"><i class="fal fa-arrow-right"></i></button>
                            </div> -->
                </div>
            </a>
            <a href="#" class="product__info">
                <div class="product__info__name title-medium fw-smb">Lorem ipsum para desbaren</div>
                <div class="product__info__price body-medium">289.000đ</div>
            </a>
            <div class="product__info flex-between width-full">
                <div class="product__info__view body-medium">1,2m+ views</div>
                <div class="product__info__rated flex g6 v-center body-medium">
                    4.4 <i class="fa fa-star start"></i>
                </div>
            </div>
        </div>
        <div class="product product__carousel">
            <a href="#" class="product__banner oh banner-cover rounded-8 por"
                style="background-image: url('/public/assets/media/images/product/v944cyfrwt851.webp')">
                <div class="product__overlay poa flex-center">
                    <div class="flex g12 in-stock__btn-set">
                        <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                        <button class="icon-btn love-btn"><i class="fa fa-heart"></i></button>
                        <button class="icon-btn"><i class="fal fa-shopping-cart"></i></button>
                    </div>
                    <!-- <div class="flex g12 sold-out__btn-set">
                                <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                                <button class="icon-btn"><i class="fal fa-plus"></i></button>
                                <button class="icon-btn"><i class="fal fa-arrow-right"></i></button>
                            </div> -->
                </div>
            </a>
            <a href="#" class="product__info">
                <div class="product__info__name title-medium fw-smb">Lorem ipsum para desbaren</div>
                <div class="product__info__price body-medium">289.000đ</div>
            </a>
            <div class="product__info flex-between width-full">
                <div class="product__info__view body-medium">1,2m+ views</div>
                <div class="product__info__rated flex g6 v-center body-medium">
                    4.4 <i class="fa fa-star start"></i>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- maybe you love section end -->

<!-- single product bottom nav bar start -->
<div class="p10 flex-center single-product__bottom-bar mobile">
    <div class="bottom-bar__inner flex-full p10 flex-column g12 rounded-12 box-shadow1">
        <div class="flex-between">
            <div class="flex-column flex-between">
                <h4 class="title-large fw-black">1.268.099 VNĐ</h4>
                <a href="" class="add-coupon-btn primary-text label-large fw-black">Thêm phiếu giảm giá</a>
            </div>
            <button class="icon-btn fab box-shadow1"><i class="far fa-cart-plus"></i></button>
        </div>
        <button class="btn primary-btn rounded-8"><i class="fal fa-arrow-right"></i>MUA NGAY</button>
    </div>
</div>
<!-- single product bottom nav bar end -->