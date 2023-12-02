<?php
include_once 'models/m_pdo.php';

# Lấy account đã đnăg xuất
function get_accountUser($value)
{
    return pdo_query("SELECT * FROM user WHERE id = ?", $value);
}

# general - edit profile
function checkAccount($id_user)
{
    return pdo_query_one("SELECT * FROM user WHERE id = ?", $id_user);
}
function checkAccounts($id_account)
{
    return pdo_query_one("SELECT * FROM user WHERE id = ?", $id_account);
}

function get_userBy_email_password($email_user, $password_user)
{
    return pdo_query("SELECT * FROM user WHERE email = ? AND password = ?", $email_user, $password_user);
}

function getUserById($idUser)
{
    $sql = "SELECT * FROM user WHERE id = $idUser";
    return pdo_query_one($sql);
}
function getAddress()
{
    $sql = "SELECT * FROM address";
    return pdo_query_one($sql);
}

// chỉnh sửa thông tin người dùng từ mã tài khoản
function update_userName_email($new_username, $new_email, $id_user)
{
    pdo_execute("UPDATE user SET username=?, email=? WHERE id = ?", $new_username, $new_email, $id_user);
}

function update_fullName_country_bio_avatar($new_fullname, $country, $bio, $new_avatar, $id_user)
{
    pdo_execute("UPDATE user SET img = ?, fullname=?, country=?, bio = ?  WHERE id = ?", $new_avatar, $new_fullname, $country, $bio, $id_user);
}

function remove_avatar($new_avatar, $id_user)
{
    pdo_execute("UPDATE user SET img = ? WHERE id = ?", $new_avatar, $id_user);
}

function get_imgAvatar($id_user)
{
    return pdo_query_one("SELECT img FROM user WHERE id = ?", $id_user);
}
# edit profile end


# address start
function get_address($id_user)
{
    return pdo_query("SELECT * FROM address WHERE id_user = ?", $id_user);
}

function insertUser($username, $email, $password)
{
    $sql = "INSERT INTO user (username, email, password) VALUES (?, ?, ?)"; // Use parameterized query
    $userId = pdo_execute($sql, $username, $email, $password);
    return $userId; // Return the last inserted ID
}

function checkUser($email, $password)
{
    $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    return pdo_query_one($sql);
}

function getUserByInfo($email, $password)
{
    $sql = "SELECT * FROM user WHERE email = '$email' AND password = '$password'";
    return pdo_query_one($sql);
}

function generateRandomUsername($length)
{
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789';
    $username = '';

    $charactersLength = strlen($characters);
    for ($i = 0; $i < $length; $i++) {
        $username .= $characters[rand(0, $charactersLength - 1)];
    }

    return $username;
}

function generateRandomPassword($length)
{
    $characters = 'abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789!@#$%^&*()';
    $password = '';

    $charactersLength = strlen($characters);
    for ($i = 0; $i < $length; $i++) {
        $password .= $characters[rand(0, $charactersLength - 1)];
    }

    return $password;
}


function getUser()
{
    return pdo_query("SELECT * FROM user ORDER BY id");
}
function getFullNameUser()
{
    $result = pdo_query("SELECT username FROM user");
    $usernames = array();
    foreach ($result as $row) {
        $usernames[] = $row['username'];
    }
    return $usernames;
}
function getUserInfo($id)
{
    return pdo_query("SELECT * FROM user WHERE id = {$id}");
}
function searchUser($inputSearch)
{
    return pdo_query("SELECT * FROM user WHERE fullname LIKE '%$inputSearch%' OR username LIKE '%$inputSearch%' OR email LIKE '%$inputSearch%' or phone LIKE '%$inputSearch%'");
}
function getAllAddressByUser($id)
{
    return pdo_query("SELECT * FROM address WHERE id_user = {$id}");
}
function get_addressByid($id_address)
{
    $sql = "SELECT * FROM address WHERE id = '$id_address'";
    return pdo_query($sql);
}
function get_addressMainByIdUser($id)
{
    return pdo_query("SELECT * FROM address WHERE id_user = '$id' AND is_default = 1");
}
function get_addressByIdUser($id)
{
    return pdo_query("SELECT * FROM address WHERE id_user = {$id} AND is_default = 0");
}
function check_addressDefault()
{
    $sql = "SELECT * FROM address WHERE is_default = '1'";
    return pdo_query($sql);
}

function add_address($name_user, $phone_user, $address_detail, $address_user, $address_default, $id_user)
{
    pdo_execute("INSERT INTO address (`id_user`,`username`,`address`,`address_detail`,`phone`,`is_default`) VALUES(?,?,?,?,?,?)", $id_user, $name_user, $address_user, $address_detail, $phone_user, $address_default);
}

function un_addressDefault($is_addressDefault)
{
    pdo_execute("UPDATE address SET is_default = 0 WHERE id = " . $is_addressDefault);
}

function set_defaultAddress($id_address)
{
    pdo_execute("UPDATE address SET is_default = 1 WHERE id = " . $id_address);
}

