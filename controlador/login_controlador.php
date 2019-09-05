<?php

session_start();
require_once "../modelo/login_modelo.php";

//Se hereda la clase del modelo login_modelo
$usuario = new Usuario();

//Se crea un switch para controlar los eventos
switch ($_GET["op"]) {

    //verificar usuario
    case 'verificar':

        $logina = $_POST['usuario'];
        $clavea = $_POST['pass'];

        $rspta = $usuario->verificar($logina, $clavea);

        $fetch = $rspta->fetch_object();

        if (isset($fetch)) {

            $_SESSION['id_usuario'] = $fetch->usu_intId;
            $_SESSION['usuario'] = $fetch->usu_varUsuario;
            $_SESSION['nombre'] = $fetch->usu_varNombreCompleto;
        }

        echo json_encode($fetch);

        break;

    //Registrar usuario
    case 'registrar':

        $usu = $_POST['usuario'];
        $contra = $_POST['pass'];
        $nombre = $_POST['nombre'];

        $rspta = $usuario->registrar($usu, $contra, $nombre);

        echo json_encode($rspta);
        break;

    //Select usuario
    case 'select':

        $id = $_POST['id_user'];

        $rspta = $usuario->select($id);

        echo json_encode($rspta);
        break;

    //Editar usuario
    case 'editar':

        $usu = $_POST['usuario'];
        $nombre = $_POST['nombre'];
        $id_user = $_POST['id_user'];

        $rspta = $usuario->editar($usu, $nombre, $id_user);

        echo json_encode($rspta);
        break;

    //salir para destruir la sesion
    case 'salir':
        //Limpiamos las variables de sesión   
        session_unset();
        //Destruìmos la sesión
        session_destroy();

        break;
}