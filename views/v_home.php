
<script>
    $(document).ready(function () {
        $('.love-btn').click(function () {
            var button = $(this);
            var productId = button.data('product-id');

            // Disable the love button
            button.prop('disabled', true);

            // Make an AJAX request to update the love value
            $.ajax({
                url: './views/libs/update_love.php', // Replace with the correct path to your PHP script
                method: 'POST', // HTTP method (GET, POST, etc.)
                data: { product_id: productId }, // Data to send to the server, e.g., product ID
                success: function (response) {
                    // Handle the response from the server if needed
                    console.log(response);
                },
                error: function (xhr, status, error) {
                    console.error('Error:', error);
                    // Enable the love button if there was an error
                    button.prop('disabled', false);
                }
            });
        });
    });
</script>

<?php 
    /** product rendering */
    extract($topLoveProduct[0]);
    $img_path = './public/assets/media/images/product/'.$img.'';
    $topProductHtml = '
        <div class="product product__spotlight">
            <a href="#" class="product__banner product__spotlight__banner banner-contain rounded-8 por"
                style="background-image: url('.$img_path.')">
                <div class="product__overlay poa flex-center">
                    <div class="flex g12 in-stock__btn-set">
                        <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                        <button class="icon-btn love-btn toggle-btn"  data-product-id="'.$id.'"><i class="fal fa-heart"></i></button>
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
                <div class="product__info__name headline-medium fw-smb">'.$name.'</div>
                <div class="product__info__price title-large">'.formatVND($price).'</div>
            </a>
            <div class="product__info flex-between width-full">
                <div class="product__info__view title-large">1,2m+ views</div>
                <div class="product__info__rated flex g6 v-center body-medium">
                    4.4 <i class="fa fa-star start"></i>
                </div>
            </div>
        </div>
    ';

    
    function renderLoveProducts($products, $productsPerWrapper) {
        $html = '';
        $wrapperIndex = 1;
        $productIndex = 0;

        $totalProducts = count($products);
        $totalWrappers = ceil($totalProducts / $productsPerWrapper);

        for ($i = 0; $i < $totalWrappers; $i++) {
            $wrapperClass = 'product-slick__wrapper__' . $wrapperIndex;

            $html .= <<<HTML
                <div class="carousel__container flex-column g12 por">
                    <div class="product__wrapper grid-auto g20 width-full {$wrapperClass}">
            HTML;

            for ($j = 0; $j < $productsPerWrapper; $j++) {
                $product = $products[$productIndex] ?? null;

                if (!$product) {
                    break;
                }
                extract($product);
                $imgPath = constant('PRODUCT_PATH') . $img;

                $priceView = '';
                $salePriceView = '';
                $loveBtn = '<button class="icon-btn love-btn toggle-btn" data-product-id="'.$id.'"><i class="fal fa-heart"></i></button>';

                if (isset($price) && $price > 0) {
                    $priceView = '<div class="product__info__price body-medium">' . formatVND($price) . '</div>';
                } else {
                    $priceView = '<div class="product__info__price body-medium">Đang cập nhật</div>';
                }
                
                if (isset($promotion) and $promotion > 0) {
                    $salePrice = $price - $price * $promotion / 100;
                    $salePriceView = '<div class="product__info__sale-price body-medium">' . formatVND($salePrice) . '</div>';
                    $priceView = '<del class="product__info__price body-small">' . formatVND($price) . '</del>';
                } else {
                    $salePriceView = '';
                    $priceView = '<div class="product__info__price body-medium">' . formatVND($price) . '</div>';
                }
                
                $html .= <<<HTML
                    <div class="product product__carousel">
                        <!-- single product start -->
                        <div class="product product__carousel">
                            <a href="#" class="product__banner banner-contain rounded-8 por"
                                style="background-image: url('$imgPath')">
                                <div class="product__overlay poa flex-center">
                                    <div class="flex g12 in-stock__btn-set">
                                        <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                                        $loveBtn
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
                                <div class="product__info__name title-medium fw-smb">$name</div>
                                $priceView
                                $salePriceView
                            </a>
                            <div class="product__info flex-between width-full">
                                <div class="product__info__view body-medium">1,2m+ views</div>
                                <div class="product__info__rated flex g6 v-center body-medium">
                                    4.4 <i class="fa fa-star start"></i>
                                </div>
                            </div>
                        </div>
                        <!-- single product end -->
                    </div>
                HTML;

                $productIndex++;
            }

            $html .= <<<HTML
                    </div>
                </div>
            HTML;

            $wrapperIndex++;
        }

        return $html;
    }
    
    /** tabs render */
    $tabsHtml = '';
    $panelsHtml = '';
    if (isset($categories)) {
        $i = 1;
        foreach ($categories as $item) {
            extract($item);
            $collectionItemTitle = '<h2 class="text-46 ttu">'.$item['name'].'</h2>';
            
            $tabsHtml .= 
            <<<HTML
                <div class="tab__item" data-defaultActive="$i">
                    <span class="tab__item__label label-large ttu tac">$name</span>
                </div>
            HTML;
            $i++;

            $products = getProductsByCategoryId($id);
            $productsHtml = '';

            foreach ($products as $product) {
                extract($product);
                $imgPath = constant('PRODUCT_PATH') . $img;

                $priceView = '';
                $salePriceView = '';
                $loveBtn = '<button class="icon-btn love-btn toggle-btn" data-product-id="' . $id . '"><i class="fal fa-heart"></i></button>';

                if (isset($price) && $price > 0) {
                    $priceView = '<div class="product__info__price body-medium">' . formatVND($price) . '</div>';
                } else {
                    $priceView = '<div class="product__info__price body-medium">Đang cập nhật</div>';
                }

                if (isset($promotion) and $promotion > 0) {
                    $salePrice = $price - $price * $promotion / 100;
                    $salePriceView = '<div class="product__info__sale-price body-medium">' . formatVND($salePrice) . '</div>';
                    $priceView = '<del class="product__info__price body-small">' . formatVND($price) . '</del>';
                } else {
                    $salePriceView = '';
                    $priceView = '<div class="product__info__price body-medium">' . formatVND($price) . '</div>';
                }
                
                $productsHtml .= 
                <<<HTML
                    <!-- single product start -->
                    <div class="product product__carousel">
                        <a href="#" class="product__banner oh banner-contain rounded-8 por"
                            style="background-image: url($imgPath)">
                            <div class="product__overlay poa flex-center">
                                <div class="flex g12 in-stock__btn-set">
                                    <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                                    $loveBtn
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
                            <div class="product__info__name title-medium fw-smb">$name</div>
                            $priceView
                            $salePriceView
                        </a>
                        <div class="product__info flex-between width-full">
                            <div class="product__info__view body-medium">1,2m+ views</div>
                            <div class="product__info__rated flex g6 v-center body-medium">
                                4.4 <i class="fa fa-star start"></i>
                            </div>
                        </div>
                    </div>
                    <!-- single product end -->
                HTML;
            }
            
            $panelsHtml .= 
            <<<HTML
                <div class="panel__item">
                    <!-- /*collection item*/ -->
                    <div class="width-full collection__item">
                        <!-- /*collection item title*/ -->
                        <div class="flex-between">
                            $collectionItemTitle 
                            <a href="#" class="btn rounded-100 text-btn"><i class="fal fa-arrow-right"></i>Xem nhiều hơn</a>
                        </div>
                        <div class="product__wrapper product__wrapper--normal product__wrapper--normal--slick__1 auto-grid g20">
                            $productsHtml
                        </div>
                    </div>
                </div>
            HTML;
        }
    }

    /** partner render  */
    $partnerHtml = '';
    if (isset($partner)) {
        foreach ($partner as $item) {
            extract($item);
            $partnerHtml .=
            <<<HTML
                <a href="$link" class="partner__item db">
                    <img src="./public/assets/media/images/brands/$img" alt="$description">
                </a>
            HTML;
        }
    }

    /** category rendering */
    $categoryHtml = '';
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
                    <div class="title-medium ttu">$name</div>
                    <span class="body-medium">
                        $description
                    </span>
                    <label for="" class="label large">$amount sản phẩm</label>
                </div>
            </a>
            <!-- single category end -->
        HTML;
    }
