<?php session_start(); ?>

<?php
if(!isset($_SESSION['valid'])) {
	header('Location: iniciarsesion.php');
}
?>

<?php

include_once("conexion.php");


$resultado = mysqli_query($conexion, "SELECT * FROM pedidos WHERE id_cliente=".$_SESSION['id']." ORDER BY id_cliente DESC");

?>

<html>
<head>
	<title>Inicio</title>
</head>

<body>
	<a href="index.php">Inicio</a> | <a href="anadir.php">Añadir nueva informacion</a> | <a href="cerrarsesion.php">Cerrar sesion</a>
	<br/><br/>
	
	<table width='80%' border=0>
		<tr bgcolor='#CCCCCC'>
			<td>ID cliente</td>
			<td>Cantidad</td>
			<td>Precio</td>
			<td>Precio Total</td>
			<td>IVA</td>
			<td>ID pedido</td>
			<td>Fecha de encargo</td>
			<td>Fecha de entrega</td>
		</tr>
		<?php
		while($res = mysqli_fetch_array($resultado)) {		
			echo "<tr>";
			echo "<td>".$res['id_cliente']."</td>";
			echo "<td>".$res['cantidad']."</td>";
			echo "<td>".$res['precio']."</td>";	
			echo "<td>".$res['precio_total']."</td>";
			echo "<td>".$res['iva']."</td>";
			echo "<td>".$res['id_pedido']."</td>";	
			echo "<td>".$res['fecha_de_encargo']."</td>";
			echo "<td>".$res['fecha_de_entrega']."</td>";
			echo "<td><a href=\"editar.php?id_pedido=$res[id_pedido]\">Editar</a> | <a href=\"eliminar.php?id_pedido=$res[id_pedido]\" onClick=\"return confirm('Estas seguro de querer eliminar este pedido?')\">Eliminar</a></td>";		
		}
		?>
	</table>	
</body>
</html>
