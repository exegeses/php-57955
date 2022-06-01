<?php
    //directiva de sesión
    session_start();

    //registrar variables de sesión
    $_SESSION['nombre'] = 'marcos';
    $_SESSION['numero'] = 665;

    //nombre|s:6:"marcos";numero|i:666;
    //serializado