function upadate_address($name_user, $phone_user, $address_detail, $address_user, $address_default, $id_address)
{
    pdo_execute("UPDATE address SET username = ?, address=?, address_detail=?, phone = ?, is_default = ?  WHERE id = ?", $name_user, $address_user, $address_detail, $phone_user, $address_default, $id_address);
}
function update_addressmain($id_user, $text, $phone)
{
    pdo_execute("UPDATE address SET address_detail = '$text', phone = '$phone' where id_user = {$id_user} AND is_default = 1");
}
function delete_address($id_address)
{
    pdo_execute("DELETE FROM address WHERE id = ?", $id_address);
}
function delete_address_byIduser($id_user)
{
    pdo_execute("DELETE FROM address WHERE id_user = ?", $id_user);
}


# password
function get_password($id_user)
{
    return pdo_query_value("SELECT password FROM user WHERE id = ?", $id_user);
}
function update_password($new_password, $id_user)
{
    pdo_execute("UPDATE user SET password = ? WHERE id = ?", $new_password, $id_user);
}

#order
function get_order($id_order)
{
    return pdo_query("SELECT * FROM bill WHERE id = ? ", $id_order);
}
function get_namePayment($id_payment)
{
    return pdo_query_value("SELECT name FROM payment WHERE id = ?", $id_payment);
}
function get_nameShipping($id_shipping)
{
    return pdo_query_value("SELECT name FROM shipping WHERE id = ?", $id_shipping);
}
function get_fullname($id_user)
{
    return pdo_query_value("SELECT fullname FROM user WHERE id = ?", $id_user);
}
function get_product_order($id_order)
{
    return pdo_query("SELECT * FROM cart WHERE id_bill = ?", $id_order);
}
function get_orderHistory($id_user, $current_page, $itemsPage)
{
    $startItem = ($current_page - 1) * $itemsPage;
    $query = "SELECT * FROM bill WHERE id_user = $id_user ORDER BY id DESC LIMIT $startItem, $itemsPage";
    return pdo_query($query);
}

function get_total_orders($id_user)
{
    return pdo_query_value("SELECT COUNT(*) FROM bill WHERE id_user = ?", $id_user);
}

function get_priceShipping($id_shipping)
{
    return pdo_query_value("SELECT price FROM shipping WHERE id = ?", $id_shipping);
}
function get_priceCoupon($id_coupon)
{
    return pdo_query_value("SELECT price FROM coupon WHERE id = ?", $id_coupon);
}

# delete account
function get_id_comments($id_user)
{
    return pdo_query("SELECT id FROM comment WHERE id_user = ?", $id_user);
}
function get_allBill($id_user)
{
    return pdo_query("SELECT * FROM bill WHERE id_user = ?", $id_user);
}
function get_id_bill_cart($id_bill)
{
    return pdo_query("SELECT id FROM cart WHERE id_bill = ?", $id_bill);
}
function getAllBillByIdUser($id)
{
    return pdo_query("SELECT * FROM bill WHERE id_user = ?", $id);

}
function getAllCartByIdUser($id)
{
    return pdo_query("SELECT * FROM cart WHERE id_user = ?", $id);

}
function get_id_bill($id_user)
{
    return pdo_query("SELECT id FROM bill WHERE id_user = ?", $id_user);
}
function delete_bill_fromCart($id_user)
{
    pdo_execute("DELETE FROM cart WHERE id_user = {$id_user}");
}
function delete_bill($id_user)
{
    pdo_execute("DELETE FROM bill WHERE id_user = {$id_user}");
}
function delete_blogComnent_byIduser($id_user)
{
    pdo_execute("DELETE FROM blog_comment WHERE id_user = {$id_user}");
}
function delete_comments_byIduser($id_user)
{
    pdo_execute("DELETE FROM comment WHERE id_user = {$id_user}");
}
function delete_Imgcomments($id_comment)
{
    pdo_execute("DELETE FROM comment_img WHERE id_comment = {$id_comment}");
}
function delete_acccount($id_user)
{
    pdo_execute("DELETE FROM user WHERE id = ?", $id_user);
}
function getBill()
{
    return pdo_query("SELECT * FROM bill");
}
function getBillByID($id)
{
    return pdo_query("SELECT * FROM bill WHERE id = {$id}");
}

function editUserProfile($id, $fullname, $username, $password, $email, $image, $role, $bio, $phone)
{
    pdo_execute("UPDATE user SET fullname = '$fullname', username = '$username', email = '$email', password = '$password', img = '$image', role = '$role', bio = '$bio', phone = '$phone' WHERE id = " . $id);
}
function addUserProfile($fullname, $username, $password, $email, $address, $image, $role, $bio, $phone)
{
    pdo_execute("INSERT INTO user (fullname, username, email, password, address, img, role, bio, phone) VALUES ('$fullname', '$username', '$email', '$password', '$address', '$image', '$role', '$bio', '$phone') ");
}

function deleteUser($id)
{
    pdo_execute("DELETE FROM user WHERE id = {$id}");
}


#Sort User
function sortOldUser()
{
    return pdo_query("SELECT * FROM user ORDER BY id DESC");
}

function sortAToZUser()
{
    return pdo_query("SELECT * FROM user ORDER BY fullname");
}
function sortZToAUser()
{
    return pdo_query("SELECT * FROM user ORDER BY fullname DESC");
}