<?php
include_once 'models/m_pdo.php';
    function  getCategories($start = 0, $limit = 0,$kyw =""){
        $sql = "SELECT * FROM category";
        if( $limit > 0){
            $sql .= " LIMIT ".$start.",".$limit;
        }
        if($kyw!=""){
            $sql = "AND LIKE '%".$kyw."%'";
        }
        return pdo_query($sql);
    }

    function getCategoryById ($idCategory) {
        $sql = "SELECT * FROM category WHERE id = $idCategory";
        return pdo_query_one($sql);
    }

    function getCategoriesSorted() {
        return pdo_query("SELECT * FROM category ORDER BY name ASC");
    }
?>

    