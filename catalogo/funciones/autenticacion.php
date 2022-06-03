<?php

    function login()
    {
        $email = $_POST['email'];
        $clave = $_POST['clave'];
        $link = conectar();
        $sql = "SELECT idUsuario, nombre, apellido, clave, idRol 
                    FROM usuarios
                    WHERE email = '".$email."'";
        try{
            $resultado = mysqli_query($link, $sql);
            $cantidad = mysqli_num_rows($resultado);
        }catch ( Exception $e ){
            echo $e->getMessage();
            return false;
        }
        // si cantidad == 0  -> usuario mal
        // si cantidad == 1  -> usuario ok
        if( $cantidad == 1 ){
            //verificar contraseña
            $usuario = mysqli_fetch_assoc($resultado);
            if( password_verify( $clave, $usuario['clave']) ){
                //acá ya sabemos que se logueó bien
                ###### RUTINA DE AUTENTICACIÓN
                $_SESSION['login'] = 1;
                #registramos otros datos del usuario
                $_SESSION['idUsuario'] = $usuario['idUsuario'];
                $_SESSION['nombre'] = $usuario['nombre'];
                $_SESSION['apellido'] = $usuario['apellido'];
                $_SESSION['idRol'] = $usuario['idRol'];
                //redirección a admin
                header('location: admin.php');
            }else{
                //redirección a formLogin
                header('location: formLogin.php?error=1');
            }
        }
        else{
            //redirección a formLogin
            header('location: formLogin.php?error=1');
        }

    }

    function logout()
    {
        //eliminamos variables de sesión
        session_unset();
        //eliminamos la sesión
        session_destroy();
        //redirección con demora a index
        header('refresh:3;url=index.php');
    }

    function autenticar()
    {
        if ( !isset($_SESSION['login']) ){
            header('location: formLogin.php?error=2');
        }
    }

    //function esAdmin()