<?php 
    function getProducts ($limit = 0, $order = '') {
        $sql = "SELECT * FROM product";
        if ($limit > 0) {
            $sql .= " LIMIT $limit";
        }
        if ($order != '')
            $sql .= " ORDER BY $order";
        return pdo_query($sql);
    }

    function getProductsByCategoryId($id_category, $order = 0, $limit = 0) {
        $sql = "SELECT * FROM product WHERE id_category = $id_category";

        if ($order != 0) {
            $sql .= " ORDER BY name DESC";
        }

        if ($limit > 0) {
            $sql .= " LIMIT $limit";
        }

        return pdo_query($sql);
    }
    function getProductsByLove ($limit = 0) {
        $sql = "SELECT * FROM product ORDER BY love DESC";
        if ($limit > 0) {
            $sql .= " LIMIT $limit";
        }
        return pdo_query($sql);
    }

    function getFeatureProduct () {
        $sql = "SELECT * FROM product WHERE is_upcomming > 0 LIMIT 1";
        return pdo_query_one($sql);
    }
    
    function getSpecialProduct() {
        $sql = "SELECT * FROM product WHERE is_special > 0 LIMIT 1";
        return pdo_query_one($sql);
    }

    function getFeatureProductOfCategory ($idCategory , $limit = 0) {
        $sql = "SELECT * FROM product WHERE id_category = $idCategory AND is_feature = 1";
        if ($limit > 0) {
            $sql .= " LIMIT $limit";
        }
        return pdo_query($sql);
    }

    function getCategoryProductsByPriceFilter($min , $max , $idCategory) {
        $sql = "SELECT * FROM product WHERE id_category = $idCategory AND price BETWEEN $min AND $max";
        return pdo_query($sql);
    }
    function getMaxProductPrice() {
        $sql = "SELECT MAX(price) AS max_price FROM product";
        return pdo_query_value($sql);
    }
    function getMinProductPrice() {
        $sql = "SELECT MIN(price) AS min_price FROM product";
        return pdo_query_value($sql);
    }
?>