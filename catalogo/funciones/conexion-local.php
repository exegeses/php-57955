<?php

    const SERVER  = 'localhost';
    const USUARIO = 'root';
    const CLAVE   = 'root';
    const BASE    = 'catalogo57955';

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