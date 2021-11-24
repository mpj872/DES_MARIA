window.onload=principio;

function principio(){
  //Aqui es donde le asigno eventos a los botones
  document.formulario.comprobar.onclick=comprobarFecha;


}

function comprobarFecha(){
    //Recojo los valores del formulario y limpio los espacios
    var fecha=document.formulario.fecha.value.trim();
    //fecha=fecha.replace(/ /g, "");(limpio espacios internos)
    //Declaro el boolean
    var esFecha=true;

    //Compruebo la longitud del String
    if(fecha.length<8 || fecha.length>10){
        esFecha=false;

    }else{
    //convierto el string es un array
      var arrayFecha = fecha.split("/");
      if(arrayFecha.length!=3){
        esFecha=false;

      //Si cumple que tiene tres posiciones el array
      //compruebo que el día se encuentre entre 1 y 31
    }else if(arrayFecha[0]<1 || arrayFecha[0]>31 ){
        esFecha=false;
    //Paso hacer lo mismo con el mes
    }else if(arrayFecha[1]<1 || arrayFecha[1]>12){
      esFecha=false;
    //Con el año primero compruebo que tenga 2 o 4 cifras
   }else if(arrayFecha[2].length!=2 && arrayFecha[2].length!=4)
      esFecha=false;
  }

  if(esFecha){
    document.formulario.mensaje.value="Fecha Correcta";
  }else{
    document.formulario.mensaje.value="No es una fecha Correcta";
  }
}
