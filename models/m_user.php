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







    
    #Admin Starts
    function getUser() {
        return pdo_query("SELECT * FROM user ORDER BY id");
    }
    function getFullNameUser() {
        $result = pdo_query("SELECT username FROM user");
        $usernames = array();
        foreach ($result as $row) {
            $usernames[] = $row['username'];
        }
        return $usernames;
    }
    function getUserInfo($id) {
        return pdo_query("SELECT * FROM user WHERE id = {$id}"); 
    }
    function searchUser($inputSearch) {
        return pdo_query("SELECT * FROM user WHERE fullname LIKE '%$inputSearch%'");
    }

    function editUserProfile($id, $fullname, $username, $password, $email, $address, $image, $role, $bio, $phone) {
        pdo_execute("UPDATE user SET fullname = '$fullname', username = '$username', email = '$email', password = '$password', address = '$address', img = '$image', role = '$role', bio = '$bio', phone = '$phone' WHERE id = ".$id);
    }

    function addUserProfile($fullname, $username, $password, $email, $address, $image, $role, $bio, $phone) {
        pdo_execute("INSERT INTO user (fullname, username, email, password, address, img, role, bio, phone) VALUES ('$fullname', '$username', '$email', '$password', '$address', '$image', '$role', '$bio', '$phone') ");
    }

    function deleteUser($id) {
        pdo_execute("DELETE FROM user WHERE id = {$id}");
    }

    #Admin Ends
?>