<?php
/*SELECTs - mysql PDO*/

$servername = "localhost";
$username = "root";
$password = "rootroot";
$dbname = "empleados1n";
$nombre_e=$_POST['nombre_e'];
$dni=$_POST['dni'];
$fnac=$_POST['fnac'];
$nombre_d=$_POST['nombre_d'];

require 'funcionesBBDD.php';
//Primero limpio las variables que recojo del formulario
$nombre_e=limpiar($nombre_e);
$dni=limpiar($dni);
$fnac=limpiar($fnac);
$nombre_d=limpiar($nombre_d);
//Abro la abrirConexion
$conn=abrirConexion($servername,$username,$password,$dbname);
//Después se la paso a la funcion dar de alta
//Compruebo que el departamento existe

darAltaEmpleado($nombre_e,$dni,$fnac,$nombre_d,$conn);
//Cierro la conexion
cerrarConexion($conn);

?>
