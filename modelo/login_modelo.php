<?php

//Incluímos inicialmente la conexión a la base de datos
require "../config/Conexion.php";

Class Usuario {

    //Implementamos nuestro constructor
    public function __construct() {
        
    }

    //Metodo para verificar el acceso al sistema
    public function verificar($login, $clave) {
        $sql = "SELECT * FROM tbl_usuario WHERE usu_varUsuario='$login' AND usu_varContrasena='$clave'";
        
        return ejecutarConsulta($sql);
    }

    //Metodo para registrar el usuario
    public function registrar($usu, $contra, $nombre){
        $sql = "INSERT INTO tbl_usuario(usu_varUsuario, usu_varContrasena, usu_varNombreCompleto) ".
                "VALUES ('$usu','$contra','$nombre')";
        
        return ejecutarConsulta($sql);
        
    }
    
    //Metodo para taer informacion del usuario logeado
    public function select($id_user){
        
        $sql = "SELECT * FROM tbl_usuario WHERE usu_intId='$id_user'";
        
        return ejecutarConsultaSimpleFila($sql);

    }
    
    //Metodo para editar el usuario
    public function editar($usu, $nombre, $id_user){
        
        $sql = "UPDATE tbl_usuario SET usu_varUsuario='$usu',"
                . "usu_varNombreCompleto='$nombre' "
                . "WHERE usu_intId='$id_user'";
        
        return ejecutarConsulta($sql);
        
    }        
    
}
