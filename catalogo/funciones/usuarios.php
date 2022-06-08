<?php


    function listarUsuarios()
    {
        $link = conectar() ;
        $sql='Select idUsuario
                ,nombre
                ,apellido
                ,email
                ,usuarios.idRol
                ,roles.rol
           FROM usuarios
           JOIN roles ON roles.idRol = usuarios.idRol';
        try {
            $resultado = mysqli_query($link,$sql);
            return $resultado ;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
            return false;
        }
        return $resultado ;

    }

    function agregarUsuario()
    {
        $nombre = $_POST['nombre'];
        $apellido = $_POST['apellido'];
        $email = $_POST['email'];
        $clave = $_POST['clave']; // clave sin encriptar
        $idRol = 2;

        $claveHash = password_hash($clave, PASSWORD_DEFAULT);

        $link = conectar();
        $sql = "INSERT INTO usuarios
                    VALUES 
                        ( DEFAULT,
                             '".$nombre."',
                             '".$apellido."',
                             '".$email."',
                             '".$claveHash."',
                             ".$idRol."
                        )";
        try {
            $resultado = mysqli_query( $link, $sql );
        }catch ( Exception $e ){
            echo $e->getMessage();
            return false;
        }
        return $resultado;
    }

function modificarUsuario()
{
    $idUsuario = $_POST['idUsuario'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $email = $_POST['email'];
    $link = conectar();
    $sql="UPDATE usuarios
            SET nombre = '". $nombre."' 
                ,apellido ='". $apellido ."'
                ,email = '". $email ."'";
    if ( isset($_POST['idRol']) ){
           $sql .= ",idRol = ".  $_POST['idRol'];
    }
           $sql .= " WHERE idUsuario =" .$idUsuario;
    try {
        $resultado = mysqli_query($link,$sql);
        $_SESSION['nombre'] = $nombre;
        $_SESSION['apellido'] = $apellido;
        $_SESSION['email'] = $email;
        return $resultado;
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
        return false;
    }

}