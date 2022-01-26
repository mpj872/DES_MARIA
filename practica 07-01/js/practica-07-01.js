if (document.addEventListener)
	window.addEventListener("load",inicio)
else if (document.attachEvent)
	window.attachEvent("onload",inicio);


/*

function inicio(){
	if (document.addEventListener){
		document.getElementById("cordoba").addEventListener("click",function (){mostrarTexto("cordoba.txt");});
		document.getElementById("cantabria").addEventListener("click",function (){mostrarTexto("cantabria.txt");});
		document.getElementById("segovia").addEventListener("click",function (){mostrarTexto("segovia.html");});
		document.getElementById("sevilla").addEventListener("click",function (){mostrarTexto("sevilla.html");});
	} else if (document.attachEvent){
		document.getElementById("cordoba").attachEvent("onclick",function (){mostrarTexto("cordoba.txt");});
		document.getElementById("cantabria").attachEvent("onclick",function (){mostrarTexto("cantabria.txt");});
		document.getElementById("segovia").attachEvent("onclick",function (){mostrarTexto("segovia.html");});
		document.getElementById("sevilla").attachEvent("onclick",function (){mostrarTexto("sevilla.html");});
	}
}
*/

//Asignar los eventos a cada opcion del menú 

function inicio(){
	if (document.addEventListener){
		document.getElementById("cordoba").addEventListener("click",descargaCordoba);
		document.getElementById("cantabria").addEventListener("click",descargaCantabria);
		document.getElementById("segovia").addEventListener("click",descargaSegovia);
		document.getElementById("sevilla").addEventListener("click",descargaSevilla);
	} else if (document.attachEvent){
		document.getElementById("cordoba").attachEvent("onclick",descargaCordoba);
		document.getElementById("cantabria").attachEvent("onclick",descargaCantabria);
		document.getElementById("segovia").attachEvent("onclick",descargaSegovia);
		document.getElementById("sevilla").attachEvent("onclick",descargaSevilla);
	}
}
function descargaCordoba(){
	mostrarTexto("cordoba.txt");
}
function descargaCantabria(){
	//Llamo a la funcion mostrar texto y le paso 
	mostrarTexto("cantabria.txt");
}
function descargaSegovia(){
	mostrarTexto("segovia.html");
}
function descargaSevilla(){
	mostrarTexto("sevilla.html");
}

let peticion;
function mostrarTexto(fichero) {
	
	
    // primer paso crear objeto
    if (window.XMLHttpRequest)
        peticion=new XMLHttpRequest();
    else if (window.ActiveXObject)
        peticion=new ActiveXObject("Microsoft.XMLHTTP");
	
	
	
    // segundo paso asignar evento readystatechange
	//Cuando se ejecuto el evento pase a proceser el evento esta asociado al objeto
    if (document.addEventListener)
        peticion.addEventListener("readystatechange",procesar);
    else if (document.attachEvent)
        peticion.attachEvent("onreadystatechange",procesar);
	
	
    // tercer paso establecer conexión con el servidor    
    // solicitud del contenido de un fichero de tipo texto
	// solicitud del contenido de un fichero de tipo texto
	//Establecer un hilo de comunicacion con el servidor 
    peticion.open("GET",fichero);
	
	
    // cuarto paso establecer la cabecera si es necesaria
    //quinto paso realizar la solicitud al servidor
    // si no se pasan parámetros o bien se pasan parámetros mediante get
	//Realizas la petición
    peticion.send(null);
}
//cuando sucede el evento el servido devuelve informacion y se ejecuta esta funcion 
//Existe envio de datos 
function procesar() {
	//la conexion ha ido bien y he recibido los datos de forma correcta 
    if (peticion.readyState==4)
        if (peticion.status==200){
            // procesar los datos
            // peticion.responseText
            document.getElementById("contenido").innerHTML=peticion.responseText;
        }
}