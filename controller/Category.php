<?php
require_once("../config/conexion.php");

require_once("../models/Category.php");

$category = new Category();

if (isset($_GET["op"]) && $_GET["op"] === 'combo') {
    $data = $category->get_category();
    if (is_array($data) && count($data) > 0) {
        
        
        $html="";
        foreach ($data as $row) {
            $html.="<option value='".$row['id']."'>".$row['name']."</option>";
        }
        echo $html;
    }
}


?>