<?php

include(Form.php);


class FormularioLogin extends Form{

	public function procesaFormulario(){

		if (! isset($_POST['login']) ) {
			header('Location: ./login.php');
			exit();
		}


		$erroresFormulario = array();

		$nombreUsuario = isset($_POST['nombreUsuario']) ? $_POST['nombreUsuario'] : null;

		if ( empty($nombreUsuario) ) {
			$erroresFormulario[] = "El nombre de usuario no puede estar vacío";
		}

		$password = isset($_POST['password']) ? $_POST['password'] : null;
		if ( empty($password) ) {
			$erroresFormulario[] = "El password no puede estar vacío.";
		}

		if(count($erroresFormulario) === 0) {
			$usuario = Usuario::buscaUsuario($nombreUsuario);
			if(!$usuario) {
				$erroresFormulario[] = "El usuario o el password no coinciden";
			}else {
			    if ( $usuario->compruebaPassword($password) ) {
		    		$_SESSION['login'] = true;
		    		$_SESSION['nombre'] = $nombreUsuario;
		    		if($fila['rol'] == 'admin'){
		    			$_SESSION['esAdmin'] = true;
		    		}else{
		    			$_SESSION['esAdmin'] = false;
		    		}
		    		//$_SESSION['esAdmin'] = strcmp($fila['rol'], 'admin') == 0 ? true : false;
		    		header('Location: /AW-Ejercicio3/01-inicio/index.php');
		    		exit();
			    } else {
			        $erroresFormulario[] = "El usuario o el password no coinciden";
			    }
			}
		}
	}

	public function generaFormulario(){

		?>

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
		
		<?php

	}

}
  ?>
