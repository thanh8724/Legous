<?php 
    function getProducts ($limit = 0) {
        $sql = "SELECT * FROM product";
        if ($limit > 0) {
            $sql .= " LIMIT $limit";
        }
        return pdo_query($sql);
    }
    
    function getProductsByCategoryId ($id_category ,$limit = 0) {
        $sql = "SELECT * FROM product WHERE id_category = $id_category";
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
?>