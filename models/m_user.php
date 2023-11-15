<?php 
    function getUser() {
        return pdo_query("SELECT * FROM user ORDER BY id");
    }
    function getUserInfo($id) {
        return pdo_query("SELECT * FROM user WHERE id = {$id}"); 
    }

    function editUserProfile($id,$fullname, $username, $password, $email, $address) {
        pdo_execute("UPDATE user SET fullname = $fullname, username = $username, email = $email, password = $password, address = $address WHERE id = ".$id);
    }
?>