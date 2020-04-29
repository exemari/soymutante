<?php
use PHPUnit\Framework\TestCase;
require  "../../config/constant.php";
require  "../../model/mutante.php";

class TestMutante extends TestCase
{
    public function testCreacion()
    {
        
        
       $mutante = new mutante();
	   
	   //NO Es Mutante -> Letras invalidas
        $this->assertSame(1, $tablero->isMutant("AD,CA"));
		
		//NO Es Mutante -> Matriz invalida
        $this->assertSame(2, $tablero->isMutant("ACC,CA"));

        //Es Mutante
        $this->assertSame(3, $tablero->isMutant("CCGTA,CCCAA,CCCCT,CCTCC,GTACC"));
		
		//NO Es Mutante -> No tiene ADN
        $this->assertSame(4, $tablero->isMutant("CTAA,CTTT,TTTT,GACT"));
		
		
      
    }

   
}
?>