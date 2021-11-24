window.onload=inicio;

function inicio () {
	document.formulario.boton.onclick=esPentavocalica;
}

function esPentavocalica () {
	//recojo los parametros del formulario en minuscula y sin espacios en blanco
	var palabra = document.formulario.palabra1.value.toLowerCase().trim();

	//Declaro un contador por cada vocal
	var totalA=0;
	var totalE=0;
	var totalI=0;
	var totalO=0;
	var totalU=0;

	for (var i=0; i<palabra.length; i++) {
		//Recorro la palabra char a char comparando con vocal
		letra = palabra.charAt(i);
		if (letra == "a" || letra=="á") {
			totalA++;
		}
		else if (letra == "e" || letra=="é") {
			totalE++;
		}
		else if (letra =="i" || letra=="í") {
			totalI++;
		}
		else if (letra =="o" || letra=="ó") {
			totalO++;
		}
		else if (letra =="u" || letra=="ú") {
			totalU++;
		}
	}

	if (totalA==1 && totalE==1 && totalI==1 && totalO==1 && totalU==1) {
		document.formulario.mensaje.value=("La palabra es pentavocálica");
	}
	else {
		document.formulario.mensaje.value=("La palabra no es pentavocálica");
	}
}
