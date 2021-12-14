<?php

require 'funcionesBBDD2.php';

//Cuando el usuario le de a enviar al hacer la llamada a si mismo viene aquí

if(!empty($_POST["fecha"]))
{
	//Recojo variables formulario
	$fecha=$_POST['fecha'];
	//Limpio variables
	limpiar($fecha);
	//Abro la abrirConexion
	$conn=abrirConexion();
	//Lógica de negocio 
	$arrayEmpleados=relacionPorFecha($fecha, $conn);
	//Muestro la relación laboral por pantalla
	echo "<h2>MOSTRAR RELACION EMPLEADOS SEGUN FECHA: ".$fecha." </h2>";
	foreach($arrayEmpleados as $empleado){
		echo $empleado['nombre']." ".$empleado['apellidos']." --> ".$empleado['cod_dpto']."<br/>";
		
		
	}
  
} else {
	echo "Error en datos";
}

?>