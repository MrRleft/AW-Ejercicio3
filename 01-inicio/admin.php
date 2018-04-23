<?php

//Inicio del procesamiento
require_once __DIR__.'/include/logica/config.php';

?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="include/css/estilo.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Administrar</title>
</head>

<body>

<div id="contenedor">

<?php
	require("include/comun/cabecera.php");
	require("include/comun/sidebarIzq.php");
?>

	<div id="contenido">

	<?php
		if (!isset($_SESSION['esAdmin'])) {
			echo "<h1>Acceso denegado!</h1>";
			echo "<p>No tienes permisos suficientes para administrar la web.</p>";
		} else {
	?>
		<h1>Consola de administración</h1>
		<p>Aquí estarían todos los controles de administración</p>
	<?php
		}
	?>
	</div>

<?php

	require("include/comun/sidebarDer.php");
	require("include/comun/pie.php");

?>


</div>

</body>
</html>