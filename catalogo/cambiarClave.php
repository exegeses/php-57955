<?php

    require 'config/config.php';
    require 'funciones/conexion.php';
    require 'funciones/usuarios.php';
    $usuario = validarCodigoCambioClave();
    include 'layout/header.php';
    include 'layout/nav.php';
?>

    <main class="container py-4">
        <h1>Modificación de contraseña</h1>

        <div class='alert bg-light p-4 col-8 mx-auto shadow'>
            <div class="p-3">
                <?= $usuario['nombre'] ?>
                <?= $usuario['apellido'] ?> -
                <?= $usuario['email'] ?>
            </div>
            <form action="modificarRestaurarClave.php" method="post" class="validarForm">

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
                <input type="hidden" name="email" value="<?= $usuario['email'] ?>">

                <button class='btn btn-dark my-3 px-4'>Modificar contraseña</button>
            </form>
        </div>

        <script>
            let form = document.querySelector('.validarForm');
            let newClave = document.querySelector('#newClave');
            let newClave2 = document.querySelector('#newClave2');
            let msjNewClave = document.querySelector('#msjNewClave');
            msjNewClave.style.display = 'none';
            let msjNewClave2 = document.querySelector('#msjNewClave2');
            msjNewClave2.style.display = 'none';

            form.addEventListener('submit', validarFormulario );
            function validarFormulario( evento) {
                let flag = true;
                evento.preventDefault(); //evitamos envío del form

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


    </main>

<?php
include 'layout/footer.php';
?>