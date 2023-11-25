<?php 
    function getAllComment() {
        return pdo_query("SELECT * FROM comment");
    }
    function getProductCommentByProductId($productId) {
        $sql = "SELECT * FROM comment WHERE id_product = $productId";
        return pdo_query($sql);
    }
    function insertComment($id_user, $id_product, $username, $email, $content) {
        // $sql = "INSERT INTO comment (id_user, id_product, username,
        pdo_execute("INSERT INTO comment (`id_user`,`id_product`,`username`,`email`,`content`) VALUES(?,?,?,?,?)",$id_user, $id_product, $username, $email, $content);

    }

    function getComment() {
        return pdo_query("SELECT * FROM comment ORDER BY reported DESC, is_appear");
    }

    function editCmtStatus($id, $value) {
        pdo_execute("UPDATE comment SET is_appear = $value WHERE id_user = '$id'");
    }
    function delCmt($id) {
        pdo_execute("DELETE FROM comment WHERE id_user = {$id}");
    }
?>