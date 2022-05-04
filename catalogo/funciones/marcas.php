<?php

    ######  CRUD de marcas

    function listarMarcas() : bool | mysqli_result
    {
        $link = conectar();
        $sql = "SELECT idMarca, mkNombre
                    FROM marcas";
        try {
            $resultado = mysqli_query( $link, $sql );
        }catch ( Exception $e ){
            echo $e->getMessage();
            return false;
        }
        return $resultado;

    }

/*
 * listarMarcas()
    verMarcaPorID()
    agregarMarca()
    modificarMarca()
    eliminarMarca()
 * */