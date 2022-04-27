<?php
    //declaración
    function negrita( string $frase ) : string
    {
        return '<b>'. $frase. '</b><br>';
    }

    function calcularCuadrado( float|int $numero ) : float|int
    {
        $resultado = $numero * $numero;
        return $resultado;
    }


    //llamado a ejecución
    echo negrita('PHP y mySQL');
    echo negrita('Hola Mundo');
    echo negrita(26);
?>
<hr>
<?= calcularCuadrado( 22 ) ?>
<hr>
<?= negrita( calcularCuadrado( 22 ) ) ?>
