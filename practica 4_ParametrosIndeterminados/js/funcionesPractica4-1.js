window.onload=principio;

function principio(){
	document.formulario.media.onclick=mostrarMedia;
}

function media ()
{
	var numParametros = arguments.length;
  var acumulado = 0;
  for (var i = 0; i < numParametros; i++) {
    acumulado += arguments[i];
  }

  if (numParametros > 0) {
		return acumulado / numParametros;
	} else {
			return 0;
	}
}    

 function mostrarMedia()
 {
	 var mediaValor = media(5, 2, 3, 8, 90, 50);
   document.formulario.resultado.value = mediaValor;
 }
