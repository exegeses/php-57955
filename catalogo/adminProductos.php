<?php

    require 'config/config.php';
    require 'funciones/autenticacion.php';
        autenticar();
    require 'funciones/conexion.php';
    require 'funciones/marcas.php';
    require 'funciones/categorias.php';
    require 'funciones/productos.php';
    $marcas = listarMarcas();
    $categorias = listarCategorias();
    $productos = listarProductos();
	include 'layout/header.php';
	include 'layout/nav.php';
?>

    <main class="container">
        <h1>Panel de administración de productos</h1>

        <a href="admin.php" class="btn btn-outline-secondary my-2">
            Volver a dashboard
        </a>
        <div class="alert container p-3 m-3 mx-auto shadow">
            <form action="resultado.php" method="get" class="row">
            <div class="col-md-6">
                <input type="text" name="buscar" class="form-control">
            </div>
            <div class="col-md-2">
                <select name="idMarca" class="form-control">
                    <option value="0">Seleccione una marca</option>
<?php
            while ( $marca = mysqli_fetch_assoc( $marcas ) ){        
?>                      
                    <option value="<?= $marca['idMarca'] ?>"><?= $marca['mkNombre'] ?></option>
<?php
            }
?>                
                </select>
            </div>
            <div class="col-md-2">
                <select name="idCategoria" class="form-control">
                    <option value="0">Seleccione una categoría</option>
<?php
            while ( $categoria = mysqli_fetch_assoc( $categorias ) ){
?>
                    <option value="<?= $categoria['idCategoria'] ?>"><?= $categoria['catNombre'] ?></option>
<?php
            }
?>
                </select>
            </div>
            <div class="col">
                <button class="btn btn-outline-secondary">buscar</button>
            </div>
            </form>
        </div>

        <table class="table table-borderless table-striped table-hover">
            <thead>
                <tr>
                    <th>Imagen</th>
                    <th>Producto</th>
                    <th>Precio</th>
                    <th>Marca</th>
                    <th>Categoria</th>
                    <th>Presentación</th>
                    <th colspan="2">
                        <a href="formAgregarProducto.php" class="btn btn-outline-secondary">
                            Agregar
                        </a>
                    </th>
                </tr>
            </thead>
            <tbody>
<?php
            while ( $producto = mysqli_fetch_assoc( $productos ) )
            {
?>            
                <tr>
                    <td><img src="productos/<?= $producto['prdImagen'] ?>" class="img-thumbnail"></td>
                    <td><?= $producto['prdNombre'] ?></td>
                    <td><?= $producto['prdPrecio'] ?></td>
                    <td><?= $producto['mkNombre'] ?></td>
                    <td><?= $producto['catNombre'] ?></td>
                    <td><?= $producto['prdDescripcion'] ?></td>
                    <td>
                        <a href="formModificarProducto.php?idProducto=<?= $producto['idProducto'] ?>" class="btn btn-outline-secondary">
                            Modificar
                        </a>
                    </td>
                    <td>
                        <a href="formEliminarProducto.php?idProducto=<?= $producto['idProducto'] ?>" class="btn btn-outline-secondary">
                            Eliminar
                        </a>
                    </td>
                </tr>
<?php
            }
?>
            </tbody>
        </table>

        <a href="admin.php" class="btn btn-outline-secondary my-2">
            Volver a dashboard
        </a>

    </main>

<?php  include 'layout/footer.php';  ?>