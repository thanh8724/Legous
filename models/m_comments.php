<?php 
    include_once 'models/m_pdo.php';

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