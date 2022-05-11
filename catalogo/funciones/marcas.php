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

    function verMarcaPorID()
    {
        $idMarca = $_GET['idMarca'];
        $link = conectar();
        $sql='SELECT idMarca, mkNombre
                FROM marcas 
                WHERE idMarca = '. $idMarca;
        try {
            $resultado = mysqli_query( $link, $sql );
            $marca = mysqli_fetch_assoc($resultado);
        }catch ( Exception $e ){
            echo $e->getMessage();
            return false;
        }
        return $marca;
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

    function modificarMarca()
    {
        $idMarca = $_POST['idMarca'];
        $mkNombre = $_POST['mkNombre'];
        $link = conectar();
        $sql="UPDATE marcas
                 SET mkNombre = '". $mkNombre ."' 
                WHERE idmarca = ".  $idMarca;
        try {
            $resultado = mysqli_query($link,$sql);
            return $resultado ;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
            return false;
        }
    }

    /**
     * función para verificar si hay productos
     * asignados a una marca
     * @return int
     */
    function verificarProdPorMarca()
    {
        $idMarca = $_GET['idMarca'];
        $link = conectar();
        $sql = "SELECT 1 FROM productos
                    WHERE idMarca = ".$idMarca;
        try {
            $resultado = mysqli_query($link,$sql);
            $cantidad = mysqli_num_rows($resultado);
            return $cantidad;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
            return 0;
        }
    }

    function eliminarMarca()
    {
        $idMarca = $_POST['idMarca'];
        $link = conectar();
        $sql="DELETE FROM marcas
                WHERE idMarca =".  $idMarca;
        try {
            $resultado = mysqli_query($link,$sql);
            return $resultado ;
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