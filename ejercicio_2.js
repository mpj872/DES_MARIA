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

    mensajeError = validarNombreEmpresa(document.formulario.empresa.value);
    if (mensajeError) {
        document.formulario.errempresa.value = mensajeError;
        enviar = false;
    }

    mensajeError = validarCodigoEmpresa(document.formulario.codempre.value);
    if (mensajeError) {
        document.formulario.errcodempre.value = mensajeError;
        enviar = false;
    }

    mensajeError = validarUnidades(document.formulario.unidades.value);
    if (mensajeError) {
        document.formulario.errunidades.value = mensajeError;
        enviar = false;
    }

    mensajeError = validarLocalidad(document.formulario.localidad.value);
    if (mensajeError) {
        document.formulario.errlocalidad.value = mensajeError;
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

function validarNombreEmpresa(nombreEmpresa) {
    let mensajeError = "";

    if (nombreEmpresa.length < 10 || nombreEmpresa.length > 27) {
        mensajeError = "Error en la longitud del nombre de la empresa";
    }

    if (mensajeError === "") {
        let tresPrimerosChars = nombreEmpresa.substr(0, 3);
        let regex = /^[a-zA-Z]+$/;
        if (!tresPrimerosChars.match(regex)) {
            mensajeError += "Error en los primero 3 caracteres del nombre\n";
        }

        let charsMedio = nombreEmpresa.substr(4, nombreEmpresa.length - 4);
        regex =/^[a-zA-Z0-9áéíóúüñ. ]+$/i;
        if (!charsMedio.match(regex)) {
            mensajeError += "Error en los caracteres del mediio del nombre de la empresa\n";
        }

        let ultimoChar = nombreEmpresa.substr(-1);
        regex = /^[a-zA-Z0-9]+$/;
        if (!ultimoChar.match(regex)) {
            mensajeError += "Error en el ultimo caracter del nombre de la empresa\n";
        }
    }

    return mensajeError;
}

function validarCodigoEmpresa(codigoEmpresa) {
    let mensajeError = "";

    // if (codigoEmpresa.length < 19 || codigoEmpresa.length > 22) {
    //     mensajeError = "Error en la longitud del codigo de la empresa";
    // }
    //
    // if (mensajeError === "") {
    //     let cuatroPrimerosChars = codigoEmpresa.substr(0, 4);
    //     let regex = /^[0-9]{3}.+$/;
    //     if (!cuatroPrimerosChars.match(regex)) {
    //         mensajeError += "Error en los primero 4 caracteres del codigo\n";
    //     }
    //
    //     let codigoMedio = codigoEmpresa.substr(4, 4);
    //     regex =/^[ABCE]|[CADE]|[FEGU]|[IJOK]|[LIMA]/;
    //     if (!codigoMedio.match(regex)) {
    //         mensajeError += "Error en los caracteres del codigo del codigo de la empresa\n";
    //     }
    //
    //     let ultimoChars = codigoEmpresa.substr(8, codigoEmpresa.length - 8);
    //     regex = /^[0-9]{5,8}.[0-9a-zA-Z]{5}/;
    //     if (!ultimoChars.match(regex)) {
    //         mensajeError += "Error en el ultimo caracter del nombre de la empresa\n";
    //     }
    // }

    return mensajeError;
}

function validarUnidades(unidadesProducto) {
    let mensajeError = "";

    let regex = new RegExp('^([1-9][0-9]{1,6})?$');
    if (!regex.test(unidadesProducto)) {
        mensajeError = "Error en las unidades del producto";
    }

    return mensajeError;
}

function validarLocalidad(localidad) {
    let mensajeError = "";

    let regex = new RegExp('^[a-zA-Z\áéíóúüñ]{5,20}?$', 'i');
    if (!regex.test(localidad)) {
        mensajeError = "Error en la localidad de la empresa";
    }

    return mensajeError;
}
