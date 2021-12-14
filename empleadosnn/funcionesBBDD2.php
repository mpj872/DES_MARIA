<?php
/*SELECTs - mysql PDO*/

function limpiar($variable) {

    $variable = trim($variable);
    $variable = stripslashes($variable);
    $variable = htmlspecialchars($variable);
    return $variable;
}

function abrirConexion()
{
	$servername = "localhost";
	$username = "root";
	$password = "rootroot";
	$dbname = "empleadosnn";

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    }catch(PDOException $e) {
          echo "error en conexion " . $e->getMessage();
    }

    return $conn ;
}


function cerrarConexion($conn){

    $conn = null;

}
function consultarDepartamento($conn){

  //declaro query de la Consulta
  //$sql="select cod_dpto from departamento order by cod_dpto desc limit 1";
  $sql="SELECT MAX(cod_dpto) from departamento";

  try{
    //compila y prepara estructuras de datos
    $gsent=$conn->prepare($sql);
    //La ejecuto
    $gsent->execute();
    // set the resulting array to associative
  /*  $resultado = $stmt->setFetchMode(PDO::FETCH_ASSOC);*/
    //Con Fetchall recojo los resultados
    $resultado = $gsent->fetchAll(PDO::FETCH_ASSOC);


    //Usar el codigo (buscar)
 }catch(PDOException $e){
    echo "No se ha ejecutado el select<br>",$e->getMessage();
 }
return $resultado;

}

function darAltaDepartamento ($nombre_dpto,$ultimoDpto,$conn){

      foreach ($ultimoDpto as $key => $departamento) {
        foreach ($departamento as $value) {
          $ultimoDpto=$value;
        }
      }
      var_dump($ultimoDpto);
      $dimension=strlen($ultimoDpto);
      $ultimoDpto=substr($ultimoDpto,1,$dimension);

      $cod_dpto=$ultimoDpto+1;


      $cod_dpto=str_pad($cod_dpto, 3, "0", STR_PAD_LEFT);

      echo $cod_dpto="D".$cod_dpto;

      $sql = "INSERT INTO departamento (cod_dpto,nombre_dpto) VALUES ('$cod_dpto','$nombre_dpto')";
      // use exec() because no results are returned
      try{

      $conn->exec($sql);

    }catch(PDOException $e){
        echo "No se ha dado de alta el dept esta duplicado",$e->getMessage();
    }

}

function desplegableDepartamentos ($conn){
      //Declaro la query
      $sql = "select cod_dpto, nombre_dpto from departamento";
      // use exec() because no results are returned
      try{
        //compila y prepara estructuras de datos
        $gsent=$conn->prepare($sql);
        //La ejecuto
        $gsent->execute();
        // set the resulting array to associative
      /*  $resultado = $stmt->setFetchMode(PDO::FETCH_ASSOC);*/
        //Con Fetchall recojo los resultados
        $resultado = $gsent->fetchAll(PDO::FETCH_ASSOC);


        //Usar el codigo
    }catch(PDOException $e){
        echo "No se ha ejecutado el select<br>",$e->getMessage();
    }
  cerrarConexion($conn);
  //Devuelvo los resultados
  return $resultado;
}

function altaEmpleado($dni, $nombre, $apellidos, $fecha_nac, $salario, $cod_dpto, $conn)
{
	$sql = "INSERT INTO empleado (dni,nombre,apellidos,fecha_nac,salario)
			VALUES ('$dni','$nombre','$apellidos','$fecha_nac', '$salario')";
	$now=date("Y/m/d");
	$sql2="INSERT INTO emple_depart (dni,cod_dpto,fecha_ini)
			VALUES ('$dni','$cod_dpto','$now')";

	// use exec() because no results are returned
	$resultado=0;
	try{
		$resultado=$conn->exec($sql);
    }catch(PDOException $e){
        echo "No se ha dado de alta el empleado ",$e->getMessage();
    }
	echo $resultado;
	if($resultado==1){
		try{
			$conn->exec($sql2);
		}catch(PDOException $e){
			echo "No se ha dado de alta el empleado en el departamento solicitado ",$e->getMessage();
		}
	}
}