?>


<!-- header start -->
<header class="header flex-full width-full flex-center pof">
        <div class="header__inner flex-full flex-between por v-center">
            <!-- header respon nav start -->
            <ul class="header__nav header__nav-respon">
                <li class="header__nav__item header__nav-respon__item">
                    <button class="icon-btn open-respon-btn"><i class="fal fa-bars"></i></button>
                </li>
            </ul>
            <!-- header respon nav end -->
            <a href="?mod=page&act=home"><img src="./public/assets/media/images/logo.svg" alt="" class="logo"></a>
            <ul class="header__nav flex g60">
                <li class="header__nav__item"><a href="?mod=page&act=home" class="header__nav__link">Trang chủ</a>
                </li>
                <li class="header__nav__item">
                    <a href="?mod=page&act=shop" class="header__nav__link">Cửa hàng</a>
                    <div class="header__subnav__wrapper header__mega-menu poa box-shadow1 rounded-8">
                        <div class="top p20 flex-column g12 mega-menu__item">
                            <div class="title-medium fw-bold">Cửa hàng</div>
                            <span class="body-medium">Lorem ipsum, dolor sit amet consectetur adipisicing elit. Dicta consequuntur assumenda</span>
                        </div>
                        <div class="content flex mega-menu__item">
                            <div class="product__wrapper p20">
                                <!-- single product start -->
                                <div class="title-large fw-bold primary-masking-text">Hot deal! Sale off 20%</div>
                                <div class="product mt12">
                                    <a href="#" class="product__banner oh banner-cover rounded-8 por"
                                        style="background-image: url('<?= constant('PRODUCT_PATH') . $specialProduct['img'] ?>')">
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
                                <div class="product__info__name title-medium fw-smb">
                                    <?= $specialProduct['name'] ?>
                                </div>
                                <div class="product__info__price body-medium">
                                    <?= formatVND($specialProduct['price']) ?>
                                </div>
                            </a>
                            <div class="product__info flex-between width-full">
                                <div class="product__info__view body-medium">1,2m+ views</div>
                                <div class="product__info__rated flex g6 v-center body-medium">
                                    4.4 <i class="fa fa-star start"></i>
                                </div>
                            </div>
                        </div>
                        <!-- single product end -->
                    </div>
                    <div class="mega-menu__nav--wrapper p20 auto-grid g30">
                        <?= $subnavHtml ?>
                    </div>
                </div>
            </div>
        </li>
        <li class="header__nav__item por">
            <a href="#" class="header__nav__link">Khác</a>
            <div class="flex-between header__subnav__wrapper poa box-shadow1 p20 rounded-8 g30">
                <ul class="header__subnav flex-full flex-column">
                    <li class="header__nav__item header__subnav__item">
                        <a href="#" class="header__nav__link header__subnav__link ttu">liên hệ</a>
                    </li>
                    <li class="header__nav__item header__subnav__item">
                        <a href="#" class="header__nav__link header__subnav__link ttu">trợ giúp</a>
                    </li>
                    <li class="header__nav__item header__subnav__item">
                        <a href="#" class="header__nav__link header__subnav__link ttu">về chúng tôi</a>
                    </li>
                    <li class="header__nav__item header__subnav__item">
                        <a href="#" class="header__nav__link header__subnav__link ttu">chính sách bảo
                            mật</a>
                    </li>
                    <li class="header__nav__item header__subnav__item">
                        <a href="#" class="header__nav__link header__subnav__link ttu">chính sách hoàn
                            tiền</a>
                    </li>
                </ul>
            </div>
        </li>
    </ul>
    <ul class="header__nav flex g30">
        <li class="header__nav__item flex-center">
            <button class="icon-btn open-search-box__btn rounded-full">
                <i class="far fa-search"></i>
            </button>
        </li>
        <li class="header__nav__item flex-center"><button class="icon-btn" data-elm-function=""><i
                    class="far fa-shopping-cart"></i></button></li>
        <li class="header__nav__item por flex-center">
            <?= $userWidgetHtml ?>
        </li>
    </ul>

    <!-- header respon nav start -->
    <ul class="header__nav header__nav-respon">
        <li class="header__nav__item header__nav-respon__item">
            <button class="icon-btn open-respon-btn"><i class="fal fa-shopping-cart"></i></button>
        </li>
    </ul>
    <!-- header respon nav end -->

