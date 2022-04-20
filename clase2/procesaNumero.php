<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Document</title>
</head>
<body>
<?php
    $numero = $_POST['numero'];
    if( $numero < 100 ){
        echo '<img src="imgs/ok.png">';
    }
    else{
        echo '<img src="imgs/error.png">';
    }
?>
<hr>
<?php
    if( $numero < 100 ){
?>
        <img src="imgs/ok.png">
<?php
    }
    else{
?>
        <img src="imgs/error.png">
<?php
    }
?>
<hr>
<?php
    $im = 'error';
    if( $numero < 100 ){
        $im = 'ok';
    }
?>
    <img src="imgs/<?php echo $im ?>.png">
<hr>
<?php
    //(condicion)?true:false
    $im = ($numero < 100)?'ok':'error';
?>
    <img src="imgs/<?php echo $im ?>.png">
<hr>
<?php
    //armar ejemplo null coalescing
?>    

</body>
</html>