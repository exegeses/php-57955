<?php

    ######  CRUD de categorías

    function listarCategorias() : bool | mysqli_result
    {
        $link = conectar();
        $sql = "SELECT idCategoria, catNombre
                        FROM categorias";
        $resultado = mysqli_query( $link, $sql );
        return $resultado;
    }

    /*
     * listarCategorias()
        verCategoriaPorID()
        agregarCategoria()
        modificarCategoria()
        eliminarCategoria()
     * */