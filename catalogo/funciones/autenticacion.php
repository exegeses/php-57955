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
                // sesiones

                //redirección a admin
                echo 'este es el admin';
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
    {}

    function autenticar()
    {}

    //function esAdmin()