</div>

    <!-- header search box start -->
    <div class="header__search-box pof">
        <button class="icon-btn close-search-box__btn" style="align-self: flex-end;">
            <i class="fal fa-times"></i>
        </button>
        <form action="" class="form search__form">
            <div class="form__group flex-center por">
                <input type="text" class="form__input search__form__input" placeholder="Nhập tên sản phẩm">
                <button class="icon-btn search__form__btn"><i class="far fa-search"></i></button>
            </div>
        </form>
        <div class="search__product__wrapper mia flex-column g16" style="overflow-y: auto; width: 50vw; height: 50rem">
            <!-- single search product start -->
            <!-- <div class="search__product flex-between p20 rounded-8 width-full">
                        <div class="flex g12">
                            <div class="search__product__banner">
                                <img src="./public/assets/media/images/product/v944cyfrwt851.webp" alt="">
                            </div>
                            <div class="search__product__info flex-column flex-between">
                                <a href="" class="search__product__name title-large underline">Itachi - Susano
                                    Ribcage</a>
                                <div class="search__product__price title-medium">2.344.900 VND</div>
                            </div>
                        </div>
                        <div class="flex-between flex-column a-end">
                            <button class="icon-btn delete-search-product__btn"><i class="fal fa-times"></i></button>
                            <div class="flex g12">
                                <button class="icon-btn"><i class="fal fa-share"></i></button>
                                <button class="icon-btn love-btn toggle-btn"><i class="fal fa-heart"></i></button>
                                <button class="icon-btn"><i class="fal fa-shopping-cart"></i></button>
                            </div>
                        </div>
                    </div> -->
            <!-- single search product end -->
        </div>
    </div>
    <!-- header search box end -->

</header>

