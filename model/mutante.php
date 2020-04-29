<?php
// Clase encargada de manejar toda la funcionalidad del tablero
class Mutante{
   
	var $filas;
    var $columnas;
	var $posicion;
	var $sec_h;
	var $sec_v;
	var $sec_o;
	var $dna;
    var $cant;
	var $res;
    
    private static $instance;

    public function __construct()
    {
		$this->cant = 0;
        
    }

    // Obtiene una instancia unica y la busca en la sesion
    public static function getInstance()
    {

       
        
        if (!self::$instance instanceof self) {
            
            if (!$_SESSION["mutante"]){
               
             self::$instance = new self();
            }else{
                self::$instance = unserialize($_SESSION["mutante"]);
            }
        }

        return self::$instance;
    }

    //Cantidad de Filas
    function get_filas(){
        return  $this->filas;

    }
    //Cantidad de columnas
	 function get_columnas(){
        return  $this->columnas;

    }
    //Seteamos los jugadores
   function isMutant($dna){
	   //Primero validamos si tiene algun caracter invalido
	    $this->dna = strtoupper($dna);
		$res = $this->solo_caracteres(C_VALIDOS);
		if (!$res){
			$this->res=1;
			return $this->res;
		}
			
		
		//Ahora validamos las dimensiones que tienen que ser iguales
		$res = $this->validar_dimensiones();
		if (!$res){
			$this->res=2;
			return $this->res;
		}
		
		//AHora validamos la secuencia
		$res = $this->validar_secuencia();
		if ($res){
			$this->res=3;
			return $this->res;
		}
		else{
			$this->res=4;
			return $this->res;
		}
   }
   
   function solo_caracteres($validos){
		$chars = str_split($this->dna);
		$gama = str_split($validos);
		foreach($chars as $char) {
			if(in_array($char, $gama)==false)return false;
		}
		return true;
	}
	
	function validar_dimensiones(){
		$cadenas = explode(C_DELIMITADOR,$this->dna);
		
		$pos_y=0;
		foreach ($cadenas as $cad){
			$chars = str_split($cad);	
			$pos_x=0;
			foreach($chars as $char){
				//var_dump($char);
				$this->posicion[$pos_x][$pos_y]=$char;
				$pos_x++;
			}
			if ($pos_x>=$this->columnas) 
				$this->columnas = $pos_x;
			$pos_y++;
			
		}
		// con todos los array armados, podemos validar
		//$this->columnas = $pos_y;
		$this->filas = $pos_y;
		foreach($cadenas as $cad){
			
			if (strlen($cad)!=$pos_y)
				return false;
		}
		 
		
		return true;
	}
	
	// Buscamos si no hay una pieza en esa posicions
    function buscar_pieza($x,$y){
        
       return ($this->posicion[$x][$y]);

    }
	function validar_secuencia(){
		
		//primero validamos horizontal
		for ($y=0;$y<$this->filas;$y++){
			//for ($x=0;$x<$this->columnas;$x++){
				$x=0;
				$letra_actual = $this->posicion[$x][$y];
				if ($letra_actual){// si hay letra, buscamos
					$res = $this->buscar_horizontal($letra_actual,$x,$y);
					if ($res){//hay secuencia
							
							$this->cant += $res;
					}
					
				}
				
			//}
			
		}
		
		//ahora validamos vertical
		
			for ($x=0;$x<$this->columnas;$x++){
					$y=0;
					$letra_actual = $this->posicion[$x][$y];
					if ($letra_actual){// si hay letra, buscamos
						$res = $this->buscar_vertical($letra_actual,$x,$y);
						if ($res){//hay secuencia
							
							$this->cant += $res;
						}
						
					}
					
			}
			

		
		
		//ahora validamos oblicuo horizontal  hacia abajo
			for ($x=0;$x<$this->columnas;$x++){
					$y=0;
					$letra_actual = $this->posicion[$x][$y];
					if ($letra_actual){// si hay letra, buscamos
						$res = $this->buscar_oblicuo_horizontal_abajo($letra_actual,$x,$y);
						if ($res){//hay secuencia
							
							$this->cant += $res;
							
						}
						
					
					
			}
			
		}
		
		
		
		//ahora validamos oblicuo vertical  hacia abajo
			for ($y=1;$y<$this->filas;$y++){
					$x=0;
					$letra_actual = $this->posicion[$x][$y];
					if ($letra_actual){// si hay letra, buscamos
						$res = $this->buscar_oblicuo_vertical_abajo($letra_actual,$x,$y);
						if ($res){//hay secuencia
							
							$this->cant += $res;
							
						}
						
					
					
			}
			
		}
		
		
		//ahora validamos oblicuo horizontal  hacia arriba
			for ($x=0;$x<$this->filas;$x++){
					$y=$this->filas-1;
					$letra_actual = $this->posicion[$x][$y];
					if ($letra_actual){// si hay letra, buscamos
						$res = $this->buscar_oblicuo_horizontal_arriba($letra_actual,$x,$y);
						if ($res){//hay secuencia
							
							$this->cant += $res;
							
						}
						
					
					
			}
			
		}
		
		
		//ahora validamos oblicuo vertical  hacia arriba
			for ($y=$this->filas-2;$y>=0;$y--){
					$x=0;
					$letra_actual = $this->posicion[$x][$y];
					if ($letra_actual){// si hay letra, buscamos
						$res = $this->buscar_oblicuo_vertical_arriba($letra_actual,$x,$y);
						if ($res){//hay secuencia
							
							$this->cant += $res;
							
						}
						
					
					
			}
			
		}
				
		
		if ($this->cant>1)
			return true;
		return false;
		
	}
	function buscar_horizontal($letra,$x1,$y1){
		$c = 0;
		
		for ($x=$x1;$x<$this->columnas;$x++){
			$l = $this->posicion[$x][$y1];
			
			if ($l!=$letra || $x==$this->filas-1 || ($l==$letra && $c>=3)){
				if ($c>3 || ($l==$letra && $c>=3)){
					$cant++;
					
				}
				$c = 0;
			}	
			$letra = $l;
			$c++;
			
		}
		
		if ($cant) // hay secuencia de 4
			return $cant++;
		else
			return false;
		
	}
	function buscar_vertical($letra,$x1,$y1){
		$c = 0;
		
		for ($y=0;$y<$this->filas;$y++){
			$l = $this->posicion[$x1][$y];
			
			if ($l!=$letra || $y==$this->filas-1 || ($l==$letra && $c>=3)){
				if ($c>3 || ($l==$letra && $c>=3)){
					$cant++;
					
				}
				
				$c = -1;
			}	
			$letra = $l;
			$c++;
			
		}
		
		if ($cant) // hay secuencia de 4
			return $cant++;
		else
			return false;
		
	}
	
