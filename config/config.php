<?php
ini_set("display_errors",1);
error_reporting(E_ALL & ~E_NOTICE && ~E_WARNING);
require("config/constant.php");
require("model/mutante.php");
require("model/mensajes.php");

/*
define("SERVIDOR_BD", "localhost");//admin_ospm
define("USUARIO_BD", "usr_mutante");//pass_ospm
define("CLAVE_BD", "ze$324tS");
define("NOMBRE_BD", "admin_mutante");
*/

define("SERVIDOR_BD", "localhost");//admin_ospm
define("USUARIO_BD", "root");//pass_ospm
define("CLAVE_BD", "");
define("NOMBRE_BD", "mutantes");

include "funciones/funciones_bd.php";

?>