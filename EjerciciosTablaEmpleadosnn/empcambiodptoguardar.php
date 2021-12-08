<?php

require 'funcionesBBDD2.php';

//Cuando el usuario le de a enviar al hacer la llamada a si mismo viene aquí
echo $_POST["dni"];
echo $_POST["cod_dpto"];
if(!empty($_POST["dni"]) 
	&& !empty($_POST['cod_dpto'])  
){
	//Recojo variables formulario
	$dni=$_POST['dni'];
	$cod_dpto=$_POST['cod_dpto'];
	//Limpio variables
	limpiar($dni);
	limpiar($cod_dpto);

	//Abro la abrirConexion
	$conn=abrirConexion();
	
	cambioDepartamento($dni, $cod_dpto, $conn);
  
} else {
	echo "Error en datos";
}

?>