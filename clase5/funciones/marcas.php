<?php

    ######  CRUD de marcas

    function listarMarcas() : bool | mysqli_result
    {
        $link = conectar();
        $sql = "SELECT idMarca, mkNombre
                    FROM marcas";
        $resultado = mysqli_query( $link, $sql );
        return $resultado;
    }

/*
 * listarMarcas()
    verMarcaPorID()
    agregarMarca()
    modificarMarca()
    eliminarMarca()
 * */