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

    function subirImagen()
    {
        //si no enviaron imagen
        $prdImagen = 'noDisponible.png';

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