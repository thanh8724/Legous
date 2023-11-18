<?php
  include_once 'm_pdo.php';

  // hàm lấy tất cả bảng của category qua product để lấy tên category, mỗi trang sẽ có 9 products
  function productAdmin($page=1){
    $batdau = ($page - 1)*9;
    return pdo_query("SELECT p.*, c.name AS category_name FROM product p LEFT JOIN category c ON p.id_category = c.id LIMIT $batdau,9 ");
  }

  // hàm đếm tấc cả các product trong database
  function product_CountTotal(){
    return pdo_query_value('SELECT COUNT(*) FROM product');
  }
  
  // hàm lấy product theo id
  function product_getById($id){
      return pdo_query_one("SELECT p.*, c.name AS category_name FROM product p LEFT JOIN category c ON p.id_category = c.name WHERE p.id = ?", $id);
  }

  // xóa product theo id
  function remove_product($id){
    pdo_execute("DELETE FROM product WHERE id = ?", $id);
}

  // hàm thêm product bên admin
function product_add($name,$id_category,$description,$price, $img, $qty){
  pdo_execute("INSERT INTO product (`name`,`id_category`,`description`,`price`,`img`,`qty`) VALUES(?,?,?,?,?,?) ORDER BY creadt_date DESC",$name,$id_category,$description,$price, $img, $qty);
}

// hàm để kiểm tra tên sách đã có sẳn trong database hay chưa
function product_checkName($name){
  return pdo_query_one("SELECT * FROM product WHERE name = ?",$name);
}
?>