<?php
require_once 'Aplicacion.php';
/**
* Configuración del soporte de UTF‐8, localización (idioma y país)
*/
session_start();
ini_set('default_charset', 'UTF‐8');
setLocale(LC_ALL, 'es_ES.UTF.8');
date_default_timezone_set('Europe/Madrid');
$GLOBALS["URL"] = "/AW-Ejercicio3/01-inicio/";

define('BD_HOST', 'localhost');
define('BD_NAME', 'ejercicio3');
define('BD_USER', 'ejercicio3');
define('BD_PASS', 'ejercicio3');

$app = Aplicacion::getSingleton();
$app->init(array('host'=>BD_HOST, 'bd'=>BD_NAME, 'user'=>BD_USER, 'pass'=>BD_PASS));

?>