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