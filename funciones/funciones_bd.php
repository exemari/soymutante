<?php
if ($_POST['llamar_funcion_busqueda_xml']==1){
	include_once("../configuracion/configuracion.php");
	echo buscar_tags($_POST['campo']);
	
}

function ejecutar_sql($sql)
{
	$mysqli = new mysqli(SERVIDOR_BD, USUARIO_BD, CLAVE_BD, NOMBRE_BD);
	//var_dump($mysqli);
	$mysqli->set_charset("utf8");
	
	
		$resultado = $mysqli->query($sql);
		//$resultado = mysql_query($sql,$con);
		
		if (!$resultado && DEBUG_SQL)
			echo "Error SQL: $sql";
		
		$mysqli->close();
		return $resultado;
		
		
	//}
	
	
}
function obtener_registro_tabla($tabla,$campos="*",$where="",$order=""){
	
	if ($where!="") $where=" WHERE ".$where;
	if ($order!="") $order=" ORDER BY ".$order;
	$sql="SELECT $campos FROM $tabla $where $order";
	//echo $sql;
	$res=ejecutar_sql($sql);
	
	if ($res->num_rows>0){
		return ($res->fetch_assoc());
	}
	else return null;
	
	
	
}
function obtener_tabla($tabla,$campos,$where,$order=""){
	
	if ($where!="") $where=" WHERE ".$where;
	if ($order!="") $order=" ORDER BY ".$order;
	$sql="SELECT $campos FROM $tabla $where $order";
	//echo $sql;
	return ejecutar_sql($sql);
	
}
function obtener_campo_tabla($tabla,$campo,$where="",$order="",$alias=""){
	
	if ($where!="") $where=" WHERE ".$where;
	if ($order!="") $order=" ORDER BY ".$order;
	$sql="SELECT $campo FROM $tabla $where $order";
	if ($alias=="")
		$alias=$campo;
	$res=ejecutar_sql($sql);
	/*if (!$res)
		echo $sql."<br>";
	*/
	//echo $sql;
	
	if ($res->num_rows >0){
		$reg=$res->fetch_assoc();
		return $reg[$alias];
	}
	else return null;
	
	
	
}

function buscar_tags($nombre){
	//echo $nombre;
	$xml=simplexml_load_file(path."/ares/archivos_xml/datos.xml");
	//echo $lang;
	//echo "&$nombre&";	
	//echo utf8_decode(buscarEnXML($xml,"dato","nombre","$nombre","valor_$lang"));
	return utf8_decode(buscarEnXML($xml,"dato","nombre","$nombre","valor"));	
}
?>