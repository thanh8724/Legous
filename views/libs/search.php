<?php
function formatVND($amount) {
    $formattedAmount = number_format($amount, 0, ',', '.');
    $formattedAmount .= ' đ';
    
    return $formattedAmount;
}

// search engine
if (isset($_POST['search'])) {
    $Name = $_POST['search'];

    // connect database
    $servername = "localhost";
    $username = "root";
    $password = "";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=legous_db", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        // echo "Connected successfully";
        // fetch data
        $Query = "SELECT * FROM product WHERE name LIKE '%$Name%' LIMIT 12";

        $stmt = $conn->prepare($Query);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $productList = $stmt->fetchAll();
        $conn = null;

        foreach ($productList as $item) {
            extract($item);
            $imgPath = "./public/assets/media/images/product/$img";
            $linkToDetail = "?mod=page&act=productDetail&idProduct=$id";

            $productBtn = '';
            if ($qty > 0) {
                $productBtn =
                    <<<HTML
                        <div class="flex g12 in-stock__btn-set">
                            <button class="icon-btn"><i class="fal fa-share-alt"></i></button>
                            <button class="icon-btn love-btn toggle-btn" data-product-id="$id">
                                <i class="fal fa-heart"></i>
                            </button>
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
            
            echo '
                    <!-- single search product start -->
                    <div class="search__product flex-between p20 rounded-8 width-full">
                        <div class="flex g12">
                            <div class="search__product__banner">
                                <img src="'. $imgPath .'" alt="">
                            </div>
                            <div class="search__product__info flex-column flex-between">
                                <a href="?mod=page&act=productDetail&idProduct='.$id.'" class="search__product__name title-large underline">'.$name.'</a>
                                <div class="search__product__price title-medium">'.formatVND($price).'</div>
                            </div>
                        </div>
                        <div class="flex-between flex-column a-end">
                            <button class="icon-btn delete-search-product__btn"><i class="fal fa-times"></i></button>
                            <div class="flex g12">
                                '.$productBtn.'
                            </div>
                        </div>
                    </div>
                    <!-- single search product end -->
                ';
        }
    } catch (PDOException $e) {
        // echo "Connection failed: " . $e->getMessage();
    }
}

?>