	function buscar_oblicuo_vertical_arriba($letra,$x1,$y1){
		$c = 0;
		
		$x=$x1;
		for ($y=$y1;$y>=0;$y--){
			
			$l = $this->posicion[$x][$y];
			
			if (!$l){
				
				break;
			}
			if ($l!=$letra || $y==0 || ($l==$letra && $c>=3)){
				if ($c>3 || ($l==$letra && $c>=3)){
					$cant++;
					
				}
				$c = -1;
			}	
			$x++;
			$c++;
			
		}
		
		if ($cant) // hay secuencia de 4
			return $cant;
		else
			return false;
		
	}
	
	
	function buscar_oblicuo_horizontal_arriba($letra,$x1,$y1){
		$c = 0;
		
		$y=$y1;
		for ($x=$x1;$x<$this->columnas;$x++){
			
			$l = $this->posicion[$x][$y];
			
			if (!$l){
				
				break;
			}
			if ($l!=$letra || $y==0 || ($l==$letra && $c>=3)){
				if ($c>3 || ($l==$letra && $c>=3)){
					$cant++;
					
				}
				$c = -1;
			}	
			$y--;
			$c++;
			
		}
		
		if ($cant) // hay secuencia de 4
			return $cant;
		else
			return false;
		
	}
	
	
	
	function buscar_oblicuo_horizontal_abajo($letra,$x1,$y1){
		$c = 0;
		
		$y=$y1;
		for ($x=$x1;$x<$this->columnas;$x++){
			
			$l = $this->posicion[$x][$y];
			
			if (!$l){
				
				break;
			}
			if ($l!=$letra || $y==$this->columnas-1 || ($l==$letra && $c>=3)){
				if ($c>3 || ($l==$letra && $c>=3)){
					$cant++;
					
				}
				$c=-1;
			}	
			$y++;
			$c++;
			
		}
		
		if ($cant) // hay secuencia de 4
			return $cant;
		else
			return false;
		
	}
	
	function buscar_oblicuo_vertical_abajo($letra,$x1,$y1){
		$c = 0;
		
		$x=$x1;
		for ($y=$y1;$y<$this->columnas;$y++){
			
			$l = $this->posicion[$x][$y];
			
			if (!$l){
				
				
				break;
			}	
			if ($l!=$letra || $x==$this->columnas-1 || ($l==$letra && $c>=3)){
				if ($c>3 || ($l==$letra && $c>=3)){
					$cant++;
					
				}
				$c=-1;
			}			
			$x++;
			$c++;
			
		}
		
		if ($cant) // hay secuencia de 4
			return $cant;
		else
			return false;
		
	}
	function persistir(){
		$sql="INSERT into registro VALUES(null,'".$this->dna."','".$this->res."',now())";
	    ejecutar_sql($sql);
		
	}


}
?>