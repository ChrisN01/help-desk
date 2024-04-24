<?php

class Category extends Connect{

    public function get_category()
    {
        $connect = parent::conexion();
        parent::set_names();
        
        $sql = "SELECT * FROM categories WHERE status=1;";

        $sql= $connect->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll();
    }

}
