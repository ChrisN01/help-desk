<?php
require_once("../../config/conexion.php");

if(isset($_SESSION["id"]))
{

?>

<!DOCTYPE html>
<html>
<?php require_once("../MainHead/head.php");?>
	<title>Help Desk | Consult Ticket</title>
</head>
<body class="with-side-menu">

    <?php require_once("../MainHeader/header.php");?>
	<div class="mobile-menu-left-overlay"></div>
    <?php
    require_once("../MainNav/nav.php")
    ?>

<!-- 	Contenido -->
	<div class="page-content">
		<div class="container-fluid">
			<header class="section-header">
					<div class="tbl">
						<div class="tbl-row">
							<div class="tbl-cell">
								<h3>Consult ticket</h3>
								<ol class="breadcrumb breadcrumb-simple">
									<li><a href="#">Home</a></li>
									<li class="active">Consult Ticket</li>
								</ol>
							</div>
						</div>
					</div>
			</header>

			<div class="box-typical box-typical-padding">
			
			<table id="ticket_data" class="display table table-striped table-bordered" cellspacing="0" width="100%">
						<thead>
						<tr>
							<th>#</th>
							<th>Category</th>
							<th>Title</th>
							<th>Created at</th>
							<th></th>
						</tr>
						</thead>
						<tbody>
						<tr>
							<td>Tiger Nixon</td>
							<td>System Architect</td>
							<td>Edinburgh</td>
							<td>61</td>
						</tr>
						</tbody>
					</table>
			</div>
			
		</div><!--.container-fluid-->
	</div><!--.page-content-->
<!-- 	Contenido -->
    <?php require_once("../MainJs/js.php")?>

	<script type="text/javascript" src="./consultTicket.js"></script>
</body>
</html>
<?php
}
else{
	$connect = new Connect();

	// Redirigir al usuario a index.php
	header("Location: " . $connect->route() . "index.php");
}
?>
