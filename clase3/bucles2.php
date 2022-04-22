<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <title>Document</title>
    <!-- CSS only -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.1/font/bootstrap-icons.css">
</head>
<body>
    <main class="container">
        <h1>Bucle for</h1>
<?php
    $categorias = [
            'audio', 'electrónica', 'tv',
            'gaming', 'hogar', 'indumentaria',
            'jardinería', 'juguetería'
    ];
    $cantidad = count($categorias);
    for( $i = 0; $i < $cantidad; $i++ ){
?>
        <span class="badge bg-dark">
            <?php echo $categorias[$i]  ?>
        </span>
<?php
    }
?>

    </main>


</body>
</html>
