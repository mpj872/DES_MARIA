<HTML>
<HEAD>
<TITLE> FORMULARIO ALTA DEPARTAMENTO </TITLE>
<meta charset="utf-8" />
</HEAD>
<BODY>

<form name='mi_formulario' action='<?php echo $_SERVER['PHP_SELF']; ?>' method='post'>

<h1>ALTA CATEGORIA</h1>


CATEGORIA:<input type='text' name='nombre' value=''><br><br>

<input type="submit" value="enviar">

<input type="reset" value="borrar">

</FORM>
</BODY>
</HTML>

<?php
/*SELECTs - mysql PDO*/
require 'funcionesBBDD2.php';

//Recojo valores
if($_SERVER["REQUEST_METHOD"]=="POST"){
	if (!empty($_POST['nombre'])){
		$variable=$_POST['nombre'];

		//Primero limpio la variable que recojo del formulario
		$nombre_categoria=limpiar($variable);

		//Abro la abrirConexion
		$conn=abrirConexion();

		//Lógica de negocio
		//consulto el último dpto añadido departamento
		$ultimaCategoria=consultarCategoria($conn);
		
		//Después se la paso a la funcion dar de alta con el nombre y el ultimo código
		darAltaCategoria ($nombre_categoria,$ultimaCategoria,$conn);

		//Cierro la conexion
		cerrarConexion($conn);
	}else{
		echo "Error en datos";
	}
}
?>