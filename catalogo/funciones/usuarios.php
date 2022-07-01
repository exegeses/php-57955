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
                             ".$idRol.",
                             ''
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

function generarCodigo( $length = 24 )
{
    $chars = [
                "a", "b", "c", "d", "e", "f", "g", "h", "i", "j", "k", "l", "m", "n", "o", "p", "q", "r", "s", "t", "u", "v", "w", "x", "y", "z",
                "A","B","C","D","E","F","G","H","I","J","K","L","M","N","O","P","Q","R","S","T","U","V","W","X","Y","Z",
                1,2,3,4,5,6,7,8,9,0
            ];
    $codigo = '';
    $lChars = count($chars)-1;
    for( $n = 0; $n < $length; $n++ )
    {
        $codigo .= $chars[ rand( 0, $lChars) ];
    }
    return $codigo;
}

function mailCodigo( $email, $codigo )
{
    $asunto = 'Pedido de reseteo de contraseña';
    $cuerpoMail = '<div>';
    $cuerpoMail .= 'hacer click ';
    $url = 'http://php-57955.curso:8080/catalogo/';
    $url = 'https://php-57955.000webhostapp.com/';
    $file = 'cambiarClave.php';
    $cadena = '?codigo='.$codigo;
    $cuerpoMail .= '<a href="'.$url.$file.$cadena.'">';
    $cuerpoMail .= 'y cambiar contraaseña </a>"';
    $cuerpoMail .= '<div>';
    $headers ='From:  empresa@mail.com'."/r/n";
    $headers .= 'MIME-Version: 1.0';
    $headers .= 'Content-type: text/html; charset=utf-8';
    mail($email, $asunto, $cuerpoMail, $headers);
}

function mailResetPass()
{
/*
* generar código 24 caracteres aleatorio
* guardar código en tabla usuarios
* enviar un email
  * con un link para cambiar la clave */
    $codigo = generarCodigo();
    $email = $_POST['email'];
    $link = conectar();

    $sql = "SELECT email 
                FROM usuarios
              WHERE email = '".$email."'";

    try {
        $resultado = mysqli_query($link, $sql);
        $cantidad = mysqli_num_rows($resultado);
        if( $cantidad == 0 ){
            /* redirecci´on a formulario de reset */
            header('location: formResetPass.php?error=1');
            return false;
        }
        $sql = "UPDATE usuarios 
                    SET recordarClave = '".$codigo."'
                    WHERE email = '".$email."'";
        try {
            $resultado = mysqli_query($link, $sql);

            /* envío de email */
            mailCodigo( $email, $codigo );
            return $resultado;

        }catch( Exception $e ){
            echo $e->getMessage();
            return false;
        }
    }catch( Exception $e ){
        echo $e->getMessage();
        return false;
    }
}
function validarCodigoCambioClave()
{
    $codigo = $_GET['codigo'];
    $link = conectar();
    $sql = "SELECT nombre, apellido, email
                FROM usuarios
                WHERE recordarClave = '". $codigo ."'";
    try {
        $resultado = mysqli_query($link, $sql);
        $cantidad = mysqli_num_rows($resultado);

        if( $cantidad == 0 ){
            /* redirecci´on a formulario de reset */
            header('location: formResetPass.php?error=1');
            return false;
        }
        $usuario = mysqli_fetch_assoc($resultado);
        return $usuario;

    }catch( Exception $e ){
        echo $e->getMessage();
        return false;
    }
}

function modificarRestaurarClave()
{
    $email = $_POST['email'];
    $newClave = $_POST['newClave'];
    $newClave2 = $_POST['newClave2'];
    if( $newClave == $newClave2 ){
        $link = conectar();
        $newclaveHash = password_hash( $newClave, PASSWORD_DEFAULT );
        $sql="UPDATE usuarios
                SET clave = '". $newclaveHash."' 
                WHERE email = '". $email."'";
        try{
            $resultado = mysqli_query($link, $sql);
            return $resultado;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
            return false;
        }
    }

}