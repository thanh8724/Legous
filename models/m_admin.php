<?php
  // hàm lấy tất cả người dùng
include_once 'models/m_pdo.php';

  function getAllClient(){
    return pdo_query("SELECT * FROM user");
  }

  function get_Categoris($start = 0, $limit = 0, $kyw_cg = "") {
    $sql = "SELECT * FROM category";
    if ($kyw_cg != "") {
        $sql .= " WHERE name LIKE '%$kyw_cg%'";
    }
    if ($limit > 0) {
        $sql .= " LIMIT $start, $limit";
    }
    return pdo_query($sql);
}

function count_Categoris(){
    return pdo_query_one("SELECT count(*) AS soluong FROM category");
}
function count_products_category($id) {
    $sql = "SELECT COUNT(product.id) AS SLSP 
            FROM category 
            LEFT JOIN product ON category.id = product.id_category 
            WHERE category.id = ? 
            GROUP BY category.id";
    return pdo_query($sql, $id);
}
function getidCategories($id) {
    return pdo_query_one("SELECT * FROM category WHERE id = ? ", $id);
}
function update_Category($id_category, $name_cg, $description_cg, $img_cg, $is_appear, $is_special) {
    pdo_execute("UPDATE category SET name= ?, description = ?, img = ?, is_appear = ?, is_special = ? WHERE id = ?", $name_cg, $description_cg, $img_cg, $is_appear, $is_special, $id_category);
}
function add_Category($add_name_cg, $add_img_cg, $add_description_cg, $add_color_cg) {
    pdo_execute("INSERT INTO category (name, img, description, bg_color) VALUES ('$add_name_cg', '$add_img_cg', '$add_description_cg', '$add_color_cg')");
}  
?>  

