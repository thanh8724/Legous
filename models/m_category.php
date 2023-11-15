<?php
    function getCategories($limit = 0) {
        $sql = "SELECT * FROM category";
        if ($limit > 0) {
            $sql .= " LIMIT $limit";
        }
        return pdo_query($sql);
    }
?>