<?php session_start(); ?>
<html>
<head>
	<title>Pagina de inicio</title>
	<link href="style.css" rel="stylesheet" type="text/css">
</head>

<body>
	<div id="header">
		Bienvenido a mi pagina web Walmart
	</div>
	<?php
	if(isset($_SESSION['valid'])) {			
		include("conexion.php");					
		$resultado = mysqli_query($conexion, "SELECT * FROM login");
	?>
				
		Bienvenido <?php echo $_SESSION['nombre'] ?> ! <a href='cerrarsesion.php'>Cerrar Sesion</a><br/>
		<br/>
		<a href='ver.php'>Ver y añadir pedidos</a>
		<br/><br/>
	<?php	
	} else {
		echo "Debe iniciar sesión para ver esta página.<br/><br/>";
		echo "<a href='iniciarsesion.php'>Iniciar Sesion</a> | <a href='registro.php'>Registrarte</a>";
	}
	?>
	<div id="footer">
		Creado por <a href="https://angelmanuelgomezhernandez.github.io/gomezweb/" title="Walmart">Angel Manuel Gomez Hernandez</a>
	</div>
</body>
</html>
