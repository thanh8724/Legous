<?php
    include_once 'models/m_pdo.php';
   function checkAccount($email, $password) {
       return pdo_query_one("SELECT * FROM user WHERE email = ? AND password = ?", $email, $password);
   }
   
   function get_User() {
        return pdo_query_one("SELECT * FROM user");
   }

   // chỉnh sửa thông tin người dùng từ mã tài khoản
    function update_userName_email($new_username, $new_email, $id_user) {
        pdo_execute("UPDATE user SET username=?, email=? WHERE id = ?",$new_username, $new_email, $id_user);
    }
    
    function update_fullName_country_bio_avatar($new_fullname, $country, $bio, $new_avatar, $id_user) {
        pdo_execute("UPDATE user SET img = ?, fullname=?, country=?, bio = ?  WHERE id = ?",$new_avatar, $new_fullname, $country, $bio, $id_user);
    }

    function remove_avatar($new_avatar, $id_user) {
        pdo_execute("UPDATE user SET img = ? WHERE id = ?",$new_avatar, $id_user);
    }

    function get_imgAvatar($id_user) {
        return pdo_query_one("SELECT img FROM user WHERE id = ?", $id_user);
    }

    function get_address($id_user) {
        return pdo_query("SELECT * FROM address WHERE id_user = ?", $id_user);
    }
    function get_fullName_user($id_user) {
        return pdo_query("SELECT fullname FROM user WHERE id = ?", $id_user);
    }
?>