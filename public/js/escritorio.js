//Funcion que se ejecuta al principio
function init(){
    
    select();
    
}

//Funcion para realizar el select de la info del usuario logeado
function select(){
    
    var id_user = $('#user_id').val();
    
    $.post("../controlador/login_controlador.php?op=select", {id_user: id_user}, function (data)
    {
        
        data = JSON.parse(data);
        
        $('#usuario_txt').val(data.usu_varUsuario);
        $('#nombre_txt').val(data.usu_varNombreCompleto);
    
    });
    
}

//Funcion para editar la info del usuario logeado
$('#form').submit(function (e) {
    //Se previene el evento
    e.preventDefault();

    var usuario = $('#usuario_txt').val();
    var nombre = $('#nombre_txt').val();
    var id_user = $('#user_id').val();

    $.post("../controlador/login_controlador.php?op=editar", {usuario: usuario, nombre: nombre, id_user: id_user}, function (data)
    {
        
        //Si es null la info no se pudo actualizar / se controla el error
        if (data === "null"){
            
            alert("La informacion no se pudo actualizar");
            
        }
        //Se controla que se haya editado correctamente
        else {
            
            alert("Informacion editada correctamente");
            
            //Se quema la session activa
            $.post("../controlador/login_controlador.php?op=salir");
            
            //Se redirecciona al login
            $(location).attr("href", "login.html");
        }
        

    });

});

init();