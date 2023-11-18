<?php
/** category rendering */
/** categroy filter rendering */

$categoryHtml = '';
$categoryFilterHtml = '';

foreach ($categories as $item) {
    extract($item);
    $amount = count(getProductsByCategoryId($id));
    $categoryHtml .=
        <<<HTML
                <!-- single category start -->
                <a href="?mod=page&act=category&idCategory=$id" class="category__item flex-center g20 p20 rounded-12"
                    style="background: $bg_color; color: white">
                    <div class="banner-cover category__banner rounded-full"
                        style="background-image: url('./public/assets/media/images/category/$img')">
                    </div>
                    <div class="category__content flex-column g12">
                        <div class="title-medium ttc">$name</div>
                        <span class="body-medium">
                            $description
                        </span>
                        <label for="" class="label large">$amount sản phẩm</label>
                    </div>
                </a>
                <!-- single category end -->
            HTML;

    $url = get_current_url();
    $queryString = parse_url($url, PHP_URL_QUERY);

    $categoryFilterHtml .=
        <<<HTML
                <li class="p12 flex v-center g8">
                    <input class="filter__input" data-id-category="$id" id="idCategory=$id" type="checkbox">
                    <label class="fw-smb ttc" for="idCategory=$id">$name</label>
                </li>
            HTML;
}4
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

<!-- shop title start -->
<section class="section shop__title auto-grid g30 mt80">
    <div class="width-full">
        <div class="flex-column g12" style="max-width: 27rem">
            <span class="label-large">LEGOUS /</span>
            <h1 class="text-68">SHOP</h1>
            <span class="label-large">Chúng tôi hân hạnh đem đến cho bạn mô hình được lấy cảm hứng từ những nhân vật truyện tranh tuổi thơ với chất lượng cao</span>
        </div>
    </div>
    <div class="flex-column g12 flex-full">
        <h4 class="title-medium">DANH MỤC NỔI BẬT</h4>
        <div class="feature-category__wrapper oh flex g20 width-full">
            <div class="feature-category__item p20 flex g20 v-center" style="background: #7254B7">
                <div class="feature-category__banner">
                    <img src="/public/assets/media/images/category/onpiece__banner.svg" alt="" class="img-cover">
                </div>
                <div class="feature-category__content flex-column g8">
                    <h4 class="title-medium">ONE PIECE</h4>
                    <span class="body-medium">Lorem ipsum dolor sit amet consectetur, adipisicing elit. </span>
                    <span class="label-large">120 sản phẩm có sẵn</span>
                </div>
            </div>
            <div class="feature-category__item p20 flex g20 v-center" style="background: #7254B7">
                <div class="feature-category__banner">
                    <img src="/public/assets/media/images/category/onpiece__banner.svg" alt="" class="img-cover">
                </div>
                <div class="feature-category__content flex-column g8">
                    <h4 class="title-medium">ONE PIECE</h4>
                    <span class="body-medium">Lorem ipsum dolor sit amet consectetur, adipisicing elit. </span>
                    <span class="label-large">120 sản phẩm có sẵn</span>
                </div>
            </div>
            <div class="feature-category__item p20 flex g20 v-center" style="background: #7254B7">
                <div class="feature-category__banner">
                    <img src="/public/assets/media/images/category/onpiece__banner.svg" alt="" class="img-cover">
                </div>
                <div class="feature-category__content flex-column g8">
                    <h4 class="title-medium">ONE PIECE</h4>
                    <span class="body-medium">Lorem ipsum dolor sit amet consectetur, adipisicing elit. </span>
                    <span class="label-large">120 sản phẩm có sẵn</span>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- shop title end -->

