<?php
date_default_timezone_set("America/Bogota");
header( 'Content-Type: application/json' );
require_once('../conexiones/conexione.php');

$fecha                       = addslashes($_GET['fecha']);
$tipo_fecha                  = addslashes($_GET['tipo_fecha']);
$nombre_empresa              = addslashes($_GET['nombre_empresa']);
$fecha_hoy_ymd_seg           = strtotime(date("Y/m/d"));

$query1 = "SELECT $tipo_fecha, cod_estado_facturacion, nombre_empresa, Count(paracli_audimet) AS conteo_paracli_audimet, paracli_audimet FROM historia_clinica
GROUP BY paracli_audimet, $tipo_fecha, cod_estado_facturacion, nombre_empresa 
HAVING ((($tipo_fecha)='$fecha') AND (cod_estado_facturacion=1) AND ((nombre_empresa)='$nombre_empresa') AND ((paracli_audimet)='N'))";
$result1 = mysqli_query($conectar, $query1);
$dato01 = mysqli_fetch_assoc($result1);

$query2 = "SELECT $tipo_fecha, cod_estado_facturacion, nombre_empresa, Count(paracli_visiomet) AS conteo_paracli_visiomet, paracli_visiomet FROM historia_clinica
GROUP BY paracli_visiomet, $tipo_fecha, cod_estado_facturacion, nombre_empresa 
HAVING ((($tipo_fecha)='$fecha') AND (cod_estado_facturacion=1) AND ((nombre_empresa)='$nombre_empresa') AND ((paracli_visiomet)='N'))";
$result2 = mysqli_query($conectar, $query2);
$dato02 = mysqli_fetch_assoc($result2);

$query3 = "SELECT $tipo_fecha, cod_estado_facturacion, nombre_empresa, Count(paracli_torax) AS conteo_paracli_torax, paracli_torax FROM historia_clinica
GROUP BY paracli_torax, $tipo_fecha, cod_estado_facturacion, nombre_empresa 
HAVING ((($tipo_fecha)='$fecha') AND (cod_estado_facturacion=1) AND ((nombre_empresa)='$nombre_empresa') AND ((paracli_torax)='N'))";
$result3 = mysqli_query($conectar, $query3);
$dato03 = mysqli_fetch_assoc($result3);

$query4 = "SELECT $tipo_fecha, cod_estado_facturacion, nombre_empresa, Count(paracli_espiro) AS conteo_paracli_espiro, paracli_espiro FROM historia_clinica
GROUP BY paracli_espiro, $tipo_fecha, cod_estado_facturacion, nombre_empresa 
HAVING ((($tipo_fecha)='$fecha') AND (cod_estado_facturacion=1) AND ((nombre_empresa)='$nombre_empresa') AND ((paracli_espiro)='N'))";
$result4 = mysqli_query($conectar, $query4);
$dato04 = mysqli_fetch_assoc($result4);

$query5 = "SELECT $tipo_fecha, cod_estado_facturacion, nombre_empresa, Count(paracli_ekg) AS conteo_paracli_ekg, paracli_ekg FROM historia_clinica
GROUP BY paracli_ekg, $tipo_fecha, cod_estado_facturacion, nombre_empresa 
HAVING ((($tipo_fecha)='$fecha') AND (cod_estado_facturacion=1) AND ((nombre_empresa)='$nombre_empresa') AND ((paracli_ekg)='N'))";
$result5 = mysqli_query($conectar, $query5);
$dato05 = mysqli_fetch_assoc($result5);

$query6 = "SELECT $tipo_fecha, cod_estado_facturacion, nombre_empresa, Count(paracli_rxcolum) AS conteo_paracli_rxcolum, paracli_rxcolum FROM historia_clinica
GROUP BY paracli_rxcolum, $tipo_fecha, cod_estado_facturacion, nombre_empresa 
HAVING ((($tipo_fecha)='$fecha') AND (cod_estado_facturacion=1) AND ((nombre_empresa)='$nombre_empresa') AND ((paracli_rxcolum)='N'))";
$result6 = mysqli_query($conectar, $query6);
$dato06 = mysqli_fetch_assoc($result6);

$query7 = "SELECT $tipo_fecha, cod_estado_facturacion, nombre_empresa, Count(paracli_otrcomplement) AS conteo_paracli_otrcomplement, paracli_otrcomplement FROM historia_clinica
GROUP BY paracli_otrcomplement, $tipo_fecha, cod_estado_facturacion, nombre_empresa 
HAVING ((($tipo_fecha)='$fecha') AND (cod_estado_facturacion=1) AND ((nombre_empresa)='$nombre_empresa') AND ((paracli_otrcomplement)='N'))";
$result7 = mysqli_query($conectar, $query7);
$dato07 = mysqli_fetch_assoc($result7);

$query8 = "SELECT $tipo_fecha, cod_estado_facturacion, nombre_empresa, Count(paracli_fisiote) AS conteo_paracli_fisiote, paracli_fisiote FROM historia_clinica
GROUP BY paracli_fisiote, $tipo_fecha, cod_estado_facturacion, nombre_empresa 
HAVING ((($tipo_fecha)='$fecha') AND (cod_estado_facturacion=1) AND ((nombre_empresa)='$nombre_empresa') AND ((paracli_fisiote)='N'))";
$result8 = mysqli_query($conectar, $query8);
$dato08 = mysqli_fetch_assoc($result8);

