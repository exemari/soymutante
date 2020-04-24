# soymutante
Soy Mutante - Proyecto para ML

Fecha 24.04.2020

Autor Exequiel Mari Ing. en Sistemas 2615161919 exe_mari@hotmail.com

Detalle Implementación en PHP del sistema para validar si un ADN es de Mutante o No. 

ML ha pedido crear un sistema al cual se le envíe una Matriz de NxN que solo puede contener letras A,T,C,G. Un ADN es Mutante, si se encuentra mas de una secuencia de cuatro letras iguales de forma horizontal, vertical y oblicua.

Por ejemplo, si el usuario ingresa "CTAA,CTTT,TTTT,GACT" el sistema devolvera que NO es Mutante.
De la misma forma, si el usuario ingresa "CC,CAT", el sistema devolverá que la matriz no es correcta ya que debe ser NxN o si ingresa alguna letra diferente de las válidad, tambien dirá que hay un error.
Pero si el usuario ingresa "CCGTACCC,CCCAACCC,CCCCTCCC,CCTCCCCC,GTACCCCC,CCGTACCC,CCCAACCC,CCCCTCCC", el sistema dirá que si es Mutante.


Se implementó:
Interfaz HTML
Metodo para validar si es mutante.
Método para obtener estadisticas.
Pruebas unitarias
Diagrama de Secuencia
Sitio online de prueba https://diseniares.com.ar/soymutante/

PRUEBAS UNITARIAS
Para las pruebas unitarias, se utlizó PHPUNit. En la carpeta /test se encuentra el código. Básicamente se probó la clase principal Mutante y se verifica que devuelva el resultado correcto dependiendo del string que se le envía. A saber:
    - Resultado 1: Letras invalidas
    - Resultado 2: Dimensiones de Matriz invalida
    - Resultado 3: Es mutante
    - Resultado 4: No es Mutante

API REST
Se implementaron 2 API Rest que pueden ser probadas con el navegador o con la herramienta SOAPUI para mayor detalle del resultado.
Las URL de las API son:
https://diseniares.com.ar/soymutante/esmutante.php?adn=CTAA,CTTT,TTTT,GACT (ejemplo de llamada para validar si un ADN es Mutante)
https://diseniares.com.ar/soymutante/stats.php (estadisticas que nos indican la proporcion de mutantes comparada con la de Humanos)

DIAGRAMA DE SECUENCIA
El diagrama de secuencia que muestra el flujo desde la petición del usuario, hasta el resultado que se le muesta, esta en la carpeta /docs y se puede descargar de la siguiente URL: https://diseniares.com.ar/soymutante/docs/Diagrama%20Secuencia%20Soy%20Mutante.pdf

Prerequisitos PHP 7.0, Mysql 5, Apache PhpUnit 8.2

Version V1.0
