<?php
    //require 'config/config.php';
    require 'funciones/conexion-local.php';
    require 'funciones/productos.php';
    $check = modificarProducto( );
    $css = 'danger';
    $mensaje = 'No se pudo modificar el producto.';
    if ( $check ){
        $css = 'success';
        $mensaje = 'Producto modificada correctamente.';
    }
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container py-4">
        <h1>Modificación de un producto</h1>

        <div class="alert alert-<?= $css ?> p-4 col-8 mx-auto shadow">
            <?= $mensaje ?>
            <a href="adminProductos.php" class="btn btn-outline-secondary">
                Volver a panel de productos
            </a>
        </div>
        
    </main>

<?php
    include 'layout/footer.php';
?>