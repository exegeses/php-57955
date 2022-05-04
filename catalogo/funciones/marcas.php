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

    function agregarMarca( ) : bool
    {
        $mkNombre = $_POST['mkNombre'];
        $link = conectar();
        $sql="INSERT INTO marcas 
                    ( mkNombre )
                VALUES 
                    ('".$mkNombre."')";
        try {
            $resultado = mysqli_query($link,$sql);
            return $resultado;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
            return false;
        }

    }


/*
 * listarMarcas()
    verMarcaPorID()
    agregarMarca()
    modificarMarca()
    eliminarMarca()
 * */