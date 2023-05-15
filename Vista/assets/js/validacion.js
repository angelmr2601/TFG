document.addEventListener("DOMContentLoaded", function(){
    document.getElementById("form_registro").addEventListener('submit',validacion);
});

function validacion(evento){
    let validacion = true;

    var input_username = document.getElementById("usuario");
    var avisoUsername = document.getElementById("avisoNombre");

    var input_email = document.getElementById("email");
    var avisoEmail = document.getElementById("avisoCorreo");

    var input_fechainicio = document.getElementById("disponibilidad_inicio1").value;
    var input_fechafin = document.getElementsByName("disponibilidad_fin1").value;

    var avisofecha = document.getElementById("avisoFecha");

    var fechaInicioObj = new Date(input_fechainicio);
    var fechaFinObj = new Date(input_fechafin);

    var input_confirm_password = document.getElementById("pswd");
    var avisoConfirmPassword = document.getElementById("avisoPass");



    var regexNombre = /[a-zñA-ZÑ]+/gi;
    var regexMail = /\w.*\d*(@)\w+(\.\w+)/s;
    var regexPass = /^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8,16}$/;

    //comprobar fechas
    if(fechaInicioObj > fechaFinObj){
        avisofecha.setAttribute("class", "invisible");
        validacion = true;
    } else {

        avisofecha.removeAttribute("class", "");
        validacion = false;
    }


    //comprobar nombre
    if (input_username.value.match(regexNombre)) {
        avisoUsername.setAttribute("class", "invisible");
        validacion = true;
    } else {

        avisoUsername.removeAttribute("class", "");
        validacion = false;

    }

    //comprobar correo
    if (input_email.value.match(regexMail)) {
        avisoEmail.setAttribute("class", "invisible");
        validacion = true;
    } else {
        avisoEmail.removeAttribute("class", "");
        validacion = false;

    }
    //comprobar pass
    if (input_password.value.match(input_confirm_password.value)) {
        avisoConfirmPassword.setAttribute("class", "invisible");
    
        if (input_password.value.match(regexPass)) {
            avisoPassword.setAttribute("class", "invisible");
            validacion = true;
        } else {
            avisoPassword.removeAttribute("class", "");
            validacion = false;

        }
    } else {

        avisoConfirmPassword.removeAttribute("class", "");
        validacion = false;

    }

    if (validacion == false){
        evento.preventDefault();
    }else{
        window.alert("Usuario registrado con exito");
    }

}