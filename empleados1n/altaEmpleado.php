<?php
/*SELECTs - mysql PDO*/
require 'funcionesBBDD.php';
//Recojo variables formulario
$nombre_e=$_POST['nombre_e'];
$dni=$_POST['dni'];
$fnac=$_POST['fnac'];
$nombre_d=$_POST['nombre_d'];

//Limpio las variables
$nombre_e=limpiar($nombre_e);
$dni=limpiar($dni);
$fnac=limpiar($fnac);
$nombre_d=limpiar($nombre_d);

//Recojo variables conexion
$servername = "localhost";
$username = "root";
$password = "rootroot";
$dbname = "empleados1n";


//Abro la abrirConexion
$conn=abrirConexion($servername,$username,$password,$dbname);

//Lógica de negocio
darAltaEmpleado($nombre_e,$dni,$fnac,$nombre_d,$conn);

//Cierro la conexion
cerrarConexion($conn);

?>
