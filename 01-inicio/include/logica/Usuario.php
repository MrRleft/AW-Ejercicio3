<?php

    require_once 'Aplicacion.php';

    class Usuario{

        private $id;
        private $nombreUsuario;
        private $nombre;
        private $password;
        private $rol;

        private function __construct($nombreUsuario, $nombre, $password, $rol){
            $this->nombreUsuario= $nombreUsuario;
            $this->nombre = $nombre;
            $this->password = $password;
            $this->rol = $rol;
        }

        public static function buscaUsuario($nombreUsuario){
            $app = Aplicacion::getSingleton();
            $conn = $app->conexionBd();
            $query = sprintf("SELECT * FROM Usuarios U WHERE U.nombreUsuario = '%s'", $conn->real_escape_string($nombreUsuario));
            $rs = $conn->query($query);
            $result = false;
            if ($rs) {
                if ( $rs->num_rows == 1) {
                    $fila = $rs->fetch_assoc();
                    $user = new Usuario($fila['nombreUsuario'], $fila['nombre'], $fila['password'], $fila['rol']);
                    $user->id = $fila['id'];
                    $result = $user;
                }
                $rs->free();
            } else {
                echo "Error en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
                exit();
            }
            return $result;
        }

        public function compruebaPassword($password){
            return password_verify($password, $this->password);
        }

        public static function login($nombreUsuario, $password){
            $user = self::buscaUsuario($nombreUsuario);
            if ($user && $user->compruebaPassword($password)) {
                return $user;
            }
            return false;
        }
        
        public static function crea($nombreUsuario, $nombre, $password, $rol){
            $user = self::buscaUsuario($nombreUsuario);
            if ($user) {
                return false;
            }
            $hashPassword = password_hash($password, PASSWORD_DEFAULT);
            $user = new Usuario($nombreUsuario, $nombre, $hashPassword, $rol);
            return self::guarda($user);
        }
        
        public static function guarda($usuario){
            if ($usuario->id !== null) {
                return self::actualiza($usuario);
            }
            return self::inserta($usuario);
        }
        
        private static function inserta($usuario){
            $app = Aplicacion::getSingleton();
            $conn = $app->conexionBd();
            $query=sprintf("INSERT INTO Usuarios(nombreUsuario, nombre, password, rol) VALUES('%s', '%s', '%s', '%s')"
                , $conn->real_escape_string($usuario->nombreUsuario)
                , $conn->real_escape_string($usuario->nombre)
                , $conn->real_escape_string($usuario->password)
                , $conn->real_escape_string($usuario->rol));
            if ( $conn->query($query) ) {
                $usuario->id = $conn->insert_id;
            } else {
                echo "Error en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
                exit();
            }
            return $usuario;
        }
        
        private static function actualiza($usuario){
            $app = Aplicacion::getSingleton();
            $conn = $app->conexionBd();
            $query=sprintf("UPDATE Usuarios U SET nombreUsuario = '%s', nombre='%s', password='%s', rol='%s' WHERE U.id=%i"
                , $conn->real_escape_string($usuario->nombreUsuario)
                , $conn->real_escape_string($usuario->nombre)
                , $conn->real_escape_string($usuario->password)
                , $conn->real_escape_string($usuario->rol)
                , $usuario->id);
            if ( $conn->query($query) ) {
                if ( $conn->affected_rows != 1) {
                    echo "No se ha podido actualizar el usuario: " . $usuario->id;
                    exit();
                }
            } else {
                echo "Error al insertar en la BD: (" . $conn->errno . ") " . utf8_encode($conn->error);
                exit();
            }
            return $usuario;
        }
        
        public function getId(){
            return $this->id;
        }

        public function setId($id){
            $this->id = $id;
            return $this;
        }

        public function getNombreUsuario(){
            return $this->nombreUsuario;
        }

        public function setNombreUsuario($nombreUsuario){
            $this->nombreUsuario = $nombreUsuario;
            return $this;
        }

        public function getNombre(){
            return $this->nombre;
        }

        public function setNombre($nombre){
            $this->nombre = $nombre;
            return $this;
        }

        public function getPassword(){
            return $this->password;
        }

        public function setPassword($password){
            $this->password = $password;
            return $this;
        }

        public function getRol(){
            return $this->rol;
        }

        public function setRol($rol){
            $this->rol = $rol;
            return $this;
        }
    }
?>