function desplegableDni ($conn){
      //Declaro la query
      $sql = "select empleado.dni
	  from empleado, emple_depart
	  where empleado.dni=emple_depart.dni and
	  fecha_fin IS NULL";
      // use exec() because no results are returned
      try{
        //compila y prepara estructuras de datos
        $gsent=$conn->prepare($sql);
        //La ejecuto
        $gsent->execute();
        // set the resulting array to associative
      /*  $resultado = $stmt->setFetchMode(PDO::FETCH_ASSOC);*/
        //Con Fetchall recojo los resultados
        $resultado = $gsent->fetchAll(PDO::FETCH_ASSOC);


        //Usar el codigo
    }catch(PDOException $e){
        echo "No se ha ejecutado el select<br>",$e->getMessage();
    }
  cerrarConexion($conn);
  //Devuelvo los resultados
  return $resultado;
}

function cambioDepartamento($dni, $cod_dpto, $conn)
{
	$now=date("Y/m/d");
	$sql="UPDATE emple_depart SET fecha_fin='$now' WHERE dni='$dni'";



	$sql2="INSERT INTO emple_depart (dni,cod_dpto,fecha_ini)
			VALUES ('$dni','$cod_dpto','$now')";

	// use exec() because no results are returned
	$resultado=0;
	try{
		$resultado=$conn->exec($sql);
    }catch(PDOException $e){
        echo "No se ha podido dar de baja al empleado ",$e->getMessage();
    }
	echo $resultado;
	if($resultado==1){
		try{
			$conn->exec($sql2);
		}catch(PDOException $e){
			echo "No se ha podido asignar nuevo departamento al empleado",$e->getMessage();
		}
	}
}
function mostrarEmplePorDpto($cod_dpto, $conn)
{

	$sql="SELECT empleado.nombre, empleado.apellidos
	from emple_depart, empleado where emple_depart.dni = empleado.dni
	AND  emple_depart.cod_dpto='$cod_dpto' AND  emple_depart.fecha_fin IS NULL";

      // use exec() because no results are returned
      try{
        //compila y prepara estructuras de datos
        $gsent=$conn->prepare($sql);
        //La ejecuto
        $gsent->execute();
        // set the resulting array to associative
      /*  $resultado = $stmt->setFetchMode(PDO::FETCH_ASSOC);*/
        //Con Fetchall recojo los resultados
        $resultado = $gsent->fetchAll(PDO::FETCH_ASSOC);


        //Usar el codigo
	}catch(PDOException $e){
        echo "No se ha ejecutado el select<br>",$e->getMessage();
    }
	cerrarConexion($conn);
	//Devuelvo los resultados
    return $resultado;
}

function mostrarHistoricoEmple($cod_dpto, $conn)
{

	$sql="SELECT empleado.nombre, empleado.apellidos
	from emple_depart,empleado where emple_depart.dni = empleado.dni
	AND emple_depart.fecha_fin IS NOT NULL AND emple_depart.cod_dpto='$cod_dpto'";

      // use exec() because no results are returned
      try{
        //compila y prepara estructuras de datos
        $gsent=$conn->prepare($sql);
        //La ejecuto
        $gsent->execute();
        // set the resulting array to associative
      /*  $resultado = $stmt->setFetchMode(PDO::FETCH_ASSOC);*/
        //Con Fetchall recojo los resultados
        $resultado = $gsent->fetchAll(PDO::FETCH_ASSOC);


        //Usar el codigo
	}catch(PDOException $e){
        echo "No se ha ejecutado el select<br>",$e->getMessage();
    }
	cerrarConexion($conn);
	//Devuelvo los resultados

    return $resultado;
}

