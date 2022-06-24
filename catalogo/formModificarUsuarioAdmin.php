<?php
    require 'config/config.php';
    require 'funciones/autenticacion.php';
        autenticar();
        noAdmin();
    require 'funciones/conexion-local.php';
    require 'funciones/usuarios.php';
    require 'funciones/roles.php';
    $usuario = verUsuarioPorId();
    $roles = listarRoles();
    include 'layout/header.php';
    include 'layout/nav.php';
?>

<main class="container">
    <h1>Modificación de un usuario</h1>


    <div class='alert bg-light p-4 col-8 mx-auto shadow-sm'>
        <form action="modificarUsuario.php" method="post">

            <div class='form-group mb-2'>
                <label for="nombre">Nombre</label>
                <input type="text" name="nombre"
                       value="<?= $usuario['nombre'] ?>"
                       class='form-control' id="nombre" required>
            </div>
            <div class='form-group mb-2'>
                <label for="apellido">Apellido</label>
                <input type="text" name="apellido"
                       value="<?= $usuario['apellido'] ?>"
                       class='form-control' id="apellido" required>
            </div>
            <div class='form-group'>
                <label for="email">Email</label>
                <div class="input-group mb-4">
                    <div class="input-group-prepend">
                        <div class="input-group-text">@</div>
                    </div>
                    <input type="email" name="email"
                           value="<?= $usuario['email'] ?>"
                           class="form-control" id="email" required>
                </div>
            </div>
            <div class="form-group mb-4">
                    <label for="idRol">Rol</label>
                    <select class="form-select" name="idRol" id="idRol" required>
                        <option selected value="">Seleccione un rol</option>
            <?php
                            while ($rol = mysqli_fetch_assoc ($roles))
                              {
                                  $selected='';
                                  if($usuario['idRol'] == $rol['idRol'])
                                  {
                                    $selected = 'selected';
                                  }
            ?>
                    <option <?= $selected ?> value="<?= $rol['idRol'] ?>"><?= $rol['rol'] ?></option>
            <?php
                              }
            ?>
                </select>
            </div>
            
            <input type="hidden" name="idUsuario" value="<?= $usuario['idUsuario'] ?>">

            <button class='btn btn-dark my-3 px-4'>Modificación usuario</button>
            <a href="adminUsuarios.php" class='btn btn-outline-secondary'>
                Volver a panel de usuarios
            </a>
        </form>

    </div>


</main>

<?php  include 'layout/footer.php';  ?>