<?php

require 'funcionesBBDD2.php';

//Cuando el usuario le de a enviar al hacer la llamada a si mismo viene aquí

if (!empty($_POST['cod_dpto'])  
){
	//Recojo variables formulario
	$cod_dpto=$_POST['cod_dpto'];
	//Limpio variables
	limpiar($cod_dpto);

	//Abro la abrirConexion
	$conn=abrirConexion();
	//Lógica de negocio 
	$ArrayEmpleados=mostrarHistoricoEmple($cod_dpto, $conn);
	//Recorro el resultado 
	echo "<h2>Historico de empleados ".$cod_dpto." son: </h2>";
	foreach($ArrayEmpleados as $clave => $empleado){
		echo $empleado['nombre'].' '.$empleado['apellidos']."<br/>"	;		
	}
  
} else {
	echo "Error en datos";
}

?>