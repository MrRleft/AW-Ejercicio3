<?php

//Inicio del procesamiento
require_once __DIR__.'/include/logica/config.php';
require_once __DIR__.'/include/logica/Usuario.php';
require_once __DIR__.'/include/logica/FormularioRegistro.php';
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="include/css/estilo.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Registro</title>
</head>

<body>

<div id="contenedor">

<?php
	require("include/comun/cabecera.php");
	require("include/comun/sidebarIzq.php");
?>

	<div id="contenido">
		<!--
		<h1>Registro de usuario</h1>

		<form action="include/logica/procesarRegistro.php" method="POST">
		<fieldset>
			<div class="grupo-control">
				<label>Nombre de usuario:</label> <input class="control" type="text" name="nombreUsuario" />
			</div>
			<div class="grupo-control">
				<label>Nombre completo:</label> <input class="control" type="text" name="nombre" />
			</div>
			<div class="grupo-control">
				<label>Password:</label> <input class="control" type="password" name="password" />
			</div>
			<div class="grupo-control"><label>Vuelve a introducir el Password:</label> <input class="control" type="password" name="password2" /><br /></div>
			<div class="grupo-control"><button type="submit" name="registro">Registrar</button></div>
		</fieldset>
		</form>
		-->
		<h1>Registro de usuario</h1>

			<?php
			$opciones = array();
			$formulario = new FormularioRegistro("formRegistro", $opciones);
			$formulario->gestiona();
			?>

	</div>

<?php
	require("include/comun/sidebarDer.php");
	require("include/comun/pie.php");
?>


</div>

</body>
</html>