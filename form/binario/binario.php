<HTML>
<HEAD> 
<TITLE> FORMULARIO BASE </TITLE>
<meta charset="utf-8" />
</HEAD>
<body>
<?php 

include 'funcionBinario.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
$num1=$_POST['num1'];

 $numBinario=convertirBinario($num1);

}
?>

<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">

<h1>CONVERSOR BINARIO</h1>


Número Decimal: <input type='text' name='num1' value=<?php echo $num1?>><br><br>
Número Binario: <input type='text' name='num2' value="<?php echo isset($numBinario)? $numBinario :''?>" readonly><br><br>

<input type="submit" value="enviar">

<input type="reset" value="borrar">

</form>
</body>