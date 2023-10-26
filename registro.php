<html>
<head>
	<title>Registrar</title>
</head>

<body>
<a href="index.php">Volver</a> <br />
<?php
include("conexion.php");

if(isset($_POST['mandar'])) {
	$nombre = $_POST['nombre'];
	$correo_electronico = $_POST['correoelectronico'];
	$usuario = $_POST['usuario'];
	$contrasena = $_POST['contrasena'];

	if($usuario == "" || $contrasena == "" || $nombre == "" || $correo_electronico == "") {
		echo "Todos los campos deben ser rellenados. Uno o varios campos están vacíos.";
		echo "<br/>";
		echo "<a href='registro.php'>Volver</a>";
	} else {
		mysqli_query($conexion, "INSERT INTO login(nombre, correo_electronico, usuario, contrasena) VALUES('$nombre', '$correo_electronico', '$usuario', md5('$contrasena'))")
			or die("No se pudo insertar");
			
		echo "Registro Exitoso";
		echo "<br/>";
		echo "<a href='iniciarsesion.php'>Iniciar Sesion</a>";
	}
} else {
?>
	<p><font size="+2">Registrar</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Nombre completo</td>
				<td><input type="text" name="nombre"></td>
			</tr>
			<tr> 
				<td>Correo electronico</td>
				<td><input type="text" name="correoelectronico"></td>
			</tr>			
			<tr> 
				<td>Usuario</td>
				<td><input type="text" name="usuario"></td>
			</tr>
			<tr> 
				<td>Contraseña</td>
				<td><input type="password" name="contrasena"></td>
			</tr>
			<tr> 
				<td>&nbsp;</td>
				<td><input type="submit" name="mandar" value="Mandar"></td>
			</tr>
		</table>
	</form>
<?php
}
?>
</body>
</html>
