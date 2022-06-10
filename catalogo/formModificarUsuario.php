<?php
    require 'config/config.php';
    require 'funciones/autenticacion.php';
        autenticar();
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container">
        <h1>Modificacíon de un usuario</h1>


        <div class='alert bg-light p-4 col-8 mx-auto shadow-sm'>
            <form action="modificarUsuario.php" method="post">

                <div class='form-group mb-2'>
                    <label for="nombre">Nombre</label>
                    <input type="text" name="nombre"
                           value="<?= $_SESSION['nombre'] ?>"
                           class='form-control' id="nombre" required>
                </div>
                <div class='form-group mb-2'>
                    <label for="apellido">Apellido</label>
                    <input type="text" name="apellido"
                           value="<?= $_SESSION['apellido'] ?>"
                           class='form-control' id="apellido" required>
                </div>
                <div class='form-group'>
                    <label for="email">Email</label>
                    <div class="input-group mb-4">
                        <div class="input-group-prepend">
                            <div class="input-group-text">@</div>
                        </div>
                        <input type="email" name="email"
                               value="<?= $_SESSION['email'] ?>"
                               class="form-control" id="email" required>
                    </div>
                </div>
                <input type="hidden" name="idUsuario" value="<?= $_SESSION['idUsuario'] ?>">

                <button class='btn btn-dark my-3 px-4'>Modificación usuario</button>
                <a href="adminUsuarios.php" class='btn btn-outline-secondary'>
                    Volver a panel de usuarios
                </a>
                <button type="button" class="btn btn-outline-secondary" id="btnCambiarClave">
                    Cambiar contraseña
                </button>
            </form>

        </div>


        <div id="formCambiarClave">
            <div class='alert bg-light p-4 col-8 mx-auto shadow'>
                <form action="modificarClave.php" method="post" class="validarForm">

                    <div class='form-group mb-4 has-validation'>
                        <label for="clave">Contraseña actual</label>
                        <input type="password" name="clave"
                               class='form-control' id="clave">
                        <div class="text-danger fs-6" id="msjClave">
                            Debe completar el campo Contraseña actual
                        </div>
                    </div>
                    <div class='form-group mb-2'>
                        <label for="newClave">Nueva contraseña</label>
                        <input type="password" name="newClave"
                               class='form-control' id="newClave">
                        <div class="text-danger fs-6" id="msjNewClave">
                            Debe completar el campo Nueva contraseña
                        </div>
                    </div>
                    <div class='form-group mb-3'>
                        <label for="newClave2">Repita contraseña</label>
                        <input type="password" name="newClave2"
                               class='form-control' id="newClave2">
                        <div class="text-danger fs-6" id="msjNewClave2">
                            Debe completar el campo Repita contraseña con un valor igual a Nueva contraseña
                        </div>
                    </div>

                    <button class='btn btn-dark my-3 px-4'>Modificar contraseña</button>
                    <a href="adminUsuarios.php" class='btn btn-outline-secondary'>
                        Volver a panel de usuarios
                    </a>
                </form>

            </div>

            <script>
                let form = document.querySelector('.validarForm');
                let clave = document.querySelector('#clave');
                let newClave = document.querySelector('#newClave');
                let newClave2 = document.querySelector('#newClave2');
                let msjClave = document.querySelector('#msjClave');
                msjClave.style.display = 'none';
                let msjNewClave = document.querySelector('#msjNewClave');
                msjNewClave.style.display = 'none';
                let msjNewClave2 = document.querySelector('#msjNewClave2');
                msjNewClave2.style.display = 'none';

                form.addEventListener('submit', validarFormulario );
                function validarFormulario( evento) {
                    let flag = true;
                    evento.preventDefault(); //evitamos envío del form
                    msjClave.style.display = 'none';
                    if( checkVacio( clave ) ){
                        msjClave.style.display = 'block';
                        flag = false;
                    }
                    msjNewClave.style.display = 'none';
                    if( checkVacio( newClave ) ){
                        msjNewClave.style.display = 'block';
                        flag = false;
                    }
                    msjNewClave2.style.display = 'none';
                    if( checkVacio( newClave2 ) ){
                        msjNewClave2.style.display = 'block';
                        flag = false;
                    }
                    if( checkRepite() ){
                        msjNewClave2.style.display = 'block';
                        flag = false;
                    }
                    if( flag ){
                        form.submit(); //enviamos formulario
                    }

                }
                function checkVacio(campo)
                {
                    if( campo.value == '' || campo.value == null ){
                        return true;
                    }
                    return false;
                }
                function checkRepite()
                {
                    if( newClave.value != newClave.value ){
                        //console.log('no coinciden');
                        return true;
                    }
                    return false;
                }

            </script>

            <script>
                let btnCambiarClave = document.querySelector('#btnCambiarClave');
                let formCambiarClave = document.querySelector('#formCambiarClave');
<?php
    $display = 'none';
    if( isset($_GET['error']) ){
        $display = 'block';
        if( $_GET['error'] == 1 ){ //contraseña actual
            $campo = 'clave';
            echo 'msjClave.innerText="Contraseña incorrecta";';
            echo 'msjClave.style.display = "block";';
        }
        else{
            $campo = 'newClave';
            echo 'msjNewClave.innerText="Las credenciales no coinciden";';
            echo 'msjNewClave.style.display = "block";';

        }
        echo $campo.'.focus();';
    }
?>
                formCambiarClave.style.display = '<?= $display ?>';

                btnCambiarClave.addEventListener('click', mostrarOcultarForm );
                function mostrarOcultarForm()
                {
                    if( formCambiarClave.style.display == 'none' )
                    {
                        formCambiarClave.style.display = 'block';
                    }
                    else{
                        formCambiarClave.style.display = 'none';
                    }
                }

            </script>


        </div>


    </main>

<?php  include 'layout/footer.php';  ?>