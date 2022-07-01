<?php
    require 'config/config.php';
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container">
        <h1>Ingreso a sistema</h1>

        <div class="alert bg-light p-4 col-8 mx-auto shadow">
            <form action="login.php" method="post">

                <label for="email">Usuario (email)</label>
                <input type="email" name="email"
                       class='form-control' id="email" required>
                <br>
                <label for="clave">Contraseña</label>
                <input type="password" name="clave"
                       class='form-control' id="clave" required>
                <br>
                <button class="btn btn-dark my-2 px-4">
                    Ingresar
                </button>
            </form>
        </div>

<?php
        if(  isset( $_GET["error"] ) ){
            $msjError='Debe acceder con su usuario y contraseñar';
            if ( $_GET["error"] == 1 ){
                $msjError='Usuario y/o contraseña incorrectos.';
            }
?>
            <div class="alert bg-light text-danger p-4 col-8 mx-auto shadow">
                <?= $msjError ?>
                <a href="formResetPass.php" class="btn btn-outline-secondary">
                    resetear clave
                </a>
            </div>
<?php
        }
?>

    </main>

<?php  include 'layout/footer.php';  ?>