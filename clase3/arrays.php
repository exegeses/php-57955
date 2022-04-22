<?php

    $telefonos = [
        'Samsung', 'Motorola', 'LG',
        'Galaxy', 'Nokia', 'iPhone',
        'Huawei', 'Xiaomi'
    ];

    echo '<pre>';
    print_r($telefonos);
    echo '</pre>';
?>
<hr>
<?php

    $telefonos = [
        5 => 'Samsung', 'Motorola',
        9 => 'LG', 'Galaxy',
        'Nokia', 'iPhone',
        'Huawei', 'Xiaomi'
    ];

    echo '<pre>';
    print_r($telefonos);
    echo '</pre>';
?>
<hr>
<?php
    //array asociativo
    $telefonos = [
        'Samsung' => 'A30',
        'Motorola' => 'G9',
        'LG' => 'L40',
        'Galaxy' => 'S10',
        'Nokia' => '1100',
        'iPhone' => 'X12',
        'Huawei' => 'NOse',
        'Xiaomi' =>  'MI',
        'Samsung' => 'S9'
    ];

    echo '<pre>';
    print_r($telefonos);
    echo '</pre>';
?>