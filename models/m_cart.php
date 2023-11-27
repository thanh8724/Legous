<?php
  include_once 'm_pdo.php';
  function getAllCart() {
    return pdo_query("SELECT * FROM cart");
  }
?>