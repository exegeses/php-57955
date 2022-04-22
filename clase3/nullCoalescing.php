<?php
    if( isset($_GET['test']) ){
        echo 'existe y no es nulo';
    }
    else{
        echo 'NO existe o ES nulo';
    }
?>
<hr>
<?php
    $data = $_GET['test'] ?? 'NO existe o ES nulo';
    echo $data;
?>
