<?php 
include_once 'models/m_pdo.php';

    function addNewCoupon($code, $name, $discount, $expiredDate, $description, $datenow) {
        pdo_execute("INSERT INTO coupon (`coupon_code`, `name`, `discount`, `expired_date`, `description`,`create_date`) VALUES(?,?,?,?,?,?)",$code, $name, $discount, $expiredDate, $description, $datenow);
    }
?>