<!-- shop product start -->
<main class="section shop__main">
    <div class="flex-between width-full">
        <div class="v-center flex-between filter-bar--respon">
            <h4 class="title-medium shop__main__title">SẢN PHẨM</h4>
            <button class="mobile__filter__btn--open btn outline-btn rounded-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                    <path d="M7.5 13.5H10.5V12H7.5V13.5ZM2.25 4.5V6H15.75V4.5H2.25ZM4.5 9.75H13.5V8.25H4.5V9.75Z" fill="#6750A4"/>
                </svg>
                Lọc sản phẩm
            </button>
        </div>
        <div class="filter-btn flex-full">
            <button class="btn outline-btn toggle-filter-btn rounded-100">
                <svg xmlns="http://www.w3.org/2000/svg" width="18" height="18" viewBox="0 0 18 18" fill="none">
                    <path d="M7.5 13.5H10.5V12H7.5V13.5ZM2.25 4.5V6H15.75V4.5H2.25ZM4.5 9.75H13.5V8.25H4.5V9.75Z" fill="#6750A4"/>
                </svg>
                <span class="btn__text">Ẩn filter</span>
            </button>
        </div>
        <ul class="filter__list open flex g12">
                <!-- price filter start -->
                <li class="filter__list__item por">
                    <button class="btn elevated-btn rounded-100 filter__list__btn"><i nclass="fa-solid fa-caret-down"></i>Giá</button>
                    <ul class="filter-option__list poa p20 rounded-8 box-shadow1" style="right: 0">
                        <li class="filter-option__item por">
                            <form action="?mod=page&act=category&idCategory=<?= $idCategory ?>" method="post">
                            <!-- normal form group -->
                            <div class="flex g20">
                                <div class="form__group">
                                    <span class="form__group__title">Giá thấp nhất</span>
                                    <input type="number" name="minPrice" class="form__input" placeholder="VD: 1000000">
                                    <span class="form__message"></span>
                                </div>
                                <div class="form__group">
                                    <span class="form__group__title">Giá cao nhất</span>
                                    <input type="number" name="maxPrice" class="form__input" placeholder="VD: 1000000">
                                    <span class="form__message"></span>
                                </div>
                            </div>
                            <input class="btn primary-btn rounded-8 ttu width-full form__btn" name="priceFilter" type="submit"
                                value="LỌC">
                            <div class="form__group mt30">
                                <p>
                                    <label for="amount">Khoảng giá:</label>
                                    <input type="text" id="amount" readonly style="border:0; ; font-weight:bold;">
                                </p>
        
                                <div id="slider-range"></div>
                            </div>
                        </form>
                    </li>
                </ul>
            </li>
            <!-- price filter end -->
        
            <!-- category filter start -->
            <li class="filter__list__item por">
                <button class="btn elevated-btn rounded-100 filter__list__btn"><i class="fa-solid fa-caret-down"></i>Danh
                    mục</button>
                <ul class="filter-option__list poa p20 rounded-8 grid-2 g30 box-shadow1" style="right: 0">
                    <li class="filter-option__item flex-column g12" style="color:#7254B7">
                        <ul>
                            <?= $categoryFilterHtml ?>
                        </ul>
                    </li>
                </ul>
            </li>
            <!-- category filter end -->
        
            <!-- name filter start -->
            <li class="filter__list__item por">
                <button class="btn elevated-btn rounded-100 filter__list__btn"><i
                        class="fa-solid fa-caret-down"></i>Tên</button>
                <ul class="filter-option__list poa p20 rounded-8 grid-2 g30 box-shadow1" style="right: 0">
                    <li class="filter-option__item flex-column g12" style="color:#7254B7">
                        <ul>
                            <li class="p12 flex v-center g8"><input id="option-checkbox1" type="checkbox"><label class="fw-smb"
                                    for="option-checkbox1">Từ A - Z</label></li>
                            <li class="p12 flex v-center g8"><input id="option-checkbox2" type="checkbox"><label class="fw-smb"
                                    for="option-checkbox2">Từ Z - A</label></li>
                        </ul>
                    </li>
                </ul>
            </li>
            <!-- name filter end -->
        
            <!-- date filter start -->
            <li class="filter__list__item por">
                <button class="btn elevated-btn rounded-100 filter__list__btn"><i class="fa-solid fa-caret-down"></i>Ngày ra
                    mắt</button>
                <ul class="filter-option__list poa p20 rounded-8 grid-2 g30 box-shadow1" style="right: 0">
                    <li class="filter-option__item flex-column g12" style="color:#7254B7">
                        <ul>
                            <li class="p12 flex v-center g8"><input id="option-checkbox1" type="checkbox"><label class="fw-smb"
                                    for="option-checkbox1">1 tuần trước</label></li>
                            <li class="p12 flex v-center g8"><input id="option-checkbox2" type="checkbox"><label class="fw-smb"
                                    for="option-checkbox2">1 tháng trước</label></li>
                            <li class="p12 flex v-center g8"><input id="option-checkbox2" type="checkbox"><label class="fw-smb"
                                    for="option-checkbox2">6 tháng trước</label></li>
                            <li class="p12 flex v-center g8"><input id="option-checkbox2" type="checkbox"><label class="fw-smb"
                                    for="option-checkbox2">1 năm trước</label></li>
                            <div class="form__group">
                                <input type="date" class="datePicker form__input" id="shop-filter__day-picker">
                            </div>
                        </ul>
                    </li>
                </ul>
            </li>
            <!-- date filter end -->
        </ul>
    </div>
    <div class="product__wrapper product__wrapper--without-carousel auto-grid g20 mt30">
        <div class="product">
            <a href="#" class="product__banner oh banner-cover rounded-8 por" style="background-image: url('/public/assets/media/images/product/v944cyfrwt851.webp')">
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
        <div class="product">
            <a href="#" class="product__banner oh banner-cover rounded-8 por" style="background-image: url('/public/assets/media/images/product/v944cyfrwt851.webp')">
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
        <div class="product">
            <a href="#" class="product__banner oh banner-cover rounded-8 por" style="background-image: url('/public/assets/media/images/product/v944cyfrwt851.webp')">
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
        <div class="product">
            <a href="#" class="product__banner oh banner-cover rounded-8 por" style="background-image: url('/public/assets/media/images/product/v944cyfrwt851.webp')">
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
        <div class="product">
            <a href="#" class="product__banner oh banner-cover rounded-8 por" style="background-image: url('/public/assets/media/images/product/v944cyfrwt851.webp')">
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
        <div class="product">
            <a href="#" class="product__banner oh banner-cover rounded-8 por" style="background-image: url('/public/assets/media/images/product/v944cyfrwt851.webp')">
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
        <div class="product">
            <a href="#" class="product__banner oh banner-cover rounded-8 por" style="background-image: url('/public/assets/media/images/product/v944cyfrwt851.webp')">
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
        <div class="product">
            <a href="#" class="product__banner oh banner-cover rounded-8 por" style="background-image: url('/public/assets/media/images/product/v944cyfrwt851.webp')">
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
        <div class="product">
            <a href="#" class="product__banner oh banner-cover rounded-8 por" style="background-image: url('/public/assets/media/images/product/v944cyfrwt851.webp')">
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
        <div class="product">
            <a href="#" class="product__banner oh banner-cover rounded-8 por" style="background-image: url('/public/assets/media/images/product/v944cyfrwt851.webp')">
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
        <div class="product">
            <a href="#" class="product__banner oh banner-cover rounded-8 por" style="background-image: url('/public/assets/media/images/product/v944cyfrwt851.webp')">
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
    <ul class="pagination flex g16 mt30">
        <li class="pagination__item active"><a href="#" class="pagination__link">1</a></li>
        <li class="pagination__item"><a href="#" class="pagination__link">2</a></li>
        <li class="pagination__item"><a href="#" class="pagination__link">3</a></li>
        <li class="pagination__item"><a href="#" class="pagination__link">4</a></li>
        <li class="pagination__item"><a href="#" class="pagination__link"><i class="fal fa-arrow-right" style="margin-right: .6rem"></i>Next</a></li>
    </ul>
