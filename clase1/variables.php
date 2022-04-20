<?php
    $numero = 42;
    $curso = 'PHP y mySQL';
?>
<br>
<?php
    // cuando imprimimos varios elemento, separemos con ","
    echo 'El número es: ', $numero;
    $numero = 'sarasa';
    echo '<br>El número es: ', $numero;
?>
<br>
<?php
    //ejemplo de concatenaci´´on
    $precioMax = 5000;
    $sql = "SELECT prdNombre, prdPrecio 
                FROM productos
                WHERE prdPrecio <= " . $precioMax;