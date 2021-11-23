window.onload=inicio;

function inicio () {
	document.formulario.boton.onclick=validarAnagrama;
}

function validarAnagrama() {
	//Recojo palabras del formulario convierto a minusculas y quito espacios
	var palabra1=document.formulario.palabra1.value.toLowerCase().trim();
	var palabra2=document.formulario.palabra2.value.toLowerCase().trim();

	//Declaro un boolean
	var esAnagrama=true;
	//Tienen que ser de la misma longitud
	if(palabra1.length!=palabra2.length){
		esAnagrama=false;

	}else{
		//Recorro la palabra caracter a caracter y voy borrando
		var aciertos=0;
		for (var i = 0; i < palabra1.length; i++) {
			var posLetra=palabra1.indexOf(palabra2.charAt(i));
			if(posLetra!=-1){
					palabra2=palabra2.replace(palabra2.charAt(posLetra),"");

			}
		}
		if(palabra2!=""){
			esAnagrama=false;

		}



	}

	if(esAnagrama){
		document.formulario.mensaje.value="La palabras son anagramas"

	}else{
		document.formulario.mensaje.value="La palabras no son anagramas"
	}

}