</main>

<!-- mobile shop filter start -->
<div class="mobile__filter box-shadow1">
    <div class="flex-between mobile__filter__top v-center">
        <span class="title-large ttu">FILTER</span>
        <button class="icon-btn mobile__filter__btn--close"><i class="fal fa-times"></i></button>
    </div>
    <ul class="mobile__filter__list pi12">
        <li class="accordion mobile__filter__item">
            <div class="mobile__filter__name ttc accordion__top flex-between p16">
                DANH MỤC 
                <i class="fa-solid fa-caret-down"></i>
            </div>
            <div class="p10 accordion__content">
                <ul class="mobile__filter__option-list p10">
                    <h4 class="title-medium ttu">MÔ HÌNH</h4>
                    <li class="option__list__item flex-between p12">
                        <label for="">Label</label>
                        <input id="" type="checkbox">
                    </li>
                    <li class="option__list__item flex-between p12">
                        <label for="">Label</label>
                        <input id="" type="checkbox">
                    </li>
                    <li class="option__list__item flex-between p12">
                        <label for="">Label</label>
                        <input id="" type="checkbox">
                    </li>
                </ul>
                <div class="light-devider" style="display: block; height: .1rem"></div>
                <ul class="mobile__filter__option-list p10">
                    <h4 class="title-medium ttu">LEGO</h4>
                    <li class="option__list__item flex-between p12">
                        <label for="">Label</label>
                        <input id="" type="checkbox">
                    </li>
                    <li class="option__list__item flex-between p12">
                        <label for="">Label</label>
                        <input id="" type="checkbox">
                    </li>
                    <li class="option__list__item flex-between p12">
                        <label for="">Label</label>
                        <input id="" type="checkbox">
                    </li>
                </ul>
            </div>
        </li>
        <li class="accordion mobile__filter__item">
            <div class="mobile__filter__name ttc accordion__top flex-between p16">
                TÊN 
                <i class="fa-solid fa-caret-down"></i>
            </div>
            <ul class="mobile__filter__option-list accordion__content pi12">
                <li class="option__list__item flex-between p12">
                    <label for="">Từ A - Z</label>
                    <input id="" type="checkbox">
                </li>
                <li class="option__list__item flex-between p12">
                    <label for="">Từ Z - A</label>
                    <input id="" type="checkbox">
                </li>
            </ul>
        </li>
        <li class="accordion mobile__filter__item">
            <div class="mobile__filter__name ttc accordion__top flex-between p16">
                GIÁ 
                <i class="fa-solid fa-caret-down"></i>
            </div>
            <div class="mobile__filter__option-list accordion__content pi12">
                <form action="" method="post">
                    <!-- normal form group -->
                    <div class="form__group">
                        <span class="form__group__title mt12
