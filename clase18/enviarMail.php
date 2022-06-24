<?php

    $destinatario = 'goku@drop.com';
    $asunto = 'Probando email';
    $cuerpo = '<div style="width: 500px; font-family: arial;';
    $cuerpo .= 'background-color: #fbfb71; padding: 24px; font-size: 20px">';
    $cuerpo .= 'Estamos probando <span style="background-color: #fff">email</span>';
    $cuerpo .= ' con From y color';
    $cuerpo .= '</div>';

    ## encabezados adicionales
    $headers = 'From: goku@argentina.gob.ar.com' . "\r\n";
    $headers .= "MIME-Version: 1.0" . "\r\n";
    $headers .= "Content-type: text/html; charset=UTF-8" . "\r\n";

    mail( $destinatario, $asunto, $cuerpo, $headers );
