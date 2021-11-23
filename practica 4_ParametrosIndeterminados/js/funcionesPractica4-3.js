window.onload=principio;

function principio(){
	document.formulario.caja7.onclick=mostrarMinimos;
}

function minimos (primero, segundo, tercero, cuarto = 13, quinto = 7)
{
    var arrayMin=new Array(primero,segundo,tercero,cuarto,quinto);
    var numAux=arrayMin[0];
    for (var i = 0; i < arrayMin.length; i++) {
      if(arrayMin[i]<numAux){
        var numAux=arrayMin[i];
      }
    }

    return numAux;
 }    

 function mostrarMinimos()
 {
   var valor1 = document.formulario.caja1.value;
   var valor2 = document.formulario.caja2.value;
   var valor3 = document.formulario.caja3.value;
   var valor4 = document.formulario.caja4.value;
   var valor5 = document.formulario.caja5.value;

   var minimo = 0;
   if (valor4 != "" && valor5 != "") {
     minimo = minimos(valor1, valor2, valor3, valor4, valor5);
   } else if (valor4 != "" && valor5 == "") {
     minimo = minimos(valor1, valor2, valor3, valor4);
   } else if (valor4 == "" && valor5 != "") {
     minimo = minimos(valor1, valor2, valor3, undefined, valor5);
   } else if (valor4 == "" && valor5 == "") {
     minimo = minimos(valor1, valor2, valor3);
   }

   document.formulario.caja6.value = minimo;
 }
