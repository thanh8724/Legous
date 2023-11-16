<?php
include_once 'models/m_pdo.php';
    function get_Categoris($start = 0, $limit = 0,$kyw =""){
        $sql = "SELECT * FROM category";
        if( $limit > 0){
            $sql .= " LIMIT ".$start.",".$limit;
        }
        if($kyw!=""){
            $sql = "AND LIKE '%".$kyw."%'";
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
    function update_Category($id_category, $name_cg, $description_cg) {
        pdo_execute("UPDATE category SET name= ?, description = ? WHERE id = ?", $name_cg, $description_cg, $id_category);
    }
    function getCategoriesSorted() {
        return pdo_query("SELECT * FROM category ORDER BY name ASC");
    }
?>  