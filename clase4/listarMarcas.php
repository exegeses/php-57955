<?php

    //conexión a server + selección de BDD
    $link = mysqli_connect(
                'localhost',
                'root',
                'root',
                'catalogo2022'
            );

    //creación de mansaje SQL
    $sql = "SELECT idMarca, mkNombre
                FROM marcas";
    //ejecución de mensaje SQL
    $resultado = mysqli_query( $link, $sql );

    //función intermedia
    while ( $marca = mysqli_fetch_assoc( $resultado ) )
    {
        echo $marca['idMarca'], ' ', $marca['mkNombre'], '<br>';
    }