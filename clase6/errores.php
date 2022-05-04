<?php

    $x = 5;

    try{
        $resultado = $x / 'manzana';
    } catch ( Error $e ){
        //redirección
        $mensaje =  'Mensaje: '. $e->getMessage()."\n";
        $mensaje .= 'Archivo: '. $e->getFile()."\n";
        $mensaje .= 'Línea nro: '. $e->getLine()."\n";

        //abrir archivo + setear modo
        $fh = fopen( 'errores.log', 'a+' );
        fwrite( $fh, $mensaje );
        fclose( $fh );

    }