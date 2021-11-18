<HTML>
<HEAD> 
<TITLE> FORMULARIO BASE </TITLE>
<meta charset="utf-8" />
</HEAD>
<body>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<h1>CALCULADORA</h1>


Operando1:<input type='text' name='num1' value=''><br><br>
Operando2:<input type='text' name='num2' value=''><br><br>

Selecciona operación:<br><br>

<input type='radio' name='operacion' value='suma'>Suma</br>
<input type='radio' name='operacion' value='resta'>Resta</br>
<input type='radio' name='operacion' value='producto'>Producto</br>
<input type='radio' name='operacion' value='division'>Division</br><br>


<input type="submit" value="enviar">

<input type="reset" value="borrar">


</form>
</body>


<?php
//Antes de darle a enviar el metodo es get 
if($_SERVER["REQUEST_METHOD"]=="POST"){

echo "El method que ha usado es: ".$_SERVER['REQUEST_METHOD']."<br>";
$num1=$_POST['num1'];
$num2=$_POST['num2'];
$operacion=$_POST['operacion'];

switch ($operacion) {
  
  case "suma":
    echo "Resultado operacion: ".$num1."+".$num2." = ".($num1+$num2);
  break;
  case "resta":
    echo "Resultado operacion: ".$num1."-".$num2." = ".($num1-$num2);
  break;
  case "producto":
    echo "Resultado operacion: ".$num1."x".$num2." = ".($num1*$num2);
  break;
  case "division":
    echo "Resultado operacion: ".$num1.":".$num2." = ".($num1/$num2);
  break;
  }
  
}

?>