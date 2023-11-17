<?php 
    function insertUser($username, $email, $password) {
        $sql = "INSERT INTO user (username, email, password) VALUES (?, ?, ?)"; // Use parameterized query
        $userId = pdo_execute($sql, $username, $email, $password);
        return $userId; // Return the last inserted ID
    }

    function checkUser ($email, $password) {
        $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
        return pdo_query_one($sql);
    }
    
    function getUserByInfo ($email , $password) {
        $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
        return pdo_query_one($sql);
    }
    function getUser() {
        return pdo_query("SELECT * FROM user ORDER BY id");
    }
    function getUserInfo($id) {
        return pdo_query("SELECT * FROM user WHERE id = {$id}"); 
    }

    function editUserProfile($id,$fullname, $username, $password, $email, $address, $image) {
        pdo_execute("UPDATE user SET fullname = '$fullname', username = '$username', email = '$email', password = '$password', address = '$address', img = '$image' WHERE id = ".$id);
    }
?>