<?php
//conexion a server  + seleccion de DBD

$link = mysqli_connect(
    'localhost',
    'root', // Nombre de usuario de la base de datos
    'root' , //contraseña
    'catalogo2022'//seleccion de base de datos
);

//Generar la consulta

$sql= "SELECT idProducto
                ,prdNombre
                ,prdPrecio
                ,productos.idMarca
                ,mkNombre
                ,productos.idCategoria
                ,catNombre
                ,prdDescripcion
                ,prdimagen
                ,prdActivo
                FROM productos 
                JOIN marcas 
                    ON marcas.idMarca = productos.idMarca
                JOIN categorias 
                    ON categorias.idCategoria = productos.idCategoria";
//ejecucion de mensajes sql
$resultadoProductos = mysqli_query($link, $sql);


//Funcion inermedia
//$marcaCategoria= mysqli_fetch_assoc($resultadoCategoria);

$texto = '';

$texto = '<table>
            <tr>
                <th>Imagen</th>    
                <th>Producto</th>
                <th>Marca</th>
                <th>Categoria</th>
                <th>Descripcion</th>
                <th>Precio</th>
                <th>Activo</th>								
            
        </tr>';

while ($arr_asoc = mysqli_fetch_assoc ($resultadoProductos))
		{
            $Activo = $arr_asoc['prdActivo'];
            $Acti = 'NO';
            if( $Activo == 1)
            {
                $Acti = 'SI';
            }
            $texto .= '<tr>';
            $texto .= '<td>'.$arr_asoc['prdimagen'].'</td>';
            $texto .= '<td>'.$arr_asoc['prdNombre'].'</td>';
            $texto .= '<td>'.$arr_asoc['mkNombre'].'</td>';
            $texto .= '<td>'.$arr_asoc['catNombre'].'</td>';
            $texto .= '<td>'.$arr_asoc['prdDescripcion'].'</td>';
            $texto .= '<td>'.$arr_asoc['prdPrecio'].'</td>';
            $texto .= '<td>'.$Acti.'</td>';
            $texto .= '</tr>';
            
		}

 
 $texto.= '</table>';
        echo $texto;

?>
