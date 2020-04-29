<?php
//Clase que muestra los menssajes
class Mensajes{

    var $texto;
    function __construct($texto){
        $this->texto = $texto;
    }
    function get_mensaje(){
        return $this->texto;
    }
    function set_mensaje($texto){
        $this->texto = $texto;
    }
    /* Obtenemos los mensajes por ID*/
    function obtener_mensaje($id){

        switch($id){
            case 1:
                $this->texto = "Contiene letras inválidas. Solo puede contenter ACTG";
            break;
            case 2:
                $this->texto = "Secuencia inválida, no tiene las mismas dimensiones.";
            break;
            case 3:
                $this->texto = "Es Mutante";
            break;
            case 4:
                $this->texto = "No es Mutante";
            break;

            

        }
    }

}
?>