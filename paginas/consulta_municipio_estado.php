<?php
require_once "conn_mysql.php";


$sqlM2 = "SELECT municipio FROM municipios WHERE idMunicipio=". $mun;
$resultM2 = $conn->query($sqlM2);
$rowsM2 = $resultM2->fetchAll();

$sqlE2 = "SELECT estado FROM estados WHERE idEstado=". $state;
$resultE2 = $conn->query($sqlE2);
$rowsE2 = $resultE2->fetchAll();

foreach($rowsM2 as $rowM2){
    $mun = $rowM2['municipio'];
}
foreach($rowsE2 as $rowE2){
    $state = $rowE2['estado'];
}
?>