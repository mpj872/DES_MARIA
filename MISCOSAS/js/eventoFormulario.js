window.onload=inicioEventos;

function inicioEventos(){
	//Si quiero que las validaciones las haga cuando presiono el boton de Enviar
	document.primero.onsubmit=validar;//Realizo las validaciones
  //Poner foco cambio color
	document.primero.nif.onfocus=cambiarColorRojo;
  //Quitar foco
  document.primero.nif.onblur=cambiarColorBlanco
  //Radio button se le asigna el evento a todos
  document.primero.provin[0].onclick=recogerRadio;
  document.primero.provin[1].onclick=recogerRadio;
  document.primero.provin[2].onclick=recogerRadio;
  document.primero.provin[3].onclick=recogerRadio;
  //Solo letras evento cuando pulsas teclas
  document.primero.telefono.onkeypress=soloNumeros;
  //Si es un checkbutton hacemos lo mismo que con el radioButton
  document.primero.viajar.onclick=recogerCheck;
  document.primero.leer.onclick=recogerCheck;
  document.primero.musica.onclick=recogerCheck;
  document.primero.cine.onclick=recogerCheck;
  document.primero.deporte.onclick=recogerCheck;
  document.primero.cena.onclick=recogerCheck;
  //Poner un link se inicia cuando carga la pagina y cada link esta en un array
  document.links[0].href="https://www.ifpleonardo.com";



}

function recogerRadio(){
//Recogemos lo que ha pulsado
var seleccion=document.primero.provin.value;

}

function recogerCheck(evento){
//Como admite varios tengo que preguntar por todos uno a uno
  if (document.primero.leer.checked) {

  }

}


function cambiarColorRojo(evento){

evento.target.style.backgroundColor="red";
evento.target.value="";

}
function cambiarColorBlanco(evento){

evento.target.style.backgroundColor="white";
evento.target.value="";

}

function soloNumeros(evento){

  let esdigito=true;
  let caracter=String.fromCharCode(evento.charCode);
  if (caracter < "0" || caracter > "9" )
    esdigito=false;
  return esdigito;
}

function validar(){
	//Para que no se envie el formulario si hay errores

	var enviar=false;
	//String de stringErrores
	var stringErrores="";

	if(!enviar){
	  alert(stringErrores);
	}


	return enviar;

}
