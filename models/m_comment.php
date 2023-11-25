<?php 

    function getProductCommentByProductId($productId) {
        $sql = "SELECT * FROM comment WHERE id_product = $productId";
        return pdo_query($sql);
    }
    function insertComment($id_user, $id_product, $username, $email, $content) {
        // $sql = "INSERT INTO comment (id_user, id_product, username,
        pdo_execute("INSERT INTO comment (`id_user`,`id_product`,`username`,`email`,`content`) VALUES(?,?,?,?,?)",$id_user, $id_product, $username, $email, $content);

    }
?>