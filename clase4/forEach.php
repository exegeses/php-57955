<?php

    $locaciones =
    [
        'angkor', 'azul', 'basil', 'burj',
        'colosseo', 'easter', 'eiffel',
        'gizah', 'ha-long', 'liberty',
        'machu', 'opera', 'palace', 'petra',
        'sagrada', 'santorini', 'taj',
        'wall'
    ];

    //foreach ( $contenedor as $aux )
    foreach ( $locaciones  as  $locacion )
    {
        echo $locacion, '<br>';
    }
    echo '<hr>';
    //foreach ( $contenedor as $llave => $valor )
    foreach ( $locaciones  as  $llave => $locacion )
    {
        echo $llave,': ', $locacion, '<br>';
    }