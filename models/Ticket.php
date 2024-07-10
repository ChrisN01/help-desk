<?php

class Ticket extends Connect{

//Insert tickets
    public function store($user_id, $category_id, $title,$description)
    {
        $connect = parent::conexion();
        parent::set_names();
        
        $sql = "INSERT INTO tickets (id, user_id, category_id, title, description, ticket_status,status, created_at) VALUES (NULL, ?, ?, ?, ?, 'Open', '1', now());";

        $sql= $connect->prepare($sql);
        
        $sql->bindValue(1,$user_id);
        $sql->bindValue(2,$category_id);
        $sql->bindValue(3,$title);
        $sql->bindValue(4,$description);
        $sql->execute();
        return $result = $sql->fetchAll();
    }

// Get tickets by user id
    public function getTicketByUser($user_id)
    {
        $connect = parent::conexion();
        parent::set_names();
        $sql="SELECT 
                tickets.id,
                tickets.user_id,
                tickets.category_id,
                tickets.title,
                tickets.description,
                tickets.ticket_status,
                tickets.status,
                tickets.created_at,
                users.name,
                users.lastname,
                categories.name
                FROM 
                tickets
                INNER join categories on tickets.category_id = categories.id
                INNER join users on tickets.user_id = users.id
                WHERE
                tickets.status = 1
                AND users.id=?";



        $sql= $connect->prepare($sql);
        $sql->bindValue(1,$user_id);
        $sql->execute();
        return $result = $sql->fetchAll();


    }
//Get all tickets to support area
    public function getTickets()
    {
        $connect = parent::conexion();
        parent::set_names();
        $sql="SELECT 
                tickets.id,
                tickets.user_id,
                tickets.category_id,
                tickets.title,
                tickets.description,
                tickets.ticket_status,
                tickets.status,
                tickets.created_at,
                users.name,
                users.lastname,
                categories.name
                FROM 
                tickets
                INNER join categories on tickets.category_id = categories.id
                INNER join users on tickets.user_id = users.id
                WHERE
                tickets.status = 1";



        $sql= $connect->prepare($sql);
        $sql->execute();
        return $result = $sql->fetchAll();


    } 

    public function getTicketDetailsByUser($ticket_id)
    {
        $connect = parent::conexion();
        parent::set_names();
        $sql="SELECT ticket_details.id,
        ticket_details.description,
        ticket_details.created_at,
        users.name,
        users.lastname,
        users.rol_id
        FROM ticket_details
        INNER JOIN users on ticket_details.user_id = users.id
        WHERE ticket_id=?;";



        $sql= $connect->prepare($sql);
        $sql->bindValue(1,$ticket_id);
        $sql->execute();
        return $result = $sql->fetchAll();


    }
}
