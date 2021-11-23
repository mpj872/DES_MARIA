window.onload=inicio;

function inicio(){
	document.primerFormulario.onsubmit=validar;
}

function validar(evento){
	evento=evento|window.event;
	let enviar=true;
	let mensaje="";

	let valorEditorial=document.primerFormulario.editorial.value.trim();
	let edita=/^[a-záéíóúñ]{4}[a-záéíóúñ \.]{7,33}[a-záéíóúñ\.]$/i;
	if (!erEdita.test(valorEditorial)){
		enviar=false;
		mensaje+="Error en la editorial, no tiene la estructura especificada \n";
	}

	let valorEstilo=document.primerFormulario.estilo.value.trim();
	let estilo=new RegExp("^((Novela)|(Poesía)|(Narrativa)|(Diccionario)|(Gramática))$","i")
	if (!erEstilo.test(valorEstilo)){
		enviar=false;
		mensaje+="Error en el estilo, no tiene un de los valores posibles \n";
	}

	let valorTitulo=document.primerFormulario.titulo.value.trim();
	if (!comprobarTitulo(valorTitulo)){
		enviar=false;
		mensaje+="Error en el Título, no tiene la estructura especificada \n";
	}
}

function comprobarTitulo(valorTit){
	let correcto=true;
	valorTit=valorTit.toLowerCase();
	let letrasadicionales="áéíóúüñ";
	let adicionales=" -0123456789";
	if (valorTit.length < 7 ||valorTit.length > 30)
		correcto=false
	else {
		for (let i=0; i < 2 ; i++)
			if (valorTit.charAt(i) < "a" || valorTit.charAt(i) > "z")
				if (!letrasadicionales.includes(valorTit.charAt(i)))
					correcto=false;
		for (let i=valorTit.length - 4; i < valorTit.length ; i++)
			if (valorTit.charAt(i) < "a" || valorTit.charAt(i) > "z")
				if (!letrasadicionales.includes(valorTit.charAt(i)))
					correcto=false;
		for (let i=valorTit.length - 2; i < valorTit.length - 4 ; i++)
			if (valorTit.charAt(i) < "a" || valorTit.charAt(i) > "z")
				if (!letrasadicionales.includes(valorTit.charAt(i)))
					if (!adicionales.includes(valorTit.charAt(i)))
						correcto=false;

	}
	return correcto;

}
