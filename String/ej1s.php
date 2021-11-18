<HTML>
<HEAD><TITLE> EJ1-Conversion IP Decimal a Binario </TITLE></HEAD>
<BODY>
<?php
#declaro las variables no estan tipadas con lo que php las reconoce como string

$ip="192.18.16.204";
$ip2="10.33.161.2"; 

/*Uso la funcion explode, que lo que hace es detectar los . que existen en mi string (porque yo se lo expecifico)
y dividir el string en trozos, guardo los trozos en una variable.*/

$arrayIP=explode('.',$ip);

#convierto los trozos en binario y los imprimo.

printf("El binario es %b.%b.%b.%b",$arrayIP[0],$arrayIP[1],$arrayIP[2],$arrayIP[3]);




$arrayIP2=explode('.',$ip2);
printf("El binario es %b.%b.%b.%b",$arrayIP2[0],$arrayIP2[1],$arrayIP2[2],$arrayIP2[3]);



?>
</BODY>
</HTML>