function cambioSalario($dni, $cambio, $conn){

	$sql="SELECT salario from empleado where dni='$dni'";

	      // use exec() because no results are returned
      try{
        //compila y prepara estructuras de datos
        $gsent=$conn->prepare($sql);
        //La ejecuto
        $gsent->execute();
        // set the resulting array to associative
      /*  $resultado = $stmt->setFetchMode(PDO::FETCH_ASSOC);*/
        //Con Fetchall recojo los resultados
        $resultado = $gsent->fetchAll(PDO::FETCH_ASSOC);


        //Usar el codigo
	}catch(PDOException $e){
        echo "No se ha ejecutado el select<br>",$e->getMessage();
    }

	foreach($resultado as $arraySalario ){
		$salarioAntiguo=$arraySalario["salario"];


	}
	if($cambio>0){
		$salarioNuevo=$salarioAntiguo+(($salarioAntiguo*$cambio)/100);


	}else{
		$cambio=abs($cambio);
		$salarioNuevo=$salarioAntiguo-(($salarioAntiguo*$cambio)/100);


	}

	$sql2="UPDATE empleado SET salario='$salarioNuevo' WHERE dni='$dni'";

	try{
		$conn->exec($sql2);
	}catch(PDOException $e){
		echo "No se ha podido cambiar el sueldo",$e->getMessage();
	}

	cerrarConexion($conn);

}
function relacionPorFecha($fecha, $conn){

		$sql="SELECT empleado.nombre, empleado.apellidos , emple_depart.cod_dpto
	from emple_depart, empleado where emple_depart.dni = empleado.dni
	AND emple_depart.fecha_ini<='$fecha' AND (emple_depart.fecha_fin>'$fecha' OR emple_depart.fecha_fin IS NULL)";


      // use exec() because no results are returned
      try{
        //compila y prepara estructuras de datos
        $gsent=$conn->prepare($sql);
        //La ejecuto
        $gsent->execute();
        // set the resulting array to associative
      /*  $resultado = $stmt->setFetchMode(PDO::FETCH_ASSOC);*/
        //Con Fetchall recojo los resultados
        $resultado = $gsent->fetchAll(PDO::FETCH_ASSOC);


        //Usar el codigo
	}catch(PDOException $e){
        echo "No se ha ejecutado el select<br>",$e->getMessage();
    }
	cerrarConexion($conn);
	//Devuelvo los resultados

    return $resultado;

}

function mostrarSalarioEmplePorDpto($cod_dpto, $conn)
{

	$sql="SELECT departamento.nombre_dpto,empleado.nombre,empleado.salario
	from emple_depart, empleado,departamento
  where emple_depart.dni = empleado.dni
  AND emple_depart.cod_dpto=departamento.cod_dpto
	AND  departamento.cod_dpto='$cod_dpto' AND  emple_depart.fecha_fin IS NULL";

  $sql2="SELECT departamento.nombre_dpto, sum(salario)
  from empleado, departamento, emple_depart
  where empleado.dni=emple_depart.dni
  AND emple_depart.cod_dpto=departamento.cod_dpto
  AND departamento.cod_dpto='$cod_dpto' AND  emple_depart.fecha_fin IS NULL";

      // use exec() because no results are returned
      try{
        //compila y prepara estructuras de datos
        $gsent=$conn->prepare($sql);
        //La ejecuto
        $gsent->execute();
        // set the resulting array to associative
      /*  $resultado = $stmt->setFetchMode(PDO::FETCH_ASSOC);*/
        //Con Fetchall recojo los resultados
        $resultado = $gsent->fetchAll(PDO::FETCH_ASSOC);


        //Usar el codigo
	}catch(PDOException $e){
        echo "No se ha ejecutado el select<br>",$e->getMessage();
    }
	cerrarConexion($conn);
	//Devuelvo los resultados
    return $resultado;
}

function mostrarTotalSalariosPorDpto($cod_dpto, $conn)
{

	$sql="SELECT departamento.nombre_dpto, sum(salario)
  from empleado, departamento, emple_depart
  where empleado.dni=emple_depart.dni
  AND emple_depart.cod_dpto=departamento.cod_dpto
  AND departamento.cod_dpto='$cod_dpto' AND  emple_depart.fecha_fin IS NULL";

      // use exec() because no results are returned
      try{
        //compila y prepara estructuras de datos
        $gsent=$conn->prepare($sql);
        //La ejecuto
        $gsent->execute();
        // set the resulting array to associative
      /*  $resultado = $stmt->setFetchMode(PDO::FETCH_ASSOC);*/
        //Con Fetchall recojo los resultados
        $resultado = $gsent->fetchAll(PDO::FETCH_ASSOC);


        //Usar el codigo
	}catch(PDOException $e){
        echo "No se ha ejecutado el select<br>",$e->getMessage();
    }
	cerrarConexion($conn);
	//Devuelvo los resultados
    return $resultado;
}

?>