">Nhập giá sản phẩm</span>
                        <input type="number" class="form__input" placeholder="VD: 1.000.000">
                        <span class="form__message"></span>
                    </div>
                    <button class="btn primary-btn rounded-8 ttu width-full" type="submit">LỌC</button>
                    <div class="form__group mt30">
                        <input type="range" min="0" max="50" value="0" id="range2" class="range-input"/> 
                        <div class="flex-between">
                            <div class="flex-column flex-center">
                                min
                                <span class="body-large">0</span>
                            </div>
                            <div class="flex-column flex-center">
                                max
                                <span class="body-large">20.000.000</span>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </li>
    </ul>
</div>
<!-- mobile shop filter end -->
<!-- shop product end -->

<!-- sale banner start -->
<section class="section sale-banner grid-2">
    <div class="flex-column g16">
        <div class="fw-black text-logo">Legous</div>
        <div class="flex g6 v-center">
            <svg xmlns="http://www.w3.org/2000/svg" width="45" height="45" viewBox="0 0 45 45" fill="none">
            <path d="M22.275 17.1375C24.675 17.25 25.2938 19.2938 25.3313 20.25H28.6875C28.5375 16.5375 25.8938 14.2688 22.2188 14.2688C18.075 14.2688 15 16.875 15 22.7625C15 26.4 16.7438 30.7125 22.2 30.7125C26.3625 30.7125 28.5938 27.6187 28.65 25.1813H25.2937C25.2375 26.2875 24.45 27.7687 22.2375 27.8813C19.7812 27.8062 18.75 25.8938 18.75 22.7625C18.75 17.3438 21.15 17.175 22.275 17.1375ZM22.5 3.75C12.15 3.75 3.75 12.15 3.75 22.5C3.75 32.85 12.15 41.25 22.5 41.25C32.85 41.25 41.25 32.85 41.25 22.5C41.25 12.15 32.85 3.75 22.5 3.75ZM22.5 37.5C14.2313 37.5 7.5 30.7687 7.5 22.5C7.5 14.2313 14.2313 7.5 22.5 7.5C30.7687 7.5 37.5 14.2313 37.5 22.5C37.5 30.7687 30.7687 37.5 22.5 37.5Z" fill="white"/>
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

