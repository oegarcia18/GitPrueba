//Funcion para validar el usuario
$('#form').submit(function (e) {

    //Se previene el evento
    e.preventDefault();

    var usuario = $('#usuario').val();
    var pass = $('#password').val();


    $.post("../controlador/login_controlador.php?op=verificar", {usuario: usuario, pass: pass}, function (data)
    {
        //Si es !== de null es por que el usuario si existe
        if (data !== "null") {

            //Se redirecciona al escritorio
            $(location).attr("href", "escritorio.php");

        } else {

            alert("El usuario no existe");
            $("#usuario").focus();
            $("#usuario").val('');
            $("#password").val('');

        }

    });

});


//Funcion para registrar el usuario
$('#formUsuario').submit(function (e) {
    
    //Se previene el evento
    e.preventDefault();


    var usuario = $('#txt_usuario').val();
    var contra = $('#txt_password').val();
    var nombre = $('#txt_nombre').val();

    $.post("../controlador/login_controlador.php?op=registrar", {usuario: usuario, pass: contra, nombre: nombre}, function (data)
    {

        if (data === "true") {

            alert("Usuario registrado correctamente");
            //Se oculta el modal de resgistro
            $('#exampleModal').modal('hide');
            //Se limpiar los campos del formulario
            limpiar();

        } else {

            alert("Usuario no se pudo registrar");

        }

    });

});

//Funcion para limpiar los campos despues de insertar
function limpiar() {

    $('#txt_usuario').val("");
    $('#txt_password').val("");
    $('#txt_nombre').val("");

}
