<?php
require_once("../../config/conexion.php");

// Destruir la sesión
session_destroy();

// Crear una instancia de la clase Connect
$connect = new Connect();

// Redirigir al usuario a index.php
header("Location: " . $connect->route() . "index.php");
exit();
?>

