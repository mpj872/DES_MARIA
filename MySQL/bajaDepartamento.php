<?php
/*SELECTs - mysql PDO*/

$servername = "localhost";
$username = "root";
$password = "rootroot";
$dbname = "empleados1n";
$variable=$_POST['nombre'];

require 'funcionesBBDD.php';
//Primero limpio la variable que recojo del formulario
$departamento=limpiar($variable);
//Abro la abrirConexion
$conn=abrirConexion($servername,$username,$password,$dbname);
//Después se la paso a la funcion dar de alta
darDeBaja ($departamento,$conn);
//Cierro la conexion
cerrarConexion($conn);

?>
