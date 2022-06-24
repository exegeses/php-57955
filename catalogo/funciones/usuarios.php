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

function verUsuarioPorId()
{
    $idUsuario = $_GET['idUsuario'];
    $link = conectar();
    $sql='SELECT idUsuario
                ,nombre
                ,apellido
                ,email
                ,usuarios.idRol
                ,rol
            FROM usuarios
            JOIN roles ON roles.idRol = usuarios.idRol
            WHERE  idUsuario = '.$idUsuario;
    try {
        $resultado = mysqli_query($link,$sql);
        $usuario = mysqli_fetch_assoc($resultado);
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
        return false;
    }
    return $usuario;

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
        if( $_SESSION['idRol'] != 1 ){
            $_SESSION['nombre'] = $nombre;
            $_SESSION['apellido'] = $apellido;
            $_SESSION['email'] = $email;
        }
        return $resultado;
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
        return false;
    }
}

function modificarClave()
{
    //capturamos clave enviada SIN encriptar
    $clave = $_POST['clave'];
    /** obtenemos la contraseña encriptada  **/
    $link = conectar();
    $sql = "SELECT clave 
                FROM usuarios
                WHERE idUsuario = ". $_SESSION['idUsuario'];
    try {
        $resultado = mysqli_query($link, $sql);
    }catch( Exception $e ){
        echo $e->getMessage();
        return false;
    }

    //obtenemos clave encriptada
    $usuario = mysqli_fetch_assoc($resultado);
    $claveHash = $usuario['clave'];
    //compraramos claves
    if ( password_verify( $clave , $claveHash ) ){
        //coinciden envio con base
            //capturamos newClave y newClave2
        $newClave = $_POST['newClave'];
        $newClave2 = $_POST['newClave2'];
        if( $newClave == $newClave2 ){
            //encriptamos newClave
            $newClaveHash = password_hash( $newClave, PASSWORD_DEFAULT );
            //modificamos clave en tabla usuarios
            $sql = "UPDATE usuarios 
                        SET clave = '".$newClaveHash."'
                        WHERE idUsuario = ".$_SESSION['idUsuario'];
            try {
                $resultado = mysqli_query($link, $sql);
                return $resultado;
            }catch( Exception $e ){
                echo $e->getMessage();
                return false;
            }
        }
        //si no coinciden las nuevas, redirección a formulario de modificación de clave
        header('location: formModificarUsuario.php?error=2');
        return false;
    }
    // la clave anterior no coincide
    header('location: formModificarUsuario.php?error=1');
}