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
			
			<table id="ticket_data" class="display table table-striped table-bordered table-vcenter js-dataTable-full">
						<thead>
						<tr>
							<th style="width:2%;">#</th>
							<th>Category</th>
							<th class= "d-none d-sm-table-cell">Title</th>
							<th class= "d-none d-sm-table-cell" style="width:5%;">Status</th>
							<th class= "d-none d-sm-table-cell" style="width:10%;">Created at</th>
							<th class="text-center" style="width:2%;"></th>
						</tr>
						</thead>
						<tbody>
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
