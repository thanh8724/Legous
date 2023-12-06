<script>
    // love buttons handler
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

/** render regular product */
$productHtml = '';

// Number of products per page
$productsPerPage = 20;

// Current page number
$page = isset($_GET['page']) ? $_GET['page'] : 1;

// Calculate the offset for the SQL query
$offset = ($page - 1) * $productsPerPage;

// Fetch products from the database with LIMIT and OFFSET
$searchProducts = getSearchProductWithLimitAndOffset($productsPerPage, $offset, $query);

// Fetch total number of products from the database
$totalProducts = count(getProductByQuery($query));

// Calculate the total number of pages
$totalPages = ceil($totalProducts / $productsPerPage);

// pagination render 
$paginationHtml = '';
for ($i = 1; $i <= $totalPages; $i++) {
    $linkToPage = "?mod=page&act=search&query=$query&page=$i";
    $active = '';
    if ($page == $i) {
        $active = 'active';
    }
    $paginationHtml .=
        <<<HTML
            <li class="pagination__item $active"><a href="$linkToPage" class="pagination__link">$i</a></li>
        HTML;
}
$nextPage = $page + 1;

if ($nextPage >= $totalPages) {
    $linkToNextPage = "";
} else {
    $linkToNextPage = "?mod=page&act=category&idCategory=$idCategory&page=$nextPage";
}

foreach ($searchProducts as $item) {
    extract($item);
    $imgPath = constant('PRODUCT_PATH') . $img;
    $linkToDetail = "?mod=page&act=productDetail&idProduct=$id";

    $priceView = '';
    $salePriceView = '';

    if (isset($price) && $price > 0) {
        $priceView = '<div class="product__info__price body-large primary-text fw-bold">' . formatVND($price) . '</div>';
    } else {
        $priceView = '<div class="product__info__price body-large primary-text fw-bold">Đang cập nhật</div>';
    }

    if (isset($promotion) and $promotion > 0) {
        $salePrice = $price - $price * $promotion / 100;
        $salePriceView = '<div class="product__info__sale-price body-large primary-text fw-bold">' . formatVND($salePrice) . '</div>';
        $priceView = '<del class="product__info__price body-large primary-text fw-bold">' . formatVND($price) . '</del>';
    } else {
        $salePriceView = '';
        $priceView = '<div class="product__info__price body-large primary-text fw-bold">' . formatVND($price) . '</div>';
    }

    $loveBtnClass = '';
    $loveBtnIcon = 'far fa-heart';

    if (isset($_SESSION['loveProducts']) && !empty($_SESSION['loveProducts']) && is_array($_SESSION['loveProducts'])) {
        if (in_array($id, $_SESSION['loveProducts'])) {
            $loveBtnClass = 'active';
            $loveBtnIcon = 'fa fa-heart';
        }
        $loveBtn = '<button class="icon-btn love-btn toggle-btn ' . $loveBtnClass . '" data-product-id="' . $id . '"><i class="' . $loveBtnIcon . '"></i></button>';
    } else {
        $loveBtn =
            <<<HTML
                <button class="icon-btn love-btn toggle-btn" data-product-id="$id">
                    <i class="fal fa-heart"></i>
                </button>
            HTML;
    }

    $productBtn = '';
    if ($qty > 0) {
        $productBtn =
            <<<HTML
                <div class="flex g12 in-stock__btn-set">
                    <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                    $loveBtn
                    <form action="?mod=cart&act=addCart" method="post" class="flex-column g12">
                        <button type="submit" class="icon-btn">
                            <i class="fal fa-cart-plus"></i>
                        </button>
                        <input type="hidden" name="name" value="$name">
                        <input type="hidden" name="price" value="$price">
                        <input type="hidden" name="img" value="$img">
                        <input type="hidden" name="id" value="$id">
                        <input type="hidden" name="qty" id="data-qty" value="1">
                    </form>
                </div>
            HTML;
    } else {
        $productBtn =
            <<<HTML
                <div class="flex g12 sold-out__btn-set">
                    <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                    <button class="icon-btn"><i class="fal fa-plus"></i></button>
                    <button class="icon-btn"><i class="fal fa-arrow-right"></i></button>
                </div>
            HTML;
    }

    $views = formatViewsNumber($views);

    $productHtml .=
        <<<HTML
            <!-- single product start -->
            <div class="product">
                <a href="$linkToDetail" class="product__banner oh banner-contain rounded-8 por"
                    style="background-image: url($imgPath)">
                    <div class="product__overlay poa flex-center">
                        $productBtn
                    </div>
                </a>
                <a href="$linkToDetail" class="product__info">
                    <div class="product__info__name title-medium fw-smb">$name</div>
                    $salePriceView
                    $priceView
                </a>
                <div class="product__info flex-between width-full">
                    <div class="product__info__view body-medium">$views views</div>
                    <div class="product__info__rated flex g6 v-center body-medium">
                        4.4 <i class="fa fa-star start"></i>
                    </div>
                </div>
            </div>
            <!-- single product end -->
        HTML;
}
?>

<!-- shop mobile top navigation bar start -->
<div class="mobile-top__bar mobile-top__bar--shop p12 flex-center">
    <div class="mobile-top__inner flex-full flex-between v-center g12">
        <button class="icon-btn back-btn"><i class="fal fa-chevron-left"></i></button>
        <form action="?mod=page&act=search" method="get" class="form mobile__search-form flex-full">
            <div class="form__group width-full por">
                <button type="submit" class="poa" style="left: 2rem; top: 30%; transform: translate(-50%)"><i class="fal fa-search poa"></i></button>
                <input type="text" name="query" class="form__input rounded-100 width-full" style="padding-left: 4rem">
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
                    <a href="?mod=page&act=home" class="option__link ttc">trang chủ</a>
                </li>
                <li class="option__item">
                    <a href="#" class="option__link ttc">chia sẻ</a>
                </li>
                <li class="option__item">
                    <a href="?mod=page&act=mobileSearch" class="option__link ttc">tìm kiếm</a>
                </li>
                <li class="option__item">
                    <a href="#" class="option__link ttc">tin nhắn</a>
                </li>
                <li class="option__item">
                    <a href="?mod=user&act=general" class="option__link ttc">tài khoản của tôi</a>
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
<section class="section shop__title category__title auto-grid g30 mt80">
    <div class="flex-column g12">
        <h1 class="text-68 ttu">
            TÌM KIẾM
        </h1>
        <span class="label-large shop__navigation">Kết quả tìm kiếm cho <?= $query ?></span>
    </div>
</section>
<!-- shop title end -->

<!-- shop product start -->
<main class="section shop__main">
    <div class="product__wrapper product__wrapper--without-carousel auto-grid g20 mt30">
        <?= $productHtml ?>
    </div>
    <ul class="pagination flex g16 mt30">
        <?= $paginationHtml ?>
        <li class="btn text-btn rounded-100"><a href="<?= $linkToNextPage ?>" class="pagination__link"><i
                    class="fal fa-arrow-right" style="margin-right: .6rem"></i>Next</a></li>
    </ul>
</main>
<!-- shop product end -->

