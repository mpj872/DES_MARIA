window.onload=inicio;

function inicio () {
	document.formulario.boton.onclick=esPentavocalica;
}

function esPentavocalica () {
	//recepción de parámetros.
	palabra = document.formulario.palabra1.value.toLowerCase(); //Se pasa a minúsculas para poder hacer la comparativa. 
	//comprobación de si es o no pentavocálica. 
	contador=0;
	sumaVocales=0; //Tiene que sumar 5 para ser pentavocálica. 

	for (var i=0; i<palabra.length; i++) {
		letra = palabra.charAt(i); //Aquí se extrae cada una de las letras de la palabra. 
		if (letra == "a") { //Se compara vocal a vocal. 
			sumaVocales++;
		}
		else if (letra == "e") { //Recordemos que con el else if, si la letra es e, ya no sigue comprobando si es i, o o u. Pero si pusiese un if, sí lo hace. 
			sumaVocales++;
		}
		else if (letra == "i") {
			sumaVocales++;
		}
		else if (letra == "o") {
			sumaVocales++;
		}
		else if (letra == "u") {
			sumaVocales++;
		}
	}//final bucle for

	if (sumaVocales==5) {
		alert ("La palabra es pentavocálica");
	} //fin if
	else {
		alert("La palabra no es pentavocálica");
	}//fin else
}//fin funcion esPentavocalica. 