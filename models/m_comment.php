<?php 
    function getAllComment() {
        return pdo_query("SELECT * FROM comment");
    }
    function getProductCommentByProductId($productId) {
        $sql = "SELECT * FROM comment WHERE id_product = $productId ORDER BY id DESC";
        return pdo_query($sql);
    }
    function insertComment($id_user, $id_product, $username, $email, $content, $now) {
        // $sql = "INSERT INTO comment (id_user, id_product, username,
        return pdo_execute("INSERT INTO comment (`id_user`,`id_product`,`username`,`email`,`content`,`create_date`) VALUES(?,?,?,?,?,?)",$id_user, $id_product, $username, $email, $content, $now);
    }

    function getComment() {
        return pdo_query("SELECT * FROM comment ORDER BY reported DESC, is_appear");
    }
    function getImgCommentById($id) {
        $sql = "SELECT * FROM comment_img WHERE id_comment = $id ORDER BY id DESC";
        return pdo_query($sql);
    }

    function editCmtStatus($id, $value) {
        pdo_execute("UPDATE comment SET is_appear = {$value} WHERE id = {$id}");
    }
    function delCmt($id) {
        pdo_execute("DELETE FROM comment WHERE id = {$id}");
    }

    function addImgCmt($id_bill,$src) {
        pdo_execute("INSERT INTO comment_img (`id_comment`,`src`) VALUES(?,?)",$id_bill,$src);
    }

    function reported($id, $value) {
        pdo_execute("UPDATE comment SET reported = {$value} WHERE id = {$id}");
    }
?>