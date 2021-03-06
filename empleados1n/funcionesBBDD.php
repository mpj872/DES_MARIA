<?php
/*SELECTs - mysql PDO*/

function limpiar($variable) {

    $variable = trim($variable);
    $variable = stripslashes($variable);
    $variable = htmlspecialchars($variable);
    return $variable;
}

function abrirConexion($servername,$username,$password,$dbname){

    try {
        $conn = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


        echo "conexion correcta<br>";
    }catch(PDOException $e) {
          echo "error en conexion " . $e->getMessage();
    }

        return $conn ;
}


function cerrarConexion($conn){

    $conn = null;

}

function darAltaDepartamento ($departamento,$conn){

      $sql = "INSERT INTO departamento (nombre_d) VALUES ('$departamento')";
      // use exec() because no results are returned
      try{

      $conn->exec($sql);

    }catch(PDOException $e){
        echo "No se ha dado de alta el dept esta duplicado",$e->getMessage();
    }

}
function darDeBaja ($departamento,$conn){

      $sql = "DELETE FROM departamento where nombre_d='$departamento'";
      // use exec() because no results are returned
      $conn->exec($sql);

}

function darAltaEmpleado ($nombre_e,$dni,$fnac,$nombre_d,$conn){

      $sql = "INSERT INTO empleado (dni,nombre_e,fec_nac,nombre_d) VALUES ('$dni','$nombre_e','$fnac','$nombre_d')";
      // use exec() because no results are returned
      try{

      $conn->exec($sql);

    }catch(PDOException $e){
        echo "No se ha dado de alta el empledo error en datos<br>",$e->getMessage();
    }

}
function descargarDepartamentos (){
      $servername = "localhost";
      $username = "root";
      $password = "rootroot";
      $dbname = "empleados1n";
      //Abro la conexion
      $conn=abrirConexion($servername,$username,$password,$dbname);
      //Declaro la query
      $sql = "SELECT * FROM departamento";
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



    }catch(PDOException $e){
        echo "No se ha ejecutado el select<br>",$e->getMessage();
    }
  cerrarConexion($conn);
  //Devuelvo los resultados
  return $resultado;
}

?>
