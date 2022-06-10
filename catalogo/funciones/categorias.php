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
    function verCategoriaPorID() : array | false
    {
        $idCategoria = $_GET['idCategoria'];
        $link = conectar();
        $sql = "SELECT idCategoria, catNombre
                        FROM categorias
                    WHERE idCategoria = ".$idCategoria;
        try {
            $resultado = mysqli_query( $link, $sql );
            $categoria = mysqli_fetch_assoc( $resultado );
            return $categoria;
        }catch ( Exception $e ){
            echo $e->getMessage();
            return false;
        }

    }

    /*
     * listarCategorias()
        verCategoriaPorID()
        agregarCategoria()
        modificarCategoria()
        eliminarCategoria()
     * */