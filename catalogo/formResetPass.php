<?php
    require 'config/config.php';
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container">
        <h1>Resetear mi contraseña</h1>

        <div class="alert bg-light p-4 col-8 mx-auto shadow">
            <form action="resetPass.php" method="post">

                <label for="email">Email</label>
                <input type="email" name="email"
                       class='form-control' id="email" required>
                <br>
                <button class="btn btn-dark my-2 px-4">
                    Enviar
                </button>
            </form>
        </div>

<?php
    if ( isset($_GET['error']) ){
?>
        <div class="alert bg-light p-4 text-danger col-8 mx-auto shadow">
            Email incorrecto, intente nuevamente.
        </div>
<?php
    }
?>

    </main>

<?php  include 'layout/footer.php';  ?>