<?php

    /* capturamos datos enviados por el form */
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $comentarios = $_POST['comentarios'];

    $destinatario = 'goku@dropjar.com';
    $asunto = 'Email enviado por Empresa';
    $cuerpo = '<div style="width: 500px; font-family: arial;';
    $cuerpo .= 'background-color: #fbfb71; padding: 24px; font-size: 20px">';
    $cuerpo .= 'Nombre: <span style="background-color: #fff">'.$nombre.'</span><br>';
    $cuerpo .= 'Email: <span style="background-color: #fff">'.$email.'</span><br>';
    $cuerpo .= 'Comentarios: <span style="background-color: #fff">'.$comentarios.'</span>';
    $cuerpo .= '</div>';

    ## encabezados adicionales
    $headers = 'From: consultas@empresa.com' . "\r\n";
    $headers .= 'Reply-To: '.$email."\r\n";
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";

    mail( $destinatario, $asunto, $cuerpo, $headers );

    echo 'Gracias '.$nombre.' por contactarnos';