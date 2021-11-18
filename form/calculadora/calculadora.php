
<?php
/*
Esta forma de recuperar valores es independiente de que el método usuado sea
GET o POST
*/
echo "<h1>CALCULADORA</h1>";
echo "El method que ha usado es: ".$_SERVER['REQUEST_METHOD']."<br>";
$num1=  $_POST['num1'];
$num2=  $_POST['num2'];
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

?>
