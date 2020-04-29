<?php
include "config/config.php";
//include "funciones/funciones_bd.php";
if ($_SERVER['REQUEST_METHOD'] == 'GET')
{
    
		try{
      
			  $mutante = obtener_campo_tabla("registro","count(*) as cantidad","resultado=3","","cantidad");
			  $nomutante = obtener_campo_tabla("registro","count(*) as cantidad","resultado<>3","","cantidad");
			  $ratio=$mutante*1/$nomutante;
			  
			  $result_json = array('count_mutant_dna' => "$mutante", 'count_human_dna' => "$nomutante", 'ratio' => "$ratio");

				// headers for not caching the results
				header('Cache-Control: no-cache, must-revalidate');
				header('Expires: Mon, 26 Jul 2025 05:00:00 GMT');

				// headers to tell that result is JSON
				header('Content-type: application/json');

				// send the result now
				echo json_encode($result_json);
		}catch(Exception $e){
			header("HTTP/1.1 403 Forbidden");

			exit();
			
		}
	
}

?>