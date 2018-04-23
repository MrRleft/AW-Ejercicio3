<div id="cabecera">
	<h1>Mi gran página web</h1>
	<div class="saludo">
	<?php
	if (isset($_SESSION["login"]) && ($_SESSION["login"]===true)) {
		echo "Bienvenido, " . $_SESSION['nombre'] . ".<a href='/AW-Ejercicio3/01-inicio/logout.php'>(salir)</a>";
		
	} else {
		echo "Usuario desconocido. <a href='AW-Ejercicio3/01-inicio/login.php'>Login</a> <a href='/AW-Ejercicio3/01-inicio/login.php/registro.php'>Registro</a>";
	}
	?>
	</div>
</div>