$query9 = "SELECT $tipo_fecha, cod_estado_facturacion, nombre_empresa, Count(paracli_lab) AS conteo_paracli_lab, paracli_lab FROM historia_clinica
GROUP BY paracli_lab, $tipo_fecha, cod_estado_facturacion, nombre_empresa 
HAVING ((($tipo_fecha)='$fecha') AND (cod_estado_facturacion=1) AND ((nombre_empresa)='$nombre_empresa') AND ((paracli_lab)='N'))";
$result9 = mysqli_query($conectar, $query9);
$dato09 = mysqli_fetch_assoc($result9);

$query10 = "SELECT $tipo_fecha, cod_estado_facturacion, nombre_empresa, Count(paracli_otro) AS conteo_paracli_otro, paracli_otro FROM historia_clinica
GROUP BY paracli_otro, $tipo_fecha, cod_estado_facturacion, nombre_empresa 
HAVING ((($tipo_fecha)='$fecha') AND (cod_estado_facturacion=1) AND ((nombre_empresa)='$nombre_empresa') AND ((paracli_otro)='N'))";
$result10 = mysqli_query($conectar, $query10);
$dato10 = mysqli_fetch_assoc($result10);

$paracli_audimet          = $dato01['conteo_paracli_audimet'];
$paracli_visiomet         = $dato02['conteo_paracli_visiomet'];
$paracli_torax            = $dato03['conteo_paracli_torax'];
$paracli_espiro           = $dato04['conteo_paracli_espiro'];
$paracli_ekg              = $dato05['conteo_paracli_ekg'];
$paracli_rxcolum          = $dato06['conteo_paracli_rxcolum'];
$paracli_otrcomplement    = $dato07['conteo_paracli_otrcomplement'];
$paracli_fisiote          = $dato08['conteo_paracli_fisiote'];
$paracli_lab              = $dato09['conteo_paracli_lab'];
$paracli_otro             = $dato10['conteo_paracli_otro'];
$vector_paraclinic           = array($paracli_audimet, $paracli_visiomet, $paracli_torax, $paracli_espiro, $paracli_ekg, $paracli_rxcolum, $paracli_otrcomplement, $paracli_fisiote, $paracli_lab, $paracli_otro);

$prefix = '';
echo "[\n";
$contador = 0;

foreach ($vector_paraclinic as &$conteo_paraclinic) {

$rand = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9', 'a', 'b', 'c', 'd', 'e', 'f');
$color = '#'.$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)].$rand[rand(0,15)];

echo $prefix . " {\n";

$contador ++;
if ($contador == 1) {
$nombre_paraclinic = 'Audiometría';
echo ' "color": "' .$color. '",';
echo ' "nombre_paraclinic": "' .$nombre_paraclinic. '",';
echo ' "conteo_paraclinic": '  .intval($conteo_paraclinic). ''. '';
}
if ($contador == 2) {
echo ' "color": "' .$color. '",';
$nombre_paraclinic = 'Visiometría / Optometría';
echo ' "nombre_paraclinic": "' .$nombre_paraclinic. '",';
echo ' "conteo_paraclinic": '  .intval($conteo_paraclinic). ''. '';
}
if ($contador == 3) {
echo ' "color": "' .$color. '",';
$nombre_paraclinic = 'Rx de Tórax';
echo ' "nombre_paraclinic": "' .$nombre_paraclinic. '",';
echo ' "conteo_paraclinic": '  .intval($conteo_paraclinic). ''. '';
}
if ($contador == 4) {
echo ' "color": "' .$color. '",';
$nombre_paraclinic = 'Espirometría';
echo ' "nombre_paraclinic": "' .$nombre_paraclinic. '",';
echo ' "conteo_paraclinic": '  .intval($conteo_paraclinic). ''. '';
}
if ($contador == 5) {
echo ' "color": "' .$color. '",';
$nombre_paraclinic = 'Audiometría';
echo ' "nombre_paraclinic": "' .$nombre_paraclinic. '",';
echo ' "conteo_paraclinic": '  .intval($conteo_paraclinic). ''. '';
}
if ($contador == 6) {
echo ' "color": "' .$color. '",';
$nombre_paraclinic = 'EKG';
echo ' "nombre_paraclinic": "' .$nombre_paraclinic. '",';
echo ' "conteo_paraclinic": '  .intval($conteo_paraclinic). ''. '';
}
if ($contador == 7) {
echo ' "color": "' .$color. '",';
$nombre_paraclinic = 'Rx de Columna';
echo ' "nombre_paraclinic": "' .$nombre_paraclinic. '",';
echo ' "conteo_paraclinic": '  .intval($conteo_paraclinic). ''. '';
}
if ($contador == 8) {
echo ' "color": "' .$color. '",';
$nombre_paraclinic = 'Otras pruebas complementarias';
echo ' "nombre_paraclinic": "' .$nombre_paraclinic. '",';
echo ' "conteo_paraclinic": '  .intval($conteo_paraclinic). ''. '';
}
if ($contador == 9) {
echo ' "color": "' .$color. '",';
$nombre_paraclinic = 'Examen por Fisioterapia';
echo ' "nombre_paraclinic": "' .$nombre_paraclinic. '",';
echo ' "conteo_paraclinic": '  .intval($conteo_paraclinic). ''. '';
}
if ($contador == 10) {
echo ' "color": "' .$color. '",';
$nombre_paraclinic = 'Laboratorios';
echo ' "nombre_paraclinic": "' .$nombre_paraclinic. '",';
echo ' "conteo_paraclinic": '  .intval($conteo_paraclinic). ''. '';
}

echo " }";
$prefix = ",\n";
}

echo "\n]";
?>