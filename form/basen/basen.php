
<HTML>
<HEAD> 
<TITLE> FORMULARIO BASE </TITLE>
<meta charset="utf-8" />
</HEAD>
<body>
<?php
	require 'funcionBasen.php';
	echo "<h1>CAMBIO DE BASE</h1>";
	echo "El method que ha usado es: ".$_SERVER['REQUEST_METHOD']."<br>";
	$string1=  $_POST['num1'];
	$baseFinal=  $_POST['num2'];
	
	//Llamo a la función cambio de base y le paso el string con el número inicial y la base por un lado
	//y por otro la base a la que deseo convertirlo 
	
	$numeroConvertido=cambiarBase($string1,$baseFinal);
	
	

	

?>
</body>