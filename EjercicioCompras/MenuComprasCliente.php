<HTML>
<HEAD>
<?php

if(isset($_COOKIE['login'])){
	$nombreUsuario=$_COOKIE['login'];

?>

<TITLE> FORMULARIO COMPRAS </TITLE>
<meta charset="utf-8" />
</HEAD>
<BODY>

<form name='mi_formulario' action='' method='post'>

<h1>Bienvenido <?php echo $nombreUsuario;?> a tu menu de compras</h1>


Ejercicio 12. <a href="./comprocli.php">Comprar Producto</a><br/>
Ejercicio 13. <a href="./comconscli.php">Consultar compras</a><br/>

<input type="submit" value="borrar cookie">

</FORM>
</BODY>
</HTML>


<?php
}else{
	echo "No logado";


}

?>
