<?php

require 'funcionesBBDD2.php';

//Cuando el usuario le de a enviar al hacer la llamada a si mismo viene aquí
echo $_POST["dni"];
echo $_POST["cambio"];
if(!empty($_POST["dni"]) 
	&& !empty($_POST['cambio'])  
){
	//Recojo variables formulario
	$dni=$_POST['dni'];
	$cambio=$_POST['cambio'];
	//Limpio variables
	limpiar($dni);
	limpiar($cambio);

	//Abro la abrirConexion
	$conn=abrirConexion();
	//Lógica de negocio 
	cambioSalario($dni, $cambio, $conn);
  
} else {
	echo "Error en datos";
}

?>