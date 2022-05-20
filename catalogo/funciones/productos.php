<?php

######  CRUD de productos

    function listarProductos()
    {
        $link = conectar() ;
        $sql='SELECT idProducto
                    ,prdNombre
                    ,prdPrecio
                    ,productos.IdMarca
                    ,mkNombre
                    ,productos.idCategoria
                    ,catNombre
                    ,prdDescripcion
                    ,prdImagen
                    ,prdActivo
               FROM productos
               JOIN marcas ON marcas.idMarca = productos.idMarca
               JOIN categorias ON categorias.idCategoria = productos.idCategoria';

        try {
            $resultado = mysqli_query( $link, $sql );
        }catch ( Exception $e ){
            echo $e->getMessage();
            return false;
        }
        return $resultado ;
    }

    function buscarProductos()
    {
        $buscar = '';
        if ( isset($_GET['buscar']) ){
            $buscar = $_GET['buscar'];
        }
        $sqlwhere = '';
        if ( isset($_GET['idMarca']) ){
            $idMarca = $_GET['idMarca'];
            $sqlwhere =  " AND (".$idMarca." = 0 OR productos.idMarca = ". $idMarca .") ";
        }
        if ( isset($_GET['idCategoria']) ){
            $idCategoria = $_GET['idCategoria'];
            $sqlwhere .=  " AND (".$idCategoria." = 0 OR productos.idCategoria = ". $idCategoria .") ";
        }
        $link = conectar();
        $sql = "SELECT idProducto
                    ,prdNombre
                    ,prdPrecio
                    ,productos.idMarca
                    ,mkNombre
                    ,productos.idCategoria
                    ,catNombre
                    ,prdDescripcion
                    ,prdImagen
                    ,prdActivo
               FROM productos
               JOIN marcas ON marcas.idMarca = productos.idMarca
               JOIN categorias ON categorias.idCategoria = productos.idCategoria
               WHERE prdNombre LIKE '%".$buscar."%'";

        $sql .= $sqlwhere;

        try {
            $resultado = mysqli_query( $link, $sql );
        }catch ( Exception $e ){
            echo $e->getMessage();
            return false;
        }
        return $resultado ;
    }


    function verProductoPorID()
    {
        $idProducto = $_GET['idProducto'];
        $link = conectar();
        $sql='SELECT idProducto
                    ,prdNombre
                    ,prdPrecio
                    ,productos.idMarca
                    ,mkNombre
                    ,productos.idCategoria
                    ,catNombre
                    ,prdDescripcion
                    ,prdImagen
                    ,prdActivo
               FROM productos
               JOIN marcas ON marcas.idMarca = productos.idMarca
               JOIN categorias ON categorias.idCategoria = productos.idCategoria
               WHERE idProducto = '.$idProducto;
        try {
            $resultado = mysqli_query($link,$sql);
            $producto = mysqli_fetch_assoc($resultado);
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
            return false;
        }
        return $producto;
    }

    function subirImagen()
    {
        //si no enviaron imagen en agregarProducto()
        $prdImagen = 'noDisponible.png';

        //si no enviaron imagen en modificarProducto()
        if( isset( $_POST['imgActual'] ) ){
            $prdImagen = $_POST['imgActual'];
        }

        // si ENVIARON imagen
        if( $_FILES['prdImagen']['error'] == 0 ){

            $tmp = $_FILES['prdImagen']['tmp_name'];
            ## renombramos archivo
            $ext = pathinfo( $_FILES['prdImagen']['name'], PATHINFO_EXTENSION );
            $prdImagen = time().'.'.$ext; //1686848185.jpg
            $path = 'productos/';
            ##### movemos archivo
            move_uploaded_file($tmp, $path.$prdImagen);
        }

        return $prdImagen;
    }

    function agregarProducto()
    {
        //capturamos datos enviador por el form
        $prdNombre = $_POST['prdNombre'];
        $prdPrecio = $_POST['prdPrecio'];
        $idMarca = $_POST['idMarca'];
        $idCategoria = $_POST['idCategoria'];
        $prdDescripcion = $_POST['prdDescripcion'];
        // subirImagen
        $prdImagen = subirImagen();

        $link = conectar();
        //mensaje sql
        $sql="INSERT INTO productos (
                                prdNombre
                                ,prdPrecio
                                ,idMarca
                                ,idCategoria
                                ,prdDescripcion
                                ,prdImagen
                                ,prdActivo
                                )
                    VALUES (
                                '".$prdNombre."', 
                                $prdPrecio,
                                $idMarca,
                                $idCategoria, 
                                '".$prdDescripcion."',
                                '".$prdImagen."',
                                 1 
                           )";
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

    function modificarProducto()
    {
        $idProducto = $_POST['idProducto'];
        $prdNombre = $_POST['prdNombre'];
        $prdPrecio = $_POST['prdPrecio'];
        $idMarca = $_POST['idMarca'];
        $idCategoria = $_POST['idCategoria'];
        $prdDescripcion = $_POST['prdDescripcion'];

        $prdImagen = subirImagen();// ver*
        //$prdImagen = ( $_FILES['prdImagen']['error'] == 0 )? subirImagen() : 'noDisponible.png';

        $link = conectar();
        $sql="UPDATE productos
                SET prdNombre = '". $prdNombre."' 
                    ,prdPrecio = ".$prdPrecio."
                    ,idMarca =   ".$idMarca." 
                    ,idCategoria = ".$idCategoria." 
                    ,prdDescripcion = '".$prdDescripcion."' 
                    ,prdImagen =  '".$prdImagen ."' 
                WHERE idProducto = ".$idProducto;
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

    function eliminarProducto()
    {
        $idProducto = $_POST['idProducto'];
        $link = conectar();
        $sql="DELETE FROM productos
                WHERE idProducto = ".$idProducto;
        try {
            $resultado = mysqli_query($link, $sql);
            return $resultado;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
            return false;
        }

    }