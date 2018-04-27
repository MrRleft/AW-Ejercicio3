<?php 
require_once __DIR__.'/Form.php';


class FormularioRegistro extends Form{

	public function generaCamposFormulario($datosIniciales)
    {
    return '<fieldset>
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
		</fieldset>';
        
    }

	public function procesaFormulario($datos){

		if (! isset($_POST['registro']) ) {
			header('Location: ./registro.php');
			exit();
		}


		$erroresFormulario = array();

		$nombreUsuario = isset($_POST['nombreUsuario']) ? $_POST['nombreUsuario'] : null;

		if ( empty($nombreUsuario) || mb_strlen($nombreUsuario) < 5 ) {
			$erroresFormulario[] = "El nombre de usuario tiene que tener una longitud de al menos 5 caracteres.";
		}

		$nombre = isset($_POST['nombre']) ? $_POST['nombre'] : null;
		if ( empty($nombre) || mb_strlen($nombre) < 5 ) {
			$erroresFormulario[] = "El nombre tiene que tener una longitud de al menos 5 caracteres.";
		}

		$password = isset($_POST['password']) ? $_POST['password'] : null;
		if ( empty($password) || mb_strlen($password) < 5 ) {
			$erroresFormulario[] = "El password tiene que tener una longitud de al menos 5 caracteres.";
		}
		$password2 = isset($_POST['password2']) ? $_POST['password2'] : null;
		if ( empty($password2) || strcmp($password, $password2) !== 0 ) {
			$erroresFormulario[] = "Los passwords deben coincidir";
		}

		if (count($erroresFormulario) === 0) {
			$usuario = Usuario::crea($nombreUsuario, $nombre, $password, 'user');
			if (! $usuario ) {
		    	$erroresFormulario[] = "El usuario ya existe";
			} else {
				$_SESSION['login'] = true;
				$_SESSION['nombre'] = $nombreUsuario;
				header('Location: /AW-Ejercicio3/01-inicio/index.php');
				exit();
			}
		}

	}

}

 ?>