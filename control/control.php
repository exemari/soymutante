<?php
// Controlador que se encarga de manejar todo el flujo de llamados
session_start();
require("config/config.php");


$mutante = Mutante::getInstance();
$mensaje=new Mensajes("");

if ($_REQUEST[secuencia]){ // Movemos una pieza
  $res = $mutante->isMutant($_REQUEST["secuencia"]); 
  $mutante->persistir();
  $mensaje->obtener_mensaje($res);
  
}


require_once("pages/inicio.php"); // Mostramos nuestra pagina unica



?>