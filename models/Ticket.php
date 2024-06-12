<?php

class Ticket extends Connect{

//Insert tickets
    public function store($user_id, $category_id, $title,$description)
    {
        $connect = parent::conexion();
        parent::set_names();
        
        $sql = "INSERT INTO tickets (id, user_id, category_id, title, description, status) VALUES (NULL, ?, ?, ?, ?, '1');";

        $sql= $connect->prepare($sql);
        
        $sql->bindValue(1,$user_id);
        $sql->bindValue(2,$category_id);
        $sql->bindValue(3,$title);
        $sql->bindValue(4,$description);
        $sql->execute();
        return $result = $sql->fetchAll();
    }


    public function listTicketByUser($user_id)
    {
        $connect = parent::conexion();
        parent::set_names();
        $sql="SELECT 
                tickets.id,
                tickets.user_id,
                tickets.category_id,
                tickets.title,
                tickets.description,
                tickets.status,
                users.name,
                users.lastname,
                categories.name
                FROM 
                tickets
                INNER join categories on tickets.category_id = categories.id
                INNER join users on tickets.user_id = users.id
                WHERE
                tickets.status = 1
                AND users.id=1";



        $sql= $connect->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll();


    }

}
