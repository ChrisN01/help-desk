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
        Consult Ticket
		</div><!--.container-fluid-->
	</div><!--.page-content-->
<!-- 	Contenido -->
    <?php require_once("../MainJs/js.php")?>

	<script type="text/javascript" src="consultTicket.js"></script>
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
