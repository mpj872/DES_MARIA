<?php


function escribirDatos($nombre,$apellido1,$apellido2,$fecha,$localidad){
	//Abro el fichero y lo meto en una variable la a significa que no machaco lo que teno dentro
	$alumnos = fopen("alumnos2.txt", "a") or die("Unable to open file!");
	//compruebo si el fichero tiene algo, en caso de que ya tenga un alumno 
	//le doy un salto de linea 
	if(filesize("alumnos2.txt")>0){
		fwrite($alumnos,"\n"); 
		
	}	
	//compruebo la longitud del nombre, apellidos...
	$longitudNombre=strlen($nombre);
	$longitudApellido1=strlen($apellido1);
	$longitudAppellido2=strlen($apellido2);
	$longitudFecha=strlen($fecha);
	$longitudLocalidad=strlen($localidad);
	//le meto delimitadores a partir del nombre, apellidos.. para completar los 40 caracteres
	
	$nombreConDelimitadores=str_pad($nombre,($longitudNombre+2),"#");
	$apellido1ConDelimitadores=str_pad($apellido1,($longitudApellido1+2),"#");
	$apellido2ConDelimitadores=str_pad($apellido2,($longitudAppellido2+2),"#");
	$fechaConDelimitadores=str_pad($fecha,($longitudFecha+2),"#");
	
	//Escribo en el fichero los datos con los espacios asociados en una sola linea
	fwrite($alumnos,$nombreConDelimitadores);
	fwrite($alumnos,$apellido1ConDelimitadores);
	fwrite($alumnos,$apellido2ConDelimitadores);
	fwrite($alumnos,$fechaConDelimitadores);
	fwrite($alumnos,$localidad);
	//Cierro el fichero 
	fclose($alumnos);
}

function validarFecha($fecha){
  //Divido la fecha en array
  $arrayFecha=explode("/",$fecha);
  $longitudArray=count($arrayFecha);
  $fechaValida=true;

  if($longitudArray!=3){

      $fechaValida=false;
	//le doy la vuelta al día y al mes porque el orden de chekdate es mes primero;
  }else if(!checkdate($arrayFecha[1],$arrayFecha[0],$arrayFecha[2])){

        $fechaValida=false;
  }

    return $fechaValida;

}

?>
