<div id="cabecera">
	<h1>Mi gran página web</h1>
	<div class="saludo">
	<?php
	if (isset($_SESSION["login"]) && ($_SESSION["login"]===true)) {
		echo "Bienvenido, " . $_SESSION['nombre'] . ".<a href= '".$GLOBALS["URL"]."logout.php'>(salir)</a>";
		
	} else {
		echo "Usuario desconocido. <a href='".$GLOBALS["URL"]."login.php'>Login</a> <a href='".$GLOBALS["URL"]."registro.php'>Registro</a>";
	}
	?>
	</div>
</div>