<!-- header respon fullscreen nav start -->
<ul class="header__nav-respon header__nav-respon-full">
    <li class="header__nav-respon-full__item flex-between v-center">
        <button class="icon-btn"><i class="fal fa-user"></i></button>
        <button class="icon-btn close-respon-btn"><i class="fal fa-times"></i></button>
    </li>
    <li class="header__nav-respon-full__item flex-between">
        <a href="#" class="header__nav-respon-full__link">Trang chủ</a>
    </li>
    <li class="header__nav-respon-full__item flex-between">
        <a href="#" class="header__nav-respon-full__link">cửa hàng</a>
    </li>
    <li class="header__nav-respon-full__item flex-between">
        <a href="#" class="header__nav-respon-full__link">liên hệ</a>
    </li>
    <li class="header__nav-respon-full__item flex-between">
        <a href="#" class="header__nav-respon-full__link">tài khoản</a>
    </li>
</ul>
<!-- header respon fullscreen nav end -->

<!-- hero banner start -->
<div class="hero-banner__wrapper">
    <div class="hero-banner__item box-shadow1 grid-2">
        <div class="left flex-column">
            <div class="flex v-center"><i class="fal fa-copyright"></i><span class="body-large">/2023</span>
            </div>
            <div class="hightlight-text">MÔ HÌNH LUFFY GEAR 5 XỊN XÒ</div>
            <span class="subtext label-medium">Khám phá những mô hình thú vị và độc đáo cùng với LEGOUS! Tại
                đây, chúng tôi cung cấp những mô hình với đa dạng nhân vật và các chủ đề khác nhau, hứa hẹn sẽ
                đáp ứng được nhu cầu mua sắm của bạn.</span>
            <div class="row g12 button-set">
                <button class="btn primary-btn rounded-100">Mua ngay</button>
                <button class="btn elevated-btn rounded-100"><i class="fal fa-arrow-right"></i>Đến cửa
                    hàng</button>
            </div>
            <div class="flex avt-wrapper">
                <div class="flex avt-group">
                    <img src="./public/assets/media/images/users/user-1.svg" alt="">
                    <img src="./public/assets/media/images/users/user-2.svg" alt="">
                    <img src="./public/assets/media/images/users/user-3.svg" alt="">
                </div>
                <div class="flex-column flex-between">
                    <span class="label-large">1,9 nghìn</span>
                    <span class="label-large">Người đã mua</span>
                </div>
            </div>
        </div>
        <div class="right banner-contain"
            style="background-image: url('./public/assets/media/images/banners/luffy_banner.svg'); min-width: 50%; min-height: 100%">
        </div>
    </div>
    <div class="hero-banner__item grid-2"
        style="background: linear-gradient(110deg, #5E007E 14.03%, #A000D8 96.4%); color: white">
        <div class="left flex-column">
            <div class="flex v-center"><i class="fal fa-copyright"></i><span class="body-large">/2023</span>
            </div>
            <div class="hightlight-text" style="color: white">SASUKE - SUSANO TOÀN CHÂN THỂ</div>
            <span class="subtext label-medium">Khám phá những mô hình thú vị và độc đáo cùng với LEGOUS! Tại
                đây, chúng tôi cung cấp những mô hình với đa dạng nhân vật và các chủ đề khác nhau, hứa hẹn sẽ
                đáp ứng được nhu cầu mua sắm của bạn.</span>
            <div class="row g12 button-set">
                <button class="btn primary-btn rounded-100">Mua ngay</button>
                <button class="btn elevated-btn rounded-100"><i class="fal fa-arrow-right"></i>Đến cửa
                    hàng</button>
            </div>
            <div class="flex avt-wrapper">
                <div class="flex avt-group">
                    <img src="./public/assets/media/images/users/user-1.svg" alt="">
                    <img src="./public/assets/media/images/users/user-2.svg" alt="">
                    <img src="./public/assets/media/images/users/user-3.svg" alt="">
                </div>
                <div class="flex-column flex-between">
                    <span class="label-large">1,9 nghìn</span>
                    <span class="label-large">Người đã mua</span>
                </div>
            </div>
        </div>
        <div class="right banner-contain" style="
                background-image: url('./public/assets/media/images/banners/sasuke-susano_banner.svg');
                ">
        </div>
    </div>
    <div class="hero-banner__item grid-2"
        style="background: linear-gradient(180deg, #FF3030 0%, #FF3D3D 100%); color: white">
        <div class="left flex-column">
            <div class="flex v-center"><i class="fal fa-copyright"></i><span class="body-large">/2023</span>
            </div>
            <div class="hightlight-text" style="color: white">SASUKE - SUSANO TOÀN CHÂN THỂ</div>
            <span class="subtext label-medium">Khám phá những mô hình thú vị và độc đáo cùng với LEGOUS! Tại
                đây, chúng tôi cung cấp những mô hình với đa dạng nhân vật và các chủ đề khác nhau, hứa hẹn sẽ
                đáp ứng được nhu cầu mua sắm của bạn.</span>
            <div class="row g12 button-set">
                <button class="btn primary-btn rounded-100">Mua ngay</button>
                <button class="btn elevated-btn rounded-100"><i class="fal fa-arrow-right"></i>Đến cửa
                    hàng</button>
            </div>
            <div class="flex avt-wrapper">
                <div class="flex avt-group">
                    <img src="./public/assets/media/images/users/user-1.svg" alt="">
                    <img src="./public/assets/media/images/users/user-2.svg" alt="">
                    <img src="./public/assets/media/images/users/user-3.svg" alt="">
                </div>
                <div class="flex-column flex-between">
                    <span class="label-large">1,9 nghìn</span>
                    <span class="label-large">Người đã mua</span>
                </div>
            </div>
        </div>
        <div class="right banner-contain" style="
                background-image: url('./public/assets/media/images/banners/itachi-susano_banner.svg');
                ">
        </div>
    </div>
