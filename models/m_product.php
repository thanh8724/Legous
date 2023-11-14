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

?>