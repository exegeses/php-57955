<?php
    //capturamos archivo enviado
    $prdImagen = $_FILES['prdImagen'];
    //ver lo que se envió  /xampp/tmp/phpODFU7Q.tmp
    echo '<pre>';
    print_r($prdImagen);
    echo '</pre>';
    echo 'Nombre de archivo: ', $_FILES['prdImagen']['name'];
    echo '<hr>';

    ##### movemos archivo
    $tmp = $_FILES['prdImagen']['tmp_name'];
    $prdImagen = $_FILES['prdImagen']['name'];
    $path = 'productos/';
    move_uploaded_file($tmp, $path.$prdImagen);

