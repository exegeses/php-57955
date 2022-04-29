<?php
    require 'funciones/conexion.php';
    require 'funciones/marcas.php';
    $marcas = listarMarcas();
    include 'layout/header.php';
?>
<main class="container py-3">
    <h1>Listado de marcas</h1>

    <ul class="list-group col-6">
<?php
    while( $marca = mysqli_fetch_assoc( $marcas ) )
    {
?>
        <li class="list-group-item list-group-item-action">
            <?= $marca['idMarca'] ?>
            <?= $marca['mkNombre'] ?>
        </li>
<?php
    }
?>
    </ul>

</main>
<?php
    include 'layout/footer.php';
?>