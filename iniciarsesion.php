<?php session_start(); ?>
<html>
<head>
	<title>Iniciar Sesion</title>
</head>

<body>
<a href="index.php">Inicio</a> <br />
<?php
include("conexion.php");

if(isset($_POST['mandar'])) {
	$usuario = mysqli_real_escape_string($conexion, $_POST['usuario']);
	$contrasena = mysqli_real_escape_string($conexion, $_POST['contrasena']);

	if($usuario == "" || $contrasena == "") {
		echo "El campo de nombre de usuario o contraseña está vacío.";
		echo "<br/>";
		echo "<a href='iniciarsesion.php'>Volver</a>";
	} else {
		$resultado = mysqli_query($conexion, "SELECT * FROM login WHERE usuario='$usuario' AND contrasena=md5('$contrasena')")
					or die("No se pudo ejecutar la consulta de selección.");
		
		$anclaje = mysqli_fetch_assoc($resultado);
		
		if(is_array($anclaje) && !empty($anclaje)) {
			$usuariovalido = $anclaje['usuario'];
			$_SESSION['valid'] = $usuariovalido;
			$_SESSION['nombre'] = $anclaje['nombre'];
			$_SESSION['id'] = $anclaje['id'];
		} else {
			echo "Usuario o contraseña invalida";
			echo "<br/>";
			echo "<a href='iniciarsesion.php'>Volver</a>";
		}

		if(isset($_SESSION['valid'])) {
			header('Location: index.php');			
		}
	}
} else {
?>
	<p><font size="+2">Iniciar Sesion</font></p>
	<form name="form1" method="post" action="">
		<table width="75%" border="0">
			<tr> 
				<td width="10%">Usuario</td>
				<td><input type="text" name="usuario"></td>
			</tr>
			<tr> 
				<td>contraseña</td>
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
