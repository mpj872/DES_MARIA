<HTML>
<HEAD> 
<TITLE> FORMULARIO BASE </TITLE>
<meta charset="utf-8" />
</HEAD>
<body>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<h1>CONVERSOR NUMERICO</h1>


Número Decimal: <input type='text' name='num1' value=""></br></br>

Convertir a:</br>

<input type='radio' name='operacion' value='binario'>Binario</br>
<input type='radio' name='operacion' value='octal'>Octal</br>
<input type='radio' name='operacion' value='hexadecimal'>Hexadecimal</br>
<input type='radio' name='operacion' value='todos'>Todos sistemas</br><br>


<input type="submit" value="enviar">

<input type="reset" value="borrar">

</form>
<?php

	include 'funcionCambioBase.php';

	if($_SERVER["REQUEST_METHOD"]=="POST"){

		$num1=$_POST['num1'];
		$operacion=$_POST['operacion'];

		switch ($operacion) {

			  case "binario":
					 $numBinario=convertirBinario($num1);
			     echo "Binario: ".$numBinario;
			  break;
			  case "octal":
					$numOctal=convertirOctal($num1);
			 		echo "Octal: ".$numOctal;
			  break;
			  case "hexadecimal":
					$numHexa=convertirHexa($num1);
					echo "Hexadecimal: ".$numHexa;
			  break;
			  case "todos":
					$arrayNum=convertirTodo($num1);

					  foreach ($arrayNum as $valor) {
			    	 echo $valor."</br>";
			    }
			  break;
		  }
	}
?>

</body>