<!-- category section start -->
<section class="section category__section">
    <div class="flex-column g12">
        <h2 class="text-68">DANH MỤC</h2>
        <label for="" class="label-large-prominent">LEGOUS/</label>
    </div>
    <div class="auto-grid parent-category__wrapper g20 mt30">
        <div class="parent-category__item flex-column g30">
            <h3 class="parent-category__name headline-large ttu">STATUE</h3>
            <div class="category__wrapper flex-column g20">
                <!-- single category start -->
                <a href="#" class="category__item flex-center g20 p20 rounded-12" style="background: #7255B7; color: white">
                    <div class="banner-cover category__banner rounded-full" style="background-image: url('/public/assets/media/images/category/onpiece__banner.svg')"></div>
                    <div class="category__content flex-column g12">
                        <div class="title-medium">ONE PIECE</div>
                        <span class="body-medium">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt nulla eum magnam quisquam alias suscipit odit nihil
                        </span>
                        <label for="" class="label large">120 sản phẩm có sẵn</label>
                    </div>
                </a> 
                <!-- single category end -->

                <div class="category__item flex-center g20 p20 rounded-12" style="background: #7255B7; color: white">
                    <div class="banner-cover category__banner rounded-full" style="background-image: url('/public/assets/media/images/category/onpiece__banner.svg')"></div>
                    <div class="category__content flex-column g12">
                        <div class="title-medium">ONE PIECE</div>
                        <span class="body-medium">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt nulla eum magnam quisquam alias suscipit odit nihil
                        </span>
                        <label for="" class="label large">120 sản phẩm có sẵn</label>
                    </div>
                </div> 
                <div class="category__item flex-center g20 p20 rounded-12" style="background: #7255B7; color: white">
                    <div class="banner-cover category__banner rounded-full" style="background-image: url('/public/assets/media/images/category/onpiece__banner.svg')"></div>
                    <div class="category__content flex-column g12">
                        <div class="title-medium">ONE PIECE</div>
                        <span class="body-medium">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt nulla eum magnam quisquam alias suscipit odit nihil
                        </span>
                        <label for="" class="label large">120 sản phẩm có sẵn</label>
                    </div>
                </div> 
                <div class="category__item flex-center g20 p20 rounded-12" style="background: #7255B7; color: white">
                    <div class="banner-cover category__banner rounded-full" style="background-image: url('/public/assets/media/images/category/onpiece__banner.svg')"></div>
                    <div class="category__content flex-column g12">
                        <div class="title-medium">ONE PIECE</div>
                        <span class="body-medium">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt nulla eum magnam quisquam alias suscipit odit nihil
                        </span>
                        <label for="" class="label large">120 sản phẩm có sẵn</label>
                    </div>
                </div> 
            </div>
        </div>
        <div class="parent-category__item flex-column g30">
            <h3 class="parent-category__name headline-large ttu">STATUE</h3>
            <div class="category__wrapper flex-column g20">
                <div class="category__item flex-center g20 p20 rounded-12" style="background: #7255B7; color: white">
                    <div class="banner-cover category__banner rounded-full" style="background-image: url('/public/assets/media/images/category/onpiece__banner.svg')"></div>
                    <div class="category__content flex-column g12">
                        <div class="title-medium">ONE PIECE</div>
                        <span class="body-medium">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt nulla eum magnam quisquam alias suscipit odit nihil
                        </span>
                        <label for="" class="label large">120 sản phẩm có sẵn</label>
                    </div>
                </div> 
                <div class="category__item flex-center g20 p20 rounded-12" style="background: #7255B7; color: white">
                    <div class="banner-cover category__banner rounded-full" style="background-image: url('/public/assets/media/images/category/onpiece__banner.svg')"></div>
                    <div class="category__content flex-column g12">
                        <div class="title-medium">ONE PIECE</div>
                        <span class="body-medium">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt nulla eum magnam quisquam alias suscipit odit nihil
                        </span>
                        <label for="" class="label large">120 sản phẩm có sẵn</label>
                    </div>
                </div> 
                <div class="category__item flex-center g20 p20 rounded-12" style="background: #7255B7; color: white">
                    <div class="banner-cover category__banner rounded-full" style="background-image: url('/public/assets/media/images/category/onpiece__banner.svg')"></div>
                    <div class="category__content flex-column g12">
                        <div class="title-medium">ONE PIECE</div>
                        <span class="body-medium">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt nulla eum magnam quisquam alias suscipit odit nihil
                        </span>
                        <label for="" class="label large">120 sản phẩm có sẵn</label>
                    </div>
                </div> 
                <div class="category__item flex-center g20 p20 rounded-12" style="background: #7255B7; color: white">
                    <div class="banner-cover category__banner rounded-full" style="background-image: url('/public/assets/media/images/category/onpiece__banner.svg')"></div>
                    <div class="category__content flex-column g12">
                        <div class="title-medium">ONE PIECE</div>
                        <span class="body-medium">
                            Lorem ipsum dolor sit amet consectetur, adipisicing elit. Nesciunt nulla eum magnam quisquam alias suscipit odit nihil
                        </span>
                        <label for="" class="label large">120 sản phẩm có sẵn</label>
                    </div>
                </div> 
            </div>
        </div>
    </div>
