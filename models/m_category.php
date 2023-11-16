<?php
    function getCategories($limit = 0) {
        $sql = "SELECT * FROM category";
        if ($limit > 0) {
            $sql .= " LIMIT $limit";
        }
        return pdo_query($sql);
    }

    function getCategoryById ($idCategory) {
        $sql = "SELECT * FROM category WHERE id = $idCategory";
        return pdo_query_one($sql);
    }
?>