</div>
<!-- hero banner end -->

<!-- sale banner start -->
<div class="width-full sale-banner__wrapper auto-grid">
    <div class="sale-banner__item title-medium fw-bold">
        <svg xmlns="http://www.w3.org/2000/svg" width="25" height="24" viewBox="0 0 25 24" fill="none">
            <path
                d="M12.3233 2C6.80331 2 2.33331 6.48 2.33331 12C2.33331 17.52 6.80331 22 12.3233 22C17.8533 22 22.3333 17.52 22.3333 12C22.3333 6.48 17.8533 2 12.3233 2ZM16.5633 18L12.3333 15.45L8.10331 18L9.22331 13.19L5.49331 9.96L10.4133 9.54L12.3333 5L14.2533 9.53L19.1733 9.95L15.4433 13.18L16.5633 18Z"
                fill="white" />
        </svg>Giảm ngay 20% cho người mới<svg xmlns="http://www.w3.org/2000/svg" width="25" height="24"
            viewBox="0 0 25 24" fill="none">
            <path
                d="M12.3233 2C6.80331 2 2.33331 6.48 2.33331 12C2.33331 17.52 6.80331 22 12.3233 22C17.8533 22 22.3333 17.52 22.3333 12C22.3333 6.48 17.8533 2 12.3233 2ZM16.5633 18L12.3333 15.45L8.10331 18L9.22331 13.19L5.49331 9.96L10.4133 9.54L12.3333 5L14.2533 9.53L19.1733 9.95L15.4433 13.18L16.5633 18Z"
                fill="white" />
        </svg>
    </div>
    <div class="sale-banner__item title-medium fw-bold"><i class="fas fa-shipping-fast"></i>Free ship cho đơn
        hàng trên 2 triệu<i class="fas fa-shipping-fast"></i></div>
</div>
<!-- sale banner end -->

<!-- most love products section start -->
<section class="section most-love__section">
    <div class="flex-between v-center">
        <span class="product-amount text-68">10+</span>
        <div class="flex-column">
            <h2 class="text-68 ttu">top yêu thích</h2>
            <span class="light-devider" style="width: 30%; height: .4rem;"></span>
            <h2 class="text-68 ttu" style="color: #4A4458">sản phẩm</h2>
        </div>
    </div>
    <div class="auto-grid g20 mt30">
        <div class="product__wrapper">
            <!-- /** top love product start */ -->
            <?= $topProductHtml ?>
            <!-- /** top love product end */ -->
        </div>
        <div class="flex-column g20">
            <?= renderLoveProducts($loveProducts, 6) ?>
        </div>
    </div>
</section>
<!-- most love products section end -->

<!-- benefit section start -->
<section class="section benefit__section desktop row flex-between g30">
    <div class="flex-column g12" style="width: min(40rem, 100%)">
        <div class="section__title">
            <div class="text-46 ttu">
                Vô vàn ưu đãi hấp dẫn cùng 
                <span class="primary-masking-text">legous</span>
            </div>
        </div>
        <span class="light-devider" style="height: .4rem; width: 20rem"></span>
        <p class="body-large" style="max-width: 70rem;">LegoUS là website chuyên cung cấp các sản phẩm Lego và
            mô hình chính hãng, uy tín và chất lượng tại Việt Nam. Với kho hàng đa dạng, phong phú, LegoUS mang
            đến cho khách hàng những trải nghiệm mua sắm tuyệt vời nhất.</p>
        <div class="flex g12">
            <button class="btn primary-btn">Khám phá ngay</button>
            <button class="btn elevated-btn rounded-100">Liên hệ</button>
        </div>
    </div>
    <div class="grid-2 benefit__wrapper g30">
        <div class="benefit__item flex-column g20 rounded-8">
            <div class="benefit__icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
