<?php
require_once("../config/conexion.php");

require_once("../models/Ticket.php");

$ticket = new Ticket();
if (isset($_GET["op"]) && $_GET["op"] === 'create') {
    $ticket->store($_POST["user_id"], $_POST["category_id"], $_POST["title"], $_POST["description"]);//Insert tickets

}
elseif (isset($_GET["op"]) && $_GET["op"] === 'insert_ticket_details')
{
     $ticket->insertTicketDetails($_POST["ticket_id"],$_POST["user_id"], $_POST["description"]);//Insert ticket details

}
elseif (isset($_GET["op"]) && $_GET["op"] === 'close_ticket') {
     $ticket->closeTicket($_POST["ticket_id"]);//Close ticket
 
 }
elseif(isset($_GET["op"]) && $_GET["op"] === 'get_ticket_by_user')
{
    $ticketsInfo = $ticket->getTicketByUser($_POST["user_id"]);
    $data=Array();

    foreach($ticketsInfo as $row)
    {
        $sub_array=array();
        $sub_array[]=$row["id"];
        $sub_array[]=$row["category"];
        $sub_array[]=$row["title"];
        if( $row["ticket_status"] == 'Open')
        {
            $sub_array[]='<span class="label label-success">'.$row["ticket_status"].'</span>';
        }
        else{
            $sub_array[]='<span class="label label-danger">'.$row["ticket_status"].'</span>';
        }
        $sub_array[]= date("d/m/Y H:i:s", strtotime($row["created_at"]));
        $sub_array[]='<button type="button" onClick="show('.$row["id"].');" id="'.$row["id"].'" class="btn btn-inline btn-primary btn-sm ladda-button"><div><i class="fa fa-eye"></i></div></button>';
        $data[]=$sub_array;
    }

    $results = array("sEcho" =>1,
        "iTotalRecords" =>count($data),
        "iTotalDisplatRecords" =>count($data),
        "aaData"=>$data);

    echo json_encode($results);
}
elseif(isset($_GET["op"]) && $_GET["op"] === 'get_tickets')
{
    $ticketsInfo = $ticket->getTickets();
    $data=Array();

    foreach($ticketsInfo as $row)
    {

        $sub_array=array();
        $sub_array[]=$row["id"];
        $sub_array[]=$row["category"];
        $sub_array[]=$row["title"];
        if( $row["ticket_status"] == 'Open')
        {
            $sub_array[]='<span class="label label-success">'.$row["ticket_status"].'</span>';
        }
        else{
            $sub_array[]='<span class="label label-danger">'.$row["ticket_status"].'</span>';
        }
        $sub_array[]= date("d/m/Y H:i:s", strtotime($row["created_at"]));
        $sub_array[]='<button type="button" onClick="show('.$row["id"].');" id="'.$row["id"].'" class="btn btn-inline btn-primary btn-sm ladda-button"><div><i class="fa fa-eye"></i></div></button>';
        $data[]=$sub_array;
    }

    $results = array("sEcho" =>1,
        "iTotalRecords" =>count($data),
        "iTotalDisplatRecords" =>count($data),
        "aaData"=>$data);

    echo json_encode($results);
}
elseif(isset($_GET["op"]) && $_GET["op"] === 'get_ticket_details_by_user')
{
    $ticketDetails=$ticket->getTicketDetailsById($_POST["ticket_id"]);

    ?>
        <?php
            foreach ($ticketDetails as $row) {
                ?>
                    <article class="activity-line-item box-typical">
                        <div class="activity-line-date">
                            <?php echo date("d/m/Y", strtotime($row["created_at"]))?>
                        </div>
                        <header class="activity-line-item-header">
                            <div class="activity-line-item-user">
                                <div class="activity-line-item-user-photo">
                                    <a href="#">
                                        <img src="../../public/img/photo-64-2.jpg" alt="">
                                    </a>
                                </div>
                                <div class="activity-line-item-user-name">   <?php echo $row['name'].' '.$row['lastname']?></div>
                                <div class="activity-line-item-user-status">
                                    <?php 
                                    if($row['rol_id']==1)
                                    {
                                        echo 'User';
                                    }
                                    else{
                                        echo 'Support';
                                    }?></div>
                            </div>
                        </header>
                        <div class="activity-line-action-list">
                            <section class="activity-line-action">
                                <div class="time">   <?php echo date("H:i:s", strtotime($row["created_at"]))?></div>
                                <div class="cont">
                                    <div class="cont-in">
                                        <p><?php echo $row['description']?></p>
                                
                                    </div>
                                </div>
                            </section><!--.activity-line-action-->
                        </div><!--.activity-line-action-list-->
                    </article><!--.activity-line-item-->
                <?php
            
            }
        ?>
    
    <?php
    



}
elseif(isset($_GET["op"]) && $_GET["op"] === 'show_ticket_detail')
{
    $ticketData=$ticket->getTicketById($_POST["ticket_id"]); 

    if(is_array($ticketData)==true and count($ticketData)>0){
        foreach($ticketData as $row)
        {
            $output["id"] = $row["id"];
            $output["user_id"] = $row["user_id"];
            $output["category_id"] = $row["category_id"];

            $output["title"] = $row["title"];
            $output["description"] = $row["description"];

            if ($row["ticket_status"]=="Open"){
                $output["ticket_status"] = '<span class="label label-success">'.$row["ticket_status"].'</span>';
            }else{
                $output["ticket_status"] = '<span class="label label-danger">'.$row["ticket_status"].'</span>';
            }

            $output["ticket_status_texto"] = $row["ticket_status"];

            $output["created_at"] = date("d/m/Y H:i:s", strtotime($row["created_at"]));
            $output["name"] = $row['name'].' '.$row['lastname'];
            $output["lastname"] = $row["lastname"];
            $output["category"] = $row["category"];
        }
        echo json_encode($output);
    }  

}


?>