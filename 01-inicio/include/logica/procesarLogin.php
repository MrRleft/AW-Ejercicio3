<?php

//Inicio del procesamiento
require_once 'config.php';
require_once 'Aplicacion.php';
require_once 'Usuario.php';



?>

<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" type="text/css" href="../css/estilo.css" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Login</title>
</head>

<body>

<div id="contenedor">

<?php
	require("../comun/cabecera.php");
	require("../comun/sidebarIzq.php");
?>

	<div id="contenido">

	<?php
		if (isset($_SESSION["login"])) {
			echo "<h1>Bienvenido ". $_SESSION['nombre'] . "</h1>";
			echo "<p>Usa el menú de la izquierda para navegar.</p>";
		} else {
			echo "<h1>ERROR</h1>";
            if (count($erroresFormulario) > 0) {
                echo '<ul class="errores">';
            }
            foreach($erroresFormulario as $error) {
                echo "<li>$error</li>";
            }
            if (count($erroresFormulario) > 0) {
                echo '</ul>';
            }
?>
		<form action="procesarLogin.php" method="POST">
		<fieldset>
            <legend>Usuario y contraseña</legend>
            <div class="grupo-control">
                <label>Nombre de usuario:</label> <input type="text" name="nombreUsuario" value="<?= $nombreUsuario ?>" />
            </div>
            <div class="grupo-control">
                <label>Password:</label> <input type="password" name="password" value="<?= $password ?>" />
            </div>
            <div class="grupo-control"><button type="submit" name="login">Entrar</button></div>
		</fieldset>
		</form>
<?php
		}
?>

	</div>

<?php
	require("../comun/sidebarDer.php");
	require("../comun/pie.php");
?>


</div>

</body>
</html>