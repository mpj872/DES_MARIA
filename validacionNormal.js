function validacionDireccionEmpresa(direccionEmpresa){

  var medio=direccionEmpresa.substr(1,direccionEmpresa.length-2);
  var esDireccionEmpresa=true;
  var caracteres="ºª-/. ";

  if(direccionEmpresa.charAt(0)<"a"||direccionEmpresa.charAt(0)>"z"){
    esDireccionEmpresa=false;



  }else if((direccionEmpresa.charAt(direccionEmpresa.length-1)<"a"||direccionEmpresa.charAt(direccionEmpresa.length-1)>"z")
   && (direccionEmpresa.charAt(direccionEmpresa.length-1)<"0"||direccionEmpresa.charAt(direccionEmpresa.length-1)>"9")){

     esDireccionEmpresa=false;

  }else {

    for (var i = 0; i < medio.length; i++) {
     if((medio.charAt(i)<"a"||medio.charAt(i)>"z")
       && (medio.charAt(i)<"0"||medio.charAt(i)>"9")&&
       !caracteres.includes(medio.charAt(i))){

           esDireccionEmpresa=false;
     }
    }
  }
  return esDireccionEmpresa;
}
