<?php
  include_once 'm_pdo.php';
  function getAllCart() {
    return pdo_query("SELECT * FROM cart");
  }
  function insertCart ($idUser, $id_product, $name, $price, $img, $qty, $totalCost) {
    $sql = "INSERT INTO 
              cart (id_user, id_product, name, price, img, qty, total_cost) 
            VALUES 
              ('$idUser', '$id_product', '$name', '$price', '$img', '$qty', '$totalCost') ";
    pdo_execute($sql);
  }

  function insertCartWithIdBill ($idBill, $idUser, $id_product, $name, $price, $img, $qty, $totalCost) {
    $sql = "INSERT INTO 
              cart (id_bill, id_user, id_product, name, price, img, qty, total_cost) 
            VALUES 
              ('$idBill', '$idUser', '$id_product', '$name', '$price', '$img', '$qty', '$totalCost') ";
    pdo_execute($sql);
  }

  function removeCartProduct ($idUser, $idProduct) {
    $sql = "DELETE FROM cart WHERE id_user = $idUser AND id_product = $idProduct";
    pdo_execute($sql);
  }

  function getCartByUserId ($idUser) {
    $sql = "SELECT * FROM cart WHERE id_user = $idUser";
    return pdo_query($sql);
  }
  function getCartByIdBill ($idBill) {
    $sql = "SELECT * FROM cart WHERE id_bill = $idBill";
    return pdo_query($sql);
  }

  function getProductFromDatabaseCart($user_id, $id_product) {
    $sql = "SELECT * FROM cart WHERE id_product = $id_product AND id_user = $user_id";
    return pdo_query($sql);
  }

  function updateProductInDatabaseCart($user_id, $id, $newQty, $newTotalCost) {
    $sql = "UPDATE cart
            SET qty='$newQty', total_cost=$newTotalCost
            WHERE id_user=$user_id AND id_product=id";
    pdo_execute($sql);
  }

  function updateIdBillInCart ($id_user, $id_bill) {
    $sql = "UPDATE cart
            SET id_bill = $id_bill 
            WHERE id_user = $id_user";
  }
?>