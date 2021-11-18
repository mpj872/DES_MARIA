<?php


function escribirDatos($nombre,$apellido1,$apellido2,$fecha,$localidad){
	//Abro el fichero y lo meto en una variable la "a" significa que no machaco lo que tengo dentro
	$alumnos = fopen("alumnos1.txt", "a") or die("Unable to open file!");
	//compruebo si el fichero tiene algo, en caso de que ya tenga un alumno 
	//le doy un salto de linea 
	if(filesize("alumnos1.txt")>0){
		fwrite($alumnos,"\n"); 
		
	}
		
	//le meto espacios a partir del nombre, apellidos.. para completar los 40 caracteres
	$nombreConEspacios=str_pad($nombre,40);
	$apellido1ConEspacios=str_pad($apellido1,40);
	$apellido2ConEspacios=str_pad($apellido2,40);
	$fechaEspacios=str_pad($fecha,40);
	$localidadConEspacios=str_pad($localidad,40);
	//Escribo en el fichero los datos con los espacios asociados en una sola linea
	fwrite($alumnos,$nombreConEspacios);
	fwrite($alumnos,$apellido1ConEspacios);
	fwrite($alumnos,$apellido2ConEspacios);
	fwrite($alumnos,$fechaEspacios);
	fwrite($alumnos,$localidadConEspacios);
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
