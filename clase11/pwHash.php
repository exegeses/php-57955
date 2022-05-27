<?php

    $clave = 'manzana';
    $claveHash = password_hash( $clave, PASSWORD_DEFAULT );
    echo $claveHash;

    echo '<br>';
    $claveHash = password_hash( $clave, PASSWORD_DEFAULT );
    echo $claveHash;

