<?php
require_once("../../config/conexion.php");

if(isset($_SESSION["id"]))
{

?>

<!DOCTYPE html>
<html>
<?php require_once("../MainHead/head.php");?>
	<title>Help Desk | Ticket Detail</title>
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
								<h3 id="ticket_id_text"></h3>
								<div id="ticket_status"></div>
								<div class="label label-primary" id="ticket_username"></div>
								<div class="label label-default" id="ticket_created_at"></div>

								<ol class="breadcrumb breadcrumb-simple">
									<li><a href="#">Home</a></li>
									<li class="active">Ticket Detail</li>
								</ol>
							</div>
						</div>
					</div>
			</header>
			<div class="box-typical box-typical-padding">
				<div class="row">

						<div class="col-lg-6">
							<fieldset class="form-group">
							<label class="form-label semibold" for="category">Category</label>
							<input type="text" class="form-control" id="category" name="category" readonly>
							</fieldset>
						</div>

						<div class="col-lg-6">
							<fieldset class="form-group">
							<label class="form-label semibold" for="title">Title</label>
							<input type="text" class="form-control" id="title" name="title" readonly>
							</fieldset>
						</div>

						<!--<div class="col-lg-12">
							<fieldset class="form-group">
							<label class="form-label semibold" for="tick_titulo">Documentos Adicionales</label>
							<table id="documentos_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
								<thead>
								<tr>
									<th style="width: 90%;">Nombre</th>
									<th class="text-center" style="width: 10%;"></th>
								</tr>
								</thead>
								<tbody>

								</tbody>
							</table>
							</fieldset>
						</div>-->


						<div class="col-lg-12">
							<fieldset class="form-group">
							<label class="form-label semibold" for="ticket_description">Description</label>
							<div class="summernote-theme-1">
								<textarea id="ticket_description" name="ticket_description" class="summernote"></textarea>
							</div>

							</fieldset>
						</div>

					</div>
				</div>
			<section class="activity-line" id="section-ticket-detail">


			</section><!--.activity-line-->
			<div class="box-typical box-typical-padding">
				<p>Enter your doubt or query</p>
				<div class="row">

						<div class="col-lg-12">
							<fieldset class="form-group">
								<label class="form-label semibold" for="ticket_details_description">Description</label>
								<section class="box-typical box-typical-padding">
									<div class="summernote-theme-2"> <!-- Theme black theme-3 -->
										<textarea id="ticket_details_description" class="summernote" name="ticket_details_description"></textarea>
									</div>
								</section>
							</fieldset>
						</div>
						<div class="col-lg-12">
							<button type="button" id="btn-saveTicketDetails" class="btn btn-rounded btn-inline btn-primary">Send</button>
							<button type="button" id="btn-closeTicket" class="btn btn-rounded btn-inline btn-danger">Close ticket</button>
						</div>

				</div><!--.row-->

			</div>

		</div><!--.container-fluid-->
	</div><!--.page-content-->
<!-- 	Contenido -->
    <?php require_once("../MainJs/js.php")?>

	<script type="text/javascript" src="./ticketDetail.js"></script>
    <script>
		$(function() {
			$(".fancybox").fancybox({
				padding: 0,
				openEffect	: 'none',
				closeEffect	: 'none'
			});
		});
	</script>
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
