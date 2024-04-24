<?php
require_once("../../config/conexion.php");

if(isset($_SESSION["id"]))
{

?>

<!DOCTYPE html>
<html>
<?php require_once("../MainHead/head.php");?>
	<title>Help Desk | New Ticket</title>
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
								<h3>New ticket</h3>
								<ol class="breadcrumb breadcrumb-simple">
									<li><a href="#">Home</a></li>
									<li class="active">New Ticket</li>
								</ol>
							</div>
						</div>
					</div>
			</header>
			
			<div class="box-typical box-typical-padding">
				<p>
					New tickets are generated from this window	
				</p>
				
				<h5 class="with-border">Enter the information</h5>
				<div class="row">
					<form method="POST" id="ticket_form">

						<input type="hidden" name="user_id" id="user_id" value="<?php echo $_SESSION["id"]?>">

						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="exampleInput">Category</label>
								<select  name="category_id" class="form-control" id="category_id">
									
								</select>
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="title">Title</label>
								<input type="text" class="form-control" id="title" name="title" placeholder="Title" value="">
							</fieldset>
						</div>
						<div class="col-lg-12">
							<fieldset class="form-group">
								<label class="form-label semibold" for="description">Description</label>
								<section class="box-typical box-typical-padding">
									<div class="summernote-theme-2"> <!-- Theme black theme-3 -->
										<textarea id="description" class="summernote" name="description"></textarea>
									</div>
								</section>
							</fieldset>
						</div>
						<div class="col-lg-12">
							<button type="submit" name="action" value="add" class="btn btn-rounded btn-inline btn-primary">Save</button>
						</div>
					</form>

				</div><!--.row-->

			</div>
		</div><!--.container-fluid-->
	</div><!--.page-content-->
<!-- 	Contenido -->
    <?php require_once("../MainJs/js.php")?>
	<script type="text/javascript" src="newTicket.js"></script>
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
