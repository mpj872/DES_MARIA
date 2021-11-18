
<html>
<head>
<title> FORMULARIO BASE </title>
<meta charset="utf-8" />
</head>
<body>
<?php
	require 'funcionIP.php';
	echo "<h1>IPs</h1>";
	echo "El method que ha usado es: ".$_SERVER['REQUEST_METHOD']."<br>";
	$string1=  $_POST['num1'];

	//Llamo a la función validarIP y le paso el string con la dirección IP inicial
	//En caso de que sea valida


	 $ipValida=validarIP($string1);
	//Le paso la dirección a la función convertir IP

	if ($ipValida==true) {
		convertirIP($string1);
	}else{
		echo ("La dirección IP no es válida");
	}


?>
</body>
</html>
