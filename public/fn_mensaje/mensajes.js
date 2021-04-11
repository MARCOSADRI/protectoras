/* import fn_mensaje from './funciones_globales.js'; */

document.getElementById("boton").addEventListener("click", () => {
    fn_mensaje("success", "Registro eliminado", 2000);
});

function fn_mensaje(p_tipo, p_mensaje, p_tiempo) {
    /*Creación de los elementos*/
    let contenedor_global = document.getElementById("contenedor_global");
    let contenedor = document.createElement("div"); //Contenedor
    let expresion = document.createElement("div"); //Contenedor figura
    let mensaje = document.createElement("div"); //Contenedor mensaje
    let h3 = document.createElement("h3"); //Mensaje
    let span = document.createElement("span"); //Figura
    /*Asignación de identificadores*/
    contenedor.setAttribute("id", "contenedor");
    expresion.setAttribute("id", "expresion");
    mensaje.setAttribute("id", "mensaje");
    span.setAttribute("id", "check");
    /*Aplicación del mensaje en el campo*/
    if (p_mensaje == 'Registro actualizado') {
        contenedor.style.left = "85%";
    } else if (p_mensaje == 'Registro añadido') {
        contenedor.style.left = "87%";
    } else if (p_mensaje == 'Registro eliminado') {
        contenedor.style.left = "86%";
    } else if (p_mensaje == 'Este campo debe ser completado') {
        contenedor.style.left = "78%";
    }
    h3.innerHTML = p_mensaje;
    /*Introducción de elementos*/
    mensaje.appendChild(h3);
    contenedor.appendChild(expresion);
    contenedor.appendChild(mensaje);
    /*Fondos*/
    if (p_tipo == 'success') {
        span.classList.add("fas");
        span.classList.add("fa-check-circle");
        contenedor.style.backgroundColor = "rgb(91, 173, 91)";
    } else if (p_tipo == 'warning') {
        span.classList.add("fas");
        span.classList.add("fa-exclamation-circle");
        contenedor.style.backgroundColor = "orange";
    } else if (p_tipo == 'alert') {
        span.classList.add("fas");
        span.classList.add("fa-times-circle");
        contenedor.style.backgroundColor = "red";
    }
    expresion.appendChild(span);
    contenedor_global.appendChild(contenedor);

    $(document).ready(function () {
        setTimeout(function () {
            $('#contenedor').fadeOut(800);
        }, p_tiempo);
    });
}