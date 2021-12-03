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
function consultarDepartamento($conn){

  //declaro query de la Consulta
  $sql="select cod_dpto from departamento order by cod_dpto desc limit 1";
 //sql="SELECT MAX(cod_dpto) from departamento";  

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
          $ultimoDpto=$departamento["cod_dpto"];
        }
      }
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

//select cod_dpto nombre_dpto from departamento;
//Consulta el ultimo
 //select * from departamento order by cod_dpto desc limit 1;
//select nombre
//from empleado, departament, emple_depart
//where empleado.dni=emple_depart=dni
//and departamento.cod_dpto=emple_depart.cod_dpto
//and departamento.nombre_dpto="MARKETING";
?>
