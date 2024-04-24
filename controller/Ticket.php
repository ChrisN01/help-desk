<?php
require_once("../config/conexion.php");

require_once("../models/Ticket.php");

$ticket = new Ticket();
if (isset($_GET["op"]) && $_GET["op"] === 'create') {
    $data = $ticket->store($_POST["user_id"], $_POST["category_id"], $_POST["title"], $_POST["description"]);//Insert tickets

}


?>