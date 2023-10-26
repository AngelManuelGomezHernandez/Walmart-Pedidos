<?php
session_start();

if(!isset($_SESSION['valid'])) {
	header('Location: iniciarsesion.php');
	exit();
}

include_once("conexion.php");

if(isset($_POST['actualizar']))
{	
	$id_pedido_escondido = $_POST['id_pedido_esc'];
	$cantidad = $_POST['cantidad'];
	$precio = $_POST['precio'];
	$precio_total = $_POST['precio_total'];
	$iva = $_POST['iva'];
	$fecha_encargo = $_POST['fecha_encargo'];
	$fecha_entrega = $_POST['fecha_entrega'];	
	
	// Verificar campos vacíos
	if(empty($cantidad) || empty($precio) || empty($precio_total) || empty($iva) || empty($fecha_encargo) || empty($fecha_entrega)) {
		echo "<font color='red'>Por favor, rellena todos los campos.</font><br/>";
	} else {	
		// Actualizar la tabla
		$resultado = mysqli_query($conexion, "UPDATE pedidos SET  cantidad='$cantidad', precio='$precio', precio_total='$precio_total', iva='$iva', fecha_de_encargo='$fecha_encargo', fecha_de_entrega='$fecha_entrega' WHERE id_pedido='$id_pedido_escondido'");
		
		echo "<font color='green'>Datos Actualizados<br>";
		echo "<br/><a href='ver.php'>Ver datos</a>";
	}
}else{


// Obtener id_pedido de la URL
$id_pedido = $_GET['id_pedido'];

// Seleccionar datos asociados con este id_pedido
$resultado = mysqli_query($conexion, "SELECT * FROM pedidos WHERE id_pedido=$id_pedido");

while($res = mysqli_fetch_array($resultado))
{
	$id_cliente = $res['id_cliente'];
	$id_pedido = $res['id_pedido'];
	$cantidad = $res['cantidad'];
	$precio = $res['precio'];
	$precio_total = $res['precio_total'];
	$iva = $res['iva'];
	$fecha_encargo = $res['fecha_de_encargo'];
	$fecha_entrega = $res['fecha_de_entrega'];
}
	

?>
<html>
<head>	
	<title>Editar Información</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="ver.php">Ver pedidos</a> | <a href="cerrarsesion.php">Cerrar sesión</a>
	<br/><br/>
	
	<form name="form1" method="post" action="editar.php">
		<table border="0">
			<tr> 
				<td>Cantidad</td>
				<td><input type="number" name="cantidad" value="<?php echo $cantidad;?>"></td>
			</tr>
			<tr> 
				<td>Precio</td>
				<td><input type="number" name="precio" value="<?php echo $precio;?>"></td>
			</tr>
			<tr> 
				<td>Precio Total</td>
				<td><input type="number" name="precio_total" value="<?php echo $precio_total;?>"></td>
			</tr>
			<tr> 
				<td>IVA</td>
				<td><input type="number" name="iva" value="<?php echo $iva;?>"></td>
			</tr>
			<tr> 
				<td>Fecha de encargo</td>
				<td><input type="date" name="fecha_encargo" value="<?php echo $fecha_encargo;?>"></td>
			</tr>
			<tr> 
				<td>Fecha de entrega</td>
				<td><input type="date" name="fecha_entrega" value="<?php echo $fecha_entrega;?>"></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id_pedido_esc" value="<?php echo $id_pedido;?>"></td>
				<td><input type="submit" name="actualizar" value="Actualizar"></td>
			</tr>
		</table>
	</form>
	<?php } ?>
</body>
</html>
