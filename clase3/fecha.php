<?php
//mostrar fecha formato
// 20/04/2022
date_default_timezone_set('America/Argentina/Buenos_Aires');
$fecha = date("d/m/Y H:i:s");
$Dia = date("d");
$mes = date("F");
$Anio = date("Y");


$dias = array("Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado");
$fechats = strtotime($fecha); //fecha en yyyy-mm-dd

$mesNombre = array("Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre");
$fechats2 = strtotime($fecha); //fecha en yyyy-mm-dd


echo $dias[date("w", $fechats)];
echo " ",$Dia, " de " ;


echo $mesNombre[date("w", $fechats2)];
echo ' de ',$Anio;

?>
<hr>
<?php
    $dias = ["Domingo", "Lunes", "Martes", "Miércoles", "Jueves", "Viernes", "Sábado"];
    $diaSemana = $dias[ date('w') ];
    $diaMes = date('d');
    $meses = [ 1=>"Enero", "Febrero", "Marzo", "Abril", "Mayo", "Junio", "Julio", "Agosto", "Septiembre", "Octubre", "Noviembre", "Diciembre"];
    $mesActual = $meses[ date('n') ];
    $anio = date('Y');
    echo $diaSemana, ' ', $diaMes, ' de ', $mesActual, ' de ', $anio;
?>
