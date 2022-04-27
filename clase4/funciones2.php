<?php
    //función para dividir dos n´´umeros enteros
    function dividir( float $num1, float $num2 ) : float|string
    {
        if( is_numeric($num1) && is_numeric($num2) ){
            if( $num2 != 0 ){
                $resultado = $num1 / $num2;
                return $resultado;
            }
            return 'El divisor no puede ser 0';
        }
        return 'Ambos deben ser números';

    }

    echo dividir( 5, 4.75 );