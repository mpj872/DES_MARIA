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
	//$ArrayEmpleados=mostrarEmplePorDpto($cod_dpto, $conn);
$ArrayEmpleados=mostrarSalarioEmplePorDpto($cod_dpto, $conn);
$SueldoTotal=mostrarTotalSalariosPorDpto($cod_dpto, $conn);

	//Recorro el resultado
	echo "<h2>Los empleados que trabajan en el departamento ".$cod_dpto." son: </h2>";
	foreach($ArrayEmpleados as $clave => $empleado){
		echo $empleado['nombre_dpto'].' '.$empleado['nombre'].' '.$empleado['salario']."<br/>"	;
	}
  echo "<h2>El sueldo total de los Empleados que trabajan en el departamento ".$cod_dpto." son: </h2>";
  foreach($SueldoTotal as $clave => $sueldo){
    echo $sueldo['nombre_dpto'].' '.$sueldo['sum(salario)']."<br/>"	;
  }
} else {
	echo "Error en datos";
}

?>
