<?php

    const SERVER  = 'localhost';
    const USUARIO = 'id19113324_marcos';
    const CLAVE   = '&+_M1wgRpCzE\82f';
    const BASE    = 'id19113324_catalogo';

    function conectar() : mysqli
    {
        $link = mysqli_connect(
            SERVER,
            USUARIO,
            CLAVE,
            BASE
        );
        return $link;
    }