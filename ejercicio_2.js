window.onload=inicio;

function inicio() {
    document.formulario.onsubmit=validar;
}

function validar() {
    let enviar = true;

    let mensajeError = validarCodigoProducto(document.formulario.codigo.value);
    if (mensajeError) {
        document.formulario.errcodigo.value = mensajeError;
        enviar = false;
    }

    mensajeError = validarDescripcionProducto(document.formulario.descripcion.value);
    if (mensajeError) {
        document.formulario.errdescripcion.value = mensajeError;
        enviar = false;
    }

    mensajeError = validarPrecioProducto(document.formulario.precio.value);
    if (mensajeError) {
        document.formulario.errprecio.value = mensajeError;
        enviar = false;
    }


    return enviar;
}

function validarCodigoProducto(codigoProducto) {
    let mensajeError = "";

    let regex = "^([0-9]){7,11}$";
    if (!codigoProducto.match(regex)) {
        mensajeError = "Error en longitud de codigo de producto";
    }

    return mensajeError;
}

function validarDescripcionProducto(descripcionProducto) {
    let mensajeError = "";

    if (descripcionProducto.length < 10 || descripcionProducto.length > 23) {
        mensajeError = "Error en la longitud de la descripción";
    }

    if (mensajeError === "") {
        let cuatroPrimerosChars = descripcionProducto.substr(0, 4);
        let regex = /^[a-zA-Z]+$/;
        if (!cuatroPrimerosChars.match(regex)) {
            mensajeError += "Error en los primero 4 caracteres de la descripcion\n";
        }

        let charsMedio = descripcionProducto.substr(4, descripcionProducto.length - 5);
        regex =/^[a-zA-Z\-0-9áéíóúüñ ]+$/i;
        if (!charsMedio.match(regex)) {
            mensajeError += "Error en los caracteres del mediio de la descripcion\n";
        }

        let ultimoChar = descripcionProducto.substr(-1);
        regex = /^[a-zA-Z]+$/;
        if (!ultimoChar.match(regex)) {
            mensajeError += "Error en el ultimo caracter de la descripcion\n";
        }
    }

    return mensajeError;
}

function validarPrecioProducto(precioProducto) {
    let mensajeError = "";

    let regex = /^[1-9][0-9]+([,][0-9]{1,2})?$/;
    if (!precioProducto.match(regex)) {
        mensajeError = "Error en el precio del producto";
    }

    return mensajeError;
}
