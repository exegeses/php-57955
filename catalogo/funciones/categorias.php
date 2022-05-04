<?php

    ######  CRUD de categorías

    function listarCategorias() : bool | mysqli_result
    {
        $link = conectar();
        $sql = "SELECT idCategoria, catNombre
                        FROM categorias";
        try {
            $resultado = mysqli_query( $link, $sql );
        }catch ( Exception $e ){
            echo $e->getMessage();
            return false;
        }
        return $resultado;
    }

    /*
     * listarCategorias()
        verCategoriaPorID()
        agregarCategoria()
        modificarCategoria()
        eliminarCategoria()
     * */