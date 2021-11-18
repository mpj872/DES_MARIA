<html>
  <head>
    <title>Archivos1</title>
    <meta charset="utf-8" />
    </head>
    <body>
<?php

require 'funcionesFichero2.php';

  //Recojo todos los datos del formulario eliminando los espacios en blanco del
  //principio y del final
  
  $nombre=trim($_POST['nombre']);
  $apellido1=trim($_POST['apellido1']);
  $apellido2=trim($_POST['apellido2']);
  $fecha=trim($_POST['fecha']);
  $localidad=trim($_POST['localidad']);
  //Compruebo que la fecha es validarFecha
  $fechaValida=validarFecha($fecha);

	if($fechaValida==true){
	//Si la fecha es válida le paso los datos a la función para que escriba los datos 
	
		escribirDatos($nombre,$apellido1,$apellido2,$fecha,$localidad);
		
		
	}else{
		
		echo ("La fecha introducida no es válida");
		
	}



?>
    </body>

</html>