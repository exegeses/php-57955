<?php
    require 'config/config.php';
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container py-4">
        <h1>¡Advertencia!</h1>

        <p class="alert shadow col-8 mx-auto ">

            <br><?= $_SESSION['origen'] ?><br>
<?php
/*    switch ( $_SESSION['origen'] ){
        case '/catalogo/adminUsuarios.php';
            $mensaje = 'No puede eliminar un producto';
            break;
        default:
            $mensaje = 'Debe ser administrador para realizar esta tarea.';
    }*/

    $mensaje = match( $_SESSION['origen'] )
    {
        '/catalogo/adminUsuarios.php' => 'No puede modificar o eliminar usuarios',
        default => 'Debe ser administrador para realizar esta tarea.'
    };

            echo $mensaje;
?>
        </p>

    </main>

<?php
    include 'layout/footer.php';
?>