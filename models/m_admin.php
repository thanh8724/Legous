<?php
  // hàm lấy tất cả người dùng
  function getAllClient(){
    return pdo_query("SELECT * FROM user");
  }

  
?>