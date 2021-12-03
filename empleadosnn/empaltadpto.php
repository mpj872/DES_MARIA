<?php
/*SELECTs - mysql PDO*/
require 'funcionesBBDD2.php';

//Recojo valores
$variable=$_POST['nombre'];

//Primero limpio la variable que recojo del formulario
$nombre_dpto=limpiar($variable);

//Valores conexion
$servername = "localhost";
$username = "root";
$password = "rootroot";
$dbname = "empleadosnn";

//Abro la abrirConexion
$conn=abrirConexion($servername,$username,$password,$dbname);

//Lógica de negocio
//consulto el último dpto añadido departamento
$ultimoDpto=consultarDepartamento($conn);
var_dump($ultimoDpto);
//Después se la paso a la funcion dar de alta con el nombre y el ultimo código
darAltaDepartamento ($nombre_dpto,$ultimoDpto,$conn);

//Cierro la conexion
cerrarConexion($conn);

?>
