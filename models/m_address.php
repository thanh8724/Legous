<?php 
    function getUserAddressByIdUser($idUser) {
        $sql = "SELECT * FROM address WHERE id_user = $idUser AND is_default = 1";
        return pdo_query_one($sql);
    }
?>