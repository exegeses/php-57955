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