<?php
include "config/config.php";

if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    if (isset($_GET['adn']))
    {
      //Mostrar un post
	  $mutante = Mutante::getInstance();
	  $res = $mutante->isMutant($_REQUEST["adn"]); 
	  $mutante->persistir();
	  
	  if ($res==3){      
		
		header("HTTP/1.1 200 OK");
		echo "Es Mutante";
	  }else{
		header("HTTP/1.1 403 Forbidden");
		echo "No es Mutante";
      }
      exit();
    }
    else {
		header("HTTP/1.1 403 Forbidden");

      exit();
	}
}

?>