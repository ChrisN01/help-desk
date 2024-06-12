<?php
require_once("../config/conexion.php");

require_once("../models/Ticket.php");

$ticket = new Ticket();
if (isset($_GET["op"]) && $_GET["op"] === 'create') {
    $ticket->store($_POST["user_id"], $_POST["category_id"], $_POST["title"], $_POST["description"]);//Insert tickets

}
elseif(isset($_GET["op"]) && $_GET["op"] === 'list')
{
    $ticketsInfo = $ticket->listTicketByUser($_POST["user_id"]);
    $data=Array();

    foreach($ticketsInfo as $row)
    {

        $sub_array=array();
        $sub_array[]=$row["id"];
        $sub_array[]=$row["name"];
        $sub_array[]=$row["title"];
        $sub_array[]='<button type="button" onClick="show('.$row["id"].');" id="'.$row["id"].'" class="btn btn-inline btn-primary btn-sm ladda-button"><div><i class="fa fa-eye"></i></div></button>';
        $data[]=$sub_array;
    }

    $results = array("sEcho" =>1,
        "iTotalRecords" =>count($data),
        "iTotalDisplatRecords" =>count($data),
        "aaData"=>$data);

    echo json_encode($results);
}



?>