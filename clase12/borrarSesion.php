<?php
    session_start();

    //borrar una variable de sesión
    unset($_SESSION['numero']);

    //borrar TODAS las variables de sesi´on
    session_unset();

    //eliminar sesión
    session_destroy();
