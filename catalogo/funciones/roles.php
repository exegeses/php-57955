<?php


function listarRoles() 
{
    $link = conectar() ;
    $sql='Select idRol
                ,rol
           From roles';
          // echo  $sql;
    try {
            $resultado = mysqli_query($link,$sql);
            return $resultado ;
        }
        catch(Exception $e)
        {
            echo $e->getMessage();
            return false;
        }
    return $resultado ;

    //Return False en caso de error
    //

}

function verRolesPorId()
{
    $idRol = $_GET['idRol'];
    $link = conectar();
    $sql='SELECT idRol
                ,rol
            FROM roles
            WHERE  idRol = '.$idRol;
    try {
        $resultado = mysqli_query($link,$sql);
        $rol = mysqli_fetch_assoc($resultado);
    }
    catch(Exception $e)
    {
        echo $e->getMessage();
        return false;
    }
    return $rol;

}

?>