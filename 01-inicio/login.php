<?php

//Inicio del procesamiento
require_once __DIR__.'/include/logica/config.php';
require_once __DIR__.'/include/logica/Usuario.php';
require_once __DIR__.'/include/logica/FormularioLogin.php';
?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="include/css/estilo.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Login</title>
</head>

<body>

<div id="contenedor">

<?php
	require("include/comun/cabecera.php");
	require("include/comun/sidebarIzq.php");
?>

	<div id="contenido">

		<!--
		<h1>Acceso al sistema</h1>

		<form action="include/logica/procesarLogin.php" method="POST">
		<fieldset>
            <legend>Usuario y contraseña</legend>
            <div class="grupo-control">
                <label>Nombre de usuario:</label> <input type="text" name="nombreUsuario" />
            </div>
            <div class="grupo-control">
                <label>Password:</label> <input type="password" name="password" />
            </div>
            <div class="grupo-control"><button type="submit" name="login">Entrar</button></div>
		</fieldset>
		</form>

		-->
		<h1>Acceso al sistema</h1>

			<?php

			$opciones = array();
			$formulario = new FormularioLogin("formLogin", $opciones);
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