</section>
<!-- category section end -->


<script>
    $(function() {
    const min = <?= $minPrice ?>;
        const max = <?= $maxPrice ?>;

        $("#slider-range").slider({
            range: true,
            min: min,
            max: max,
            values: [<?= $manualMin ?>, <?= $manualMax ?>],
            slide: function (event, ui) {
                $("#amount").val(formatCurrency(ui.values[0]) + " - " + formatCurrency(ui.values[1]));
            },
            stop: function (event, ui) {
                const minPrice = ui.values[0];
                const maxPrice = ui.values[1];
                // Redirect the user to the URL with the updated prices
                window.location.href = `?mod=page&act=category&idCategory=<?= $idCategory ?>&minPrice=${minPrice}&maxPrice=${maxPrice}`;
            }
        });

        $("#amount").val(formatCurrency($("#slider-range").slider("values", 0)) + " - " + formatCurrency($("#slider-range").slider("values", 1)));
    });

    // Function to format the value with currency symbol and rounding for VND
    function formatCurrency(value) {
        const formatter = new Intl.NumberFormat('vi-VN', {
            style: 'currency',
            currency: 'VND',
            maximumFractionDigits: 0,
        });
        return formatter.format(value);
    }
</script>

<script>
    let filterInputs = document.querySelectorAll('.filter__input');

    filterInputs.forEach(function (input) {
        let id = input.getAttribute('data-id-category');
        let urlParams = new URLSearchParams(window.location.search);
        let existingParams = Array.from(urlParams.entries());

        let filterCategory = urlParams.get('filterCategory');
        if (filterCategory) {
            filterCategory = filterCategory.split(',');
            if (filterCategory.includes(id)) {
                input.checked = true;
            }
        } else {
            filterCategory = [];
        }

        input.addEventListener('click', function () {
            if (input.checked) {
                if (!filterCategory.includes(id)) {
                    filterCategory.push(id);
                }
            } else {
                filterCategory = filterCategory.filter(item => item !== id);
            }

            // Remove existing filterCategory parameter
            existingParams = existingParams.filter(([param, value]) => param !== 'filterCategory');

            // Append updated filterCategory parameter
            if (filterCategory.length > 0) {
                existingParams.push(['filterCategory', filterCategory.join(',')]);
            }

            // Construct the new URL
            let newUrl = window.location.pathname;

            if (existingParams.length > 0) {
                let queryString = existingParams.map(([param, value]) => `${param}=${value}`).join('&');
                newUrl += '?' + queryString;
            }

            newUrl += window.location.hash;

            // Redirect to the new URL
            window.location.href = newUrl;
        });
    });
</script>