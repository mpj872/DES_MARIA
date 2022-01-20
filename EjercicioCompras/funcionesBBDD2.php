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
	$dbname = "comprasweb";

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
function consultarCategoria($conn){

  //declaro query de la Consulta
  $sql="SELECT MAX(ID_CATEGORIA) from categoria";

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

function darAltaCategoria ($nombre_categoria,$ultimaCategoria,$conn){


      foreach ($ultimaCategoria as $key => $categoria) {
        foreach ($categoria as $value) {
          $ultimaCategoria=$value;
        }
      }
	  if($ultimaCategoria!=null){

		  $dimension=strlen($ultimaCategoria);
		  $ultimaCategoria=substr($ultimaCategoria,1,$dimension);

		  $id_categoria=$ultimaCategoria+1;


		  $id_categoria=str_pad($id_categoria, 3, "0", STR_PAD_LEFT);

		  $id_categoria="C".$id_categoria;

		  $sql = "INSERT INTO categoria (id_categoria,nombre) VALUES ('$id_categoria','$nombre_categoria')";
		  // use exec() because no results are returned
		  try{

		  $conn->exec($sql);
		  echo "categoria dada de alta correctamente";

		}catch(PDOException $e){
			echo "No se ha dado de alta la categoria esta duplicado",$e->getMessage();
		}
	}else{
		 $sql = "INSERT INTO categoria (id_categoria,nombre) VALUES ('C001','$nombre_categoria')";
		  try{

		  $conn->exec($sql);
		   echo "primera categoria dada de alta correctamente";

		}catch(PDOException $e){
			echo "No se ha dado de alta la categoria esta duplicado",$e->getMessage();
		}

	}
}

function desplegableCategoria($conn){
      //Declaro la query
      $sql = "select ID_CATEGORIA,NOMBRE from categoria";
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


function consultarProducto($conn){

  //declaro query de la Consulta
  //$sql="select cod_dpto from departamento order by cod_dpto desc limit 1";
  $sql="SELECT MAX(ID_PRODUCTO) from producto";

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
function altaProducto($nombre,$precio,$id_categoria, $ultimoProducto,$conn)
{
	//Recorro el array asociativo del ultimo producto
	foreach ($ultimoProducto as $key => $producto) {
       foreach ($producto as $value) {
          $ultimoProducto=$value;
        }
    }
	//Si no es nulo miro su dimension y lo completo con 0
	if($ultimoProducto!=null){

		$dimension=strlen($ultimoProducto);
		$ultimoProducto=substr($ultimoProducto,1,$dimension);

		$id_producto=$ultimoProducto+1;


		$id_producto=str_pad($id_producto, 3, "0", STR_PAD_LEFT);

		$id_producto="P".$id_producto;

		$sql = "INSERT INTO producto (id_producto,nombre,precio,id_categoria) VALUES ('$id_producto','$nombre','$precio','$id_categoria')";
		  // use exec() because no results are returned
		try{

		  $conn->exec($sql);
		  echo "producto dada de alta correctamente";

		}catch(PDOException $e){
			echo "No se ha dado de alta la producto esta duplicado",$e->getMessage();
		}
	}else{
		 $sql = "INSERT INTO producto (id_producto,nombre,precio,id_categoria) VALUES ('P001','$nombre','$precio','$id_categoria')";
		  try{

		  $conn->exec($sql);
		   echo "primera producto dada de alta correctamente";

		}catch(PDOException $e){
			echo "No se ha dado de alta la producto esta duplicado",$e->getMessage();
		}

	}
}
function consultarAlmacen($conn){

  //declaro query de la Consulta
  //$sql="select cod_dpto from departamento order by cod_dpto desc limit 1";
  $sql="SELECT MAX(NUM_ALMACEN) from almacen";

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


function altaAlmacen($localidad,$ultimoAlmacen,$conn)
{
	//Si no esta vacio añado 10 al último almacen
	//Si esta vacio quiere decir que es el primer almacen
	if(!empty($ultimoAlmacen)){
		//En lugar de recorrer el array asociativo
		//Voy a la posición 0 con nombre max(num_Almacen)
		$ultimoAlmacen = $ultimoAlmacen[0]['MAX(NUM_ALMACEN)'];
		$numAlmacen= $ultimoAlmacen + 10;
		$sql = "INSERT INTO almacen (NUM_ALMACEN,LOCALIDAD) VALUES ('$numAlmacen','$localidad')";
		  // use exec() because no results are returned
		try{

		  $conn->exec($sql);
		  echo "Almacén dada de alta correctamente";

		}catch(PDOException $e){
			echo "No se ha dado de alta la almacén",$e->getMessage();
		}
	}else{
		 $sql = "INSERT INTO almacen (NUM_ALMACEN,LOCALIDAD) VALUES (10,'$localidad')";
		  try{

		  $conn->exec($sql);
		   echo "primer almacen dado de alta correctamente";

		}catch(PDOException $e){
			echo "No se ha dado de alta el almacen",$e->getMessage();
		}

	}
}
function desplegableProducto($conn){
      //Declaro la query
      $sql = "select ID_PRODUCTO,NOMBRE from producto";
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
function desplegableAlmacen($conn){
      //Declaro la query
      $sql = "select NUM_ALMACEN,LOCALIDAD from almacen";
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
function altaAprovisionamiento($cantidad,$num_almacen,$id_producto,$conn){

	$sql = "INSERT INTO almacena (NUM_ALMACEN,ID_PRODUCTO,CANTIDAD) VALUES ('$num_almacen','$id_producto','$cantidad')";
	// use exec() because no results are returned
	try{

		$conn->exec($sql);
		echo "Aprovisionamiento correcto en el almacen";

	}catch(PDOException $e){
		echo "No se ha dado de alta el aprovisionamiento",$e->getMessage();
	}

}

function altaRegistro($nif,$nombre,$apellido,$cp,$direccion,$ciudad,$password,$conn){

  $sql = "INSERT INTO cliente (NIF,NOMBRE,APELLIDO,CP,DIRECCION,CIUDAD,CLAVE) VALUES ('$nif','$nombre','$apellido','$cp','$direccion','$ciudad','$password')";
	// use exec() because no results are returned
	try{

		$conn->exec($sql);
		echo "Registro de cliente realizado con exito";

	}catch(PDOException $e){
		echo "No se ha dado de alta el cliente",$e->getMessage();
	}

}

function consultarPassword($nombre,$password,$conn){
	$existe=false;

	$sql = "SELECT nif,clave from cliente where nombre='$nombre' and clave='$password'";
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
        //Si recojo algun usuario de la tabla

  		if(!empty ($resultado)){
        //Guardo su dni en una variable
        $nif=$resultado[0]['nif'];
        return $nif;

  		}else{

  			echo "No existe el usuario";
        return '00000000X';

  		}
        //Usar el codigo
    }catch(PDOException $e){
        echo "No se ha ejecutado el select<br>",$e->getMessage();
    }
}
function comprobarCantidadPorAlmacen($cantidad, $producto,$conn){


	$sql = "SELECT num_almacen,cantidad from almacena where id_producto='$producto'";

  try{
     //compila y prepara estructuras de datos
     $gsent=$conn->prepare($sql);
     //La ejecuto
     $gsent->execute();
     // set the resulting array to associative
   /*  $resultado = $stmt->setFetchMode(PDO::FETCH_ASSOC);*/
     //Con Fetchall recojo los resultados
     $resultado = $gsent->fetchAll(PDO::FETCH_ASSOC);
     //Si recojo algun usuario de la tabla
     $tenemosStock=false;

   if(!empty ($resultado)){
     //Recorro el array y compruebo que tengo suficiente stock en algun almacen

     for ($i=0; $i <count($resultado) ; $i++) {
       if($resultado[$i]['cantidad']>=$cantidad){
           echo "Productos añadidos a la cesta correctamente";
            $tenemosStock=true;
	    //Doy de alta la cookie y le quito al almacen la cantidad
            //O me espero a que compre y no es aquí es cuando termine la compra ?????
            //Alomejor es mejor comprobar stock cuanto realice la compra final no ahora ????   
            return 
      }
     }

   }

   if(!$tenemosStock){

     echo "no disponemos de suficiente stock del producto seleccionado";

   }
     //Usar el codigo
 }catch(PDOException $e){
     echo "No se ha ejecutado el select<br>",$e->getMessage();
 }





}


?>
