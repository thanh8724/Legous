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
        $Query = "SELECT * FROM product WHERE name LIKE '%$Name%' LIMIT 5";

        $stmt = $conn->prepare($Query);
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $productList = $stmt->fetchAll();
        $conn = null;

        foreach ($productList as $item) {
            extract($item);
            $imgPath = "./public/assets/media/images/product/$img";
            $linkToDetail = "?mod=page&act=productDetail&idProduct=$id";
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
                                <button class="icon-btn"><i class="fal fa-share"></i></button>
                                <button class="icon-btn love-btn toggle-btn"><i class="fal fa-heart"></i></button>
                                <button class="icon-btn"><i class="fal fa-shopping-cart"></i></button>
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