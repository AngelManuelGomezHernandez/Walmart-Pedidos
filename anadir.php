<html>
<head>
	<title>Añadir datos</title>
</head>

<body>
	<?php
include("conexion.php");
session_start();
if(isset($_POST['mandar'])) {
	$id_cliente = $_SESSION['id'];
	$cantidad = $_POST['cantidad'];
	$precio = $_POST['precio'];
	$precio_total = $_POST['precio_to'];
	$iva = $_POST['iva'];
	$fecha_encargo = $_POST['fecha_encargo'];
	$fecha_entrega = $_POST['fecha_entrega'];


		mysqli_query($conexion, "INSERT INTO pedidos(id_cliente, cantidad, precio, precio_total, iva, fecha_de_encargo,fecha_de_entrega) VALUES('$id_cliente', '$cantidad', '$precio','$precio_total','$iva','$fecha_encargo','$fecha_entrega')")
			or die(mysqli_error($conexion));
			
			echo "<font color='green'>Datos Registrados<br>";
			echo "<br/><a href='ver.php'>Ver datos</a>";
	
} else { ?>
	<a href="index.php">Inicio</a> | <a href="ver.php">Ver productos</a> | <a href="cerrarsesion.php">Cerrar Sesion</a>
	<br/><br/>

	<form action="anadir.php" method="post" name="form1">
		<table width="25%" border="0">
			<tr> 
				<td>Cantidad</td>
				<td><input type="number" required name="cantidad"></td>
			</tr>
			<tr> 
				<td>Precio</td>
				<td><input type="number" required name="precio"></td>
			</tr>
			<tr> 
				<td>Precio Total</td>
				<td><input type="number" required name="precio_to"></td>
			</tr>
			<tr> 
				<td>iva</td>
				<td><input type="number" required name="iva"></td>
			</tr>
			<tr> 
				<td>Fecha de encargo</td>
				<td><input type="date" required name="fecha_encargo"></td>
			</tr>
			<tr> 
				<td>Fecha de entrega</td>
				<td><input type="date" required name="fecha_entrega"></td>
			</tr>
			<tr> 
				<td></td>
				<td><input type="submit" name="mandar" value="Mandar"></td>
			</tr>
		</table>
	</form>
	<?php	} ?>
</body>
</html>

