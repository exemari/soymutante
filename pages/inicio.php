<!--Pagina unica que muestra todo el contenido del sitio-->
<html>
<head>
<link rel="stylesheet" href="css/estilos.css">
 
<script src="https://code.jquery.com/jquery-1.11.1.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>

	<title>Soy Mutante</title>
	
</head>
<body>

	<h1>Secuencia mutante</h1>
	
		<table  id="tablero" class="table table-bordered table-sm" style="width:50%">
		<?php 
		//var_dump($mutante);
		for ($i=0;$i<$mutante->get_filas();$i++){
	 		echo "<tr>";
			for ($j=0;$j<$mutante->get_columnas();$j++){
				echo "<td>";
				echo $mutante->buscar_pieza($j,$i);
				echo "</td>";
			}
			echo "</tr>";
		}?>
	</table>
	<?php echo "Secuencia ingresada: ".$mutante->dna."<br> ADN Mutante: ".$mutante->cant."";?>

		<form method = "post" id="FSecuencia">
			<table lass="table table-bordered table-dark">
				
				<tr>
					<td><input type="text" name="secuencia" id="secuencia" required="true" len></td>
					<td><button type="submit" value="iniciar" name="iniciar" class="btn btn-primary" >Ingresar nueva secuencia</button></td>
				</tr>
			</table>
		</form>
		<?php if($mensaje->get_mensaje()) {?>
		<div class="alert alert-dark" role="alert" style="width:50%"><?php echo $mensaje->get_mensaje()?></div>
		<?php } ?>
	<div id="referencias">Para ver como funciona, presione  <a  href="#collapseRef" data-toggle="modal" data-target="#collapseRef" class="badge badge-info" >
					AQUI
		  	</a>
			<br>
			<br>
			API REST:<br>
			<a  href="esmutante.php?adn=CTAA,CTTT,TTTT,GACT" target ="_blank" class="badge badge-info" >
					Carga ADN
		  	</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
			<a  href="stats.php" target ="_blank" class="badge badge-info" >
					Consulta estadisticas
		  	</a>
			<br><br>
			Descargar Diagrama: <a  href="docs/Diagrama Secuencia Soy Mutante.pdf" target ="_blank" class="badge badge-info" >
					Soy Mutante
		  	</a>
			
	</div>


<!-- Popup aclaraciones -->
	<div class="modal fade" id="collapseRef" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
			<div class="modal-header">
				<h5 class="modal-title" id="exampleModalLabel">Aclaraciones</h5>
				<button type="button" class="close" data-dismiss="modal" aria-label="Close">
				<span aria-hidden="true">&times;</span>
				</button>
			</div>
			<div class="modal-body">
					<i>* Debes ingresar secuencia de caracteres de NxN.</i><br>
					<i>* Las únicas letras válidas son A,T,C,G.</i><br>
					<i>* Es mutante si encuentras mas de una secuencia de 4 letras en forma horizontal, verticual u oblicua.</i><br>
					<i>* Ejemplo de secuencia a ingresar mutante: ATGCGA,CAGTGC,TTATGT,AGAAGG,CCCCTA,TCACTG</i><br>

			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
				
			</div>
			</div>
		</div>
	</div>
</body>
</html>