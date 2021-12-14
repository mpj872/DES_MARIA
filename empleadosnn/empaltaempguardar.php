<?php

require 'funcionesBBDD2.php';

//Cuando el usuario le de a enviar al hacer la llamada a si mismo viene aquí

if(!empty($_POST["dni"]) 
	&& !empty($_POST['nombre'])  
	&& !empty($_POST['apellidos']) 
	&& !empty($_POST['fecha_nac'])
	&& !empty($_POST['salario'])
	&& !empty($_POST['cod_dpto'])
){
	//Recojo variables formulario
	$dni=$_POST['dni'];
	$nombre=$_POST['nombre'];
	$apellidos=$_POST['apellidos'];
	$fecha_nac=$_POST['fecha_nac'];
	$salario=$_POST['salario'];
	$cod_dpto=$_POST['cod_dpto'];
	//Limpio variables
	limpiar($dni);
	limpiar($nombre);
	limpiar($apellidos);
	limpiar($fecha_nac);
	limpiar($salario);
	limpiar($cod_dpto);

	//Abro la abrirConexion
	$conn=abrirConexion();
	
	altaEmpleado($dni, $nombre, $apellidos, $fecha_nac, $salario, $cod_dpto, $conn);
  
} else {
	echo "Error en datos";
}

?>