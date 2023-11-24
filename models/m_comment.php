<?php 

    function getProductCommentByProductId($productId) {
        $sql = "SELECT * FROM comment WHERE id_product = $productId";
        return pdo_query($sql);
    }

?>