<path d="M30.6 4.20001H9.00001C6.34905 4.20001 4.20001 6.34905 4.20001 9.00001V11.4M4.20001 11.4V39C4.20001 41.651 6.34905 43.8 9.00001 43.8H39C41.651 43.8 43.8 41.651 43.8 39V16.2C43.8 13.549 41.651 11.4 39 11.4H4.20001ZM37.2 27.6C37.2 29.2569 35.8569 30.6 34.2 30.6C32.5432 30.6 31.2 29.2569 31.2 27.6C31.2 25.9432 32.5432 24.6 34.2 24.6C35.8569 24.6 37.2 25.9432 37.2 27.6Z" stroke="#1D192B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
            </div>
            <div class="benefit__content desktop flex-column g12">
                <h4 class="benefit__title title-medium fw-bold">Set up your wallet</h4>
                <span class="benefit__detail body-large">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </span>
            </div>
        </div>
        <div class="benefit__item flex-column g20 rounded-8">
            <div class="benefit__icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
<path d="M4.19995 11.88C4.19995 9.19176 4.19995 7.84763 4.72312 6.82086C5.18331 5.91768 5.91762 5.18337 6.8208 4.72318C7.84757 4.20001 9.1917 4.20001 11.88 4.20001H12.12C14.8082 4.20001 16.1523 4.20001 17.1791 4.72318C18.0823 5.18337 18.8166 5.91768 19.2768 6.82086C19.8 7.84763 19.8 9.19176 19.8 11.88V12.12C19.8 14.8083 19.8 16.1524 19.2768 17.1792C18.8166 18.0823 18.0823 18.8167 17.1791 19.2768C16.1523 19.8 14.8082 19.8 12.12 19.8H11.88C9.1917 19.8 7.84757 19.8 6.8208 19.2768C5.91762 18.8167 5.18331 18.0823 4.72312 17.1792C4.19995 16.1524 4.19995 14.8083 4.19995 12.12V11.88Z" stroke="#1D192B" stroke-width="1.5" stroke-linejoin="round"/>
<path d="M28.1999 11.88C28.1999 9.19176 28.1999 7.84763 28.7231 6.82086C29.1833 5.91768 29.9176 5.18337 30.8208 4.72318C31.8476 4.20001 33.1917 4.20001 35.8799 4.20001H36.1199C38.8082 4.20001 40.1523 4.20001 41.1791 4.72318C42.0823 5.18337 42.8166 5.91768 43.2768 6.82086C43.7999 7.84763 43.7999 9.19176 43.7999 11.88V12.12C43.7999 14.8083 43.7999 16.1524 43.2768 17.1792C42.8166 18.0823 42.0823 18.8167 41.1791 19.2768C40.1523 19.8 38.8082 19.8 36.1199 19.8H35.8799C33.1917 19.8 31.8476 19.8 30.8208 19.2768C29.9176 18.8167 29.1833 18.0823 28.7231 17.1792C28.1999 16.1524 28.1999 14.8083 28.1999 12.12V11.88Z" stroke="#1D192B" stroke-width="1.5" stroke-linejoin="round"/>
<path d="M4.19995 35.88C4.19995 33.1918 4.19995 31.8476 4.72312 30.8209C5.18331 29.9177 5.91762 29.1834 6.8208 28.7232C7.84757 28.2 9.1917 28.2 11.88 28.2H12.12C14.8082 28.2 16.1523 28.2 17.1791 28.7232C18.0823 29.1834 18.8166 29.9177 19.2768 30.8209C19.8 31.8476 19.8 33.1918 19.8 35.88V36.12C19.8 38.8083 19.8 40.1524 19.2768 41.1792C18.8166 42.0823 18.0823 42.8166 17.1791 43.2768C16.1523 43.8 14.8082 43.8 12.12 43.8H11.88C9.1917 43.8 7.84757 43.8 6.8208 43.2768C5.91762 42.8166 5.18331 42.0823 4.72312 41.1792C4.19995 40.1524 4.19995 38.8083 4.19995 36.12V35.88Z" stroke="#1D192B" stroke-width="1.5" stroke-linejoin="round"/>
<path d="M28.1999 35.88C28.1999 33.1918 28.1999 31.8476 28.7231 30.8209C29.1833 29.9177 29.9176 29.1834 30.8208 28.7232C31.8476 28.2 33.1917 28.2 35.8799 28.2H36.1199C38.8082 28.2 40.1523 28.2 41.1791 28.7232C42.0823 29.1834 42.8166 29.9177 43.2768 30.8209C43.7999 31.8476 43.7999 33.1918 43.7999 35.88V36.12C43.7999 38.8083 43.7999 40.1524 43.2768 41.1792C42.8166 42.0823 42.0823 42.8166 41.1791 43.2768C40.1523 43.8 38.8082 43.8 36.1199 43.8H35.8799C33.1917 43.8 31.8476 43.8 30.8208 43.2768C29.9176 42.8166 29.1833 42.0823 28.7231 41.1792C28.1999 40.1524 28.1999 38.8083 28.1999 36.12V35.88Z" stroke="#1D192B" stroke-width="1.5" stroke-linejoin="round"/>
</svg>
            </div>
            <div class="benefit__content desktop flex-column g12">
                <h4 class="benefit__title title-medium fw-bold">Set up your wallet</h4>
                <span class="benefit__detail body-large">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </span>
            </div>
        </div>
        <div class="benefit__item flex-column g20 rounded-8">
            <div class="benefit__icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
