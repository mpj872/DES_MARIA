window.onload=inicio; //funcion inicio que se aplica al cargar la pagina

function inicio () { //la funcion inicio hace que, al hacer click en el formulario, accedamos a esAnagrama. 
	document.formulario.boton.onclick=esAnagrama;
}

function esAnagrama() {
	palabra1=document.formulario.palabra1.value.toLowerCase(); //recepcion de parámetros
	palabra2=document.formulario.palabra2.value.toLowerCase(); //recepcion de parámetros
	//comprobacion de si es un anagrama o no. 
	var anagrama=false; 
	//1) Hay que comprobar el tema de la longitud. Si la longitud de las palabras es igual, puede seguir, si no, es imposible que sea un anagrama. 
	if (palabra1.length == palabra2.length) {
		//2) Si tienen la misma longitud, hay que compararlas.
		palabra1= palabra1.split("").sort().join(""); //se divide la palabra con un split y el separador es ""; Se pasa a array -> 
													 //y se ordena por orden alfabetico (sort()) y luego se convierte a cadena (string) con join ("") para poder compararlos.
		palabra2= palabra2.split("").sort().join(""); 
		if (palabra1==palabra2) //Ejemplo: Marta = aamrt Trama=aamrt; 
			anagrama=true; 
	}//fin if

	if (anagrama) {
		alert ("Es un anagrama");
	}else {
		alert ("No es un anagrama");
	}
}//fin funcion principal 


