<?php

    $n = 1;
    while ( $n < 15 )
    {
        //bloque de código a iterar
        echo $n, '<br>';
        $n++;//$n = $n + 1;
    }
?>
<hr>
<?php
    $telefonos = [
        'Samsung', 'Motorola', 'LG',
        'Galaxy', 'Nokia', 'iPhone',
        'Huawei', 'Xiaomi'
    ];
    $i = 0;
    $cantidad = count($telefonos);
    echo '<ul>';
    while( $i < $cantidad )
    {
        echo '<li>', $telefonos[$i], '</li>';
        $i++;
    }
    echo '</ul>';
?>