<path d="M4.20001 30.2L16.8 19.8L31.8 35.4M25.8 28.2L34.8 22.2L43.8 30.6M9.00001 43.8H39C41.651 43.8 43.8 41.651 43.8 39V9.00001C43.8 6.34905 41.651 4.20001 39 4.20001H9.00001C6.34905 4.20001 4.20001 6.34905 4.20001 9.00001V39C4.20001 41.651 6.34905 43.8 9.00001 43.8Z" stroke="#1D192B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
            </div>
            <div class="benefit__content desktop flex-column g12">
                <h4 class="benefit__title title-medium fw-bold">Set up your wallet</h4>
                <span class="benefit__detail body-large">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </span>
            </div>
        </div>
        <div class="benefit__item flex-column g20 rounded-8">
            <div class="benefit__icon">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" viewBox="0 0 48 48" fill="none">
<path d="M22.2 4.19999H8.99995C6.34898 4.19999 4.19995 6.34902 4.19995 8.99999V30.2M4.19995 30.2V39C4.19995 41.651 6.34899 43.8 8.99995 43.8H39C41.6509 43.8 43.8 41.651 43.8 39V30.6L34.8 22.2L25.8 28.2M4.19995 30.2L16.8 19.8L31.8 35.4M35.6249 17.4H30.6V12.375L40.1343 2.84069C41.5219 1.45309 43.7716 1.45309 45.1592 2.84069C46.5469 4.2283 46.5469 6.47806 45.1592 7.86567L35.6249 17.4Z" stroke="#1D192B" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"/>
</svg>
            </div>
            <div class="benefit__content desktop flex-column g12">
                <h4 class="benefit__title title-medium fw-bold">Set up your wallet</h4>
                <span class="benefit__detail body-large">Lorem Ipsum is simply dummy text of the printing and typesetting industry. </span>
            </div>
        </div>
    </div>
</section>
<!-- benefit section end -->

<!-- product section start -->
<section class="section product__section flex-column g30">
    <div class="product__section__title flex-center flex-column g12">
        <h2 class="text-68 tac">SẢN PHẨM</h2>
        <span class="label-large tac" style="max-width: 31.5rem">Khám phá mô hình của những bộ truyện hoặc những
            nhân vật bạn yêu thích</span>
        <div class="light-devider" style="width: 10rem; height: .4rem"></div>
    </div>
    <div class="tab__container full oh">
        <div class="tabs flex-center width-full">
            <?= $tabsHtml ?>
        </div>
        <div class="panels">
            <?= $panelsHtml ?>
        </div>
    </div>
</section>
<!-- product section end -->

<!-- partner section start -->
<section class="section partner__section partner__slick-carousel auto-grid g100">
    <?= $partnerHtml ?>
</section>
<!-- partner section end -->

<!-- coming soon section start  -->
<section class="section comming-soon__section">
    <?php 
        extract($upcommingProduct);
        $upCommingImgPath = constant('PRODUCT_PATH') . $img;
    ?>
    <div class="auto-grid g30">
        <div class="banner-cover"
            style="background-image: url('<?= $upCommingImgPath ?>');width: 100%; aspect-ratio: 1/1.2;">
        </div>
        <div class="flex-column g30 flex-full">
            <span class="text-46 fw-normal error60">COMING SOON!</span>
            <h2 class="text-68 fw-bold" style="text-wrap: balance;"><?= $name ?></h2>
            <h4 class="display-small error60">Chỉ từ <?= formatVND($price) ?></h4>
            <span class="body-large">Đây chắc hẳn là sản phẩm được rất nhiều fan của GOKU mong đợi. Sau một
                khoảng thời gian rất lâu thì cuối cùng, vị anh hùng trái đất người Sayan của chúng ta đã sắp trở
                lại với hình dạng SUPER SAYAN cực khủng. Nhanh tay đặt trước ngay!</span>
            <form action="#" class="pre-order__form width-full flex-column g12" method="post">
                <div class="form__group form__group without-title width-full">
                    <input class="form__input " type="text" name="email" class="" placeholder=" ">
                    <label for="" class="label__place">Email</label>
                    <span class="form__message"></span>
                </div>
                <div class="form__group form__group without-title width-full">
                    <input class="form__input" type="number" name="qty" class="" placeholder=" ">
                    <label for="" class="label__place">Số lượng</label>
                    <span class="form__message"></span>
                </div>
                <div class="row g20">
                    <button type="submit" class="btn primary-btn">Đặt trước ngay</button>
                    <a href="#" class="btn rounded-100 elevated-btn">Xem chi tiết</a>
                </div>
            </form>
        </div>
    </div>
</section>
<!-- coming soon section end  -->

