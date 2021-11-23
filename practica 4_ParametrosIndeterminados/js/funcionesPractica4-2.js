window.onload=principio;

function principio(){
	document.formulario.maximo.onclick=mostrarMaximos;
}

function maximos (uno,dos,tres,...otrosParametros)
{
	var arrayCandidatos = [uno, dos, tres];
	arrayCandidatos = arrayCandidatos.concat(otrosParametros);
	arrayCandidatos.sort(function(a, b){return b - a});

	var maximo1 = arrayCandidatos[0];
	var maximo2 = arrayCandidatos[1];

	return [maximo1, maximo2];

 }    

 function mostrarMaximos()
 {

	 var arrayMaximos = maximos(5, 2, 3, 8, 90, 50);
   document.formulario.caja1.value = arrayMaximos[0];
	 document.formulario.caja2.value = arrayMaximos[1];
 }
