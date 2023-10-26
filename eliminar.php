<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: iniciarsesion.php');
}
?>

<?php

include("conexion.php");


$id_pedido = $_GET['id_pedido'];


$resultado=mysqli_query($conexion, "DELETE FROM pedidos WHERE id_pedido=$id_pedido");

header("Location:ver.php");
?>