<!-- category section start -->
<section class="section category__section">
    <div class="flex-column g12">
        <h2 class="text-68">DANH MỤC</h2>
        <label for="" class="label-large-prominent">LEGOUS/</label>
    </div>
    <div class="auto-grid parent-category__wrapper g20 mt30">
        <?= $categoryHtml ?>
    </div>
</section>
<!-- category section end -->

<!-- mobile bottom navbar start -->
<div class="home-bottom-navbar p10 flex-center pof width-full">
    <ul class="width-full p12 rounded-8 box-shadow1 flex-between">
        <li class="bottom-navbar__item">
            <a href="#" class="bottom-navbar__link p10 rounded-8">
                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20" fill="none">
                    <g clip-path="url(#clip0_55247_9670)">
                        <path d="M19.6863 1.5H11.4759" stroke="#6750A4" stroke-width="8" />
                        <path d="M18.4998 8.21021V-0.000212983" stroke="#6750A4" stroke-width="8" />
                        <path d="M0 18.5H8.21042" stroke="#6750A4" stroke-width="8" />
                        <path d="M1.50024 11.3772V19.5876" stroke="#6750A4" stroke-width="8" />
                        <path d="M1.49976 0.000488281V8.21091" stroke="#6750A4" stroke-width="8" />
                        <path d="M8.20996 1.5H-0.000454984" stroke="#6750A4" stroke-width="8" />
                        <path d="M18.5 19.9006V11.3769" stroke="#6750A4" stroke-width="8" />
                        <path d="M11.4763 18.5H20.0001" stroke="#6750A4" stroke-width="8" />
                    </g>
                    <defs>
                        <clipPath id="clip0_55247_9670">
                            <rect width="20" height="20" fill="white" />
                        </clipPath>
                    </defs>
                </svg>
                <span class="label-large-prominent">Trang Chủ</span>
            </a>
        </li>
        <li class="bottom-navbar__item">
            <a href="#" class="bottom-navbar__link p10 rounded-8">
                <svg xmlns="http://www.w3.org/2000/svg" width="29" height="24" viewBox="0 0 29 24" fill="none">
                    <path
                        d="M21.3333 6H19C19 3.79 16.9117 2 14.3333 2C11.755 2 9.66667 3.79 9.66667 6H7.33333C6.05 6 5 6.9 5 8V20C5 21.1 6.05 22 7.33333 22H21.3333C22.6167 22 23.6667 21.1 23.6667 20V8C23.6667 6.9 22.6167 6 21.3333 6ZM12 10C12 10.55 11.475 11 10.8333 11C10.1917 11 9.66667 10.55 9.66667 10V8H12V10ZM14.3333 4C15.6167 4 16.6667 4.9 16.6667 6H12C12 4.9 13.05 4 14.3333 4ZM19 10C19 10.55 18.475 11 17.8333 11C17.1917 11 16.6667 10.55 16.6667 10V8H19V10Z"
                        fill="#1D192B" />
                </svg>
                <span class="label-large-prominent">Cửa hàng</span>
            </a>
        </li>
        <li class="bottom-navbar__item">
            <a href="#" class="bottom-navbar__link p10 rounded-8">
                <svg xmlns="http://www.w3.org/2000/svg" width="21" height="20" viewBox="0 0 21 20" fill="none">
                    <rect x="0.666748" width="20" height="20" rx="10" fill="#1D1B20" />
                    <path fill-rule="evenodd" clip-rule="evenodd"
                        d="M13.6669 8C13.6669 9.65685 12.3237 11 10.6669 11C9.01002 11 7.66687 9.65685 7.66687 8C7.66687 6.34315 9.01002 5 10.6669 5C12.3237 5 13.6669 6.34315 13.6669 8ZM12.6669 8C12.6669 9.10457 11.7714 10 10.6669 10C9.5623 10 8.66687 9.10457 8.66687 8C8.66687 6.89543 9.5623 6 10.6669 6C11.7714 6 12.6669 6.89543 12.6669 8Z"
                        fill="white" />
                    <path
                        d="M10.6669 12.5C7.42968 12.5 4.67151 14.4142 3.62085 17.096C3.8768 17.3502 4.14642 17.5906 4.42851 17.816C5.21088 15.3538 7.66523 13.5 10.6669 13.5C13.6685 13.5 16.1229 15.3538 16.9052 17.816C17.1873 17.5906 17.4569 17.3502 17.7129 17.096C16.6622 14.4142 13.9041 12.5 10.6669 12.5Z"
                        fill="white" />
                </svg>
                <span class="label-large-prominent">Tài khoản</span>
            </a>
        </li>
        <li class="bottom-navbar__item">
            <a href="#" class="bottom-navbar__link p10 rounded-8">
                <i class="fa fa-search"></i>
                <span class="label-large-prominent">Tìm kiếm</span>
            </a>
        </li>
    </ul>
</div>
<!-- mobile bottom navbar end -->