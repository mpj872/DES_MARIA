
<?php

function cambiarBase($string1,$baseFinal){

   //Divido lo que recojo del formulario en el número y la base partiendo por /
	$arrayNum1=explode('/',$string1);
	//Guardo el numero y la base en variables 
	$num1=$arrayNum1[0];
	$baseInicial=$arrayNum1[1];
	//convierto el número que me han introducido a la base correspondiente
	$numeroConvertido=base_convert($num1,$baseInicial,$baseFinal);
	//Lo muestro por pantalla
	echo "Número ".$num1." en base ".$baseInicial." = ".$numeroConvertido." en base ".$baseFinal;
}


?>
