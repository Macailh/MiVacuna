<?php
require_once "proteccion.php";
require_once 'conn_mysql.php';

$mensaje = "";
$folio = $_POST['txtFolio'];
$curp = $_POST["selCurp"];
$state = $_POST["selState"];
$mun = $_POST["selMun"];
$cp = $_POST["txtCp"];
$result2 = "";

$sqlR = "SELECT * FROM registros WHERE idPersona='" . $curp . "'";
$resultR = $conn->query($sqlR);
$rowsR = $resultR->fetchAll();
$cuantos = (int)$rowsR;

if ($cuantos <= 1) {
    $sqlUpdate  = "UPDATE registros
    SET idEstado = $state, idMunicipio= $mun, codigoPostal = $cp, idPersona = '$curp'
    WHERE idRegistro ='" . $folio . "'";
    $conn->exec($sqlUpdate);
    $result2 = "Registro actualizada correctamente";

    $sql = "SELECT idRegistro,curp,nombre,primerApellido,segundoApellido,estado,municipio,codigoPostal
    FROM registros INNER JOIN personas ON registros.idPersona = personas.curp
    INNER JOIN estados ON registros.idEstado = estados.idEstado
    INNER JOIN municipios ON registros.idMunicipio = municipios.idMunicipio WHERE idRegistro='" . $folio . "'";
    $result = $conn->query($sql);
    $rows = $result->fetchAll();

    foreach ($rows as $row) {
        $stateName = $row['estado'];
        $munName = $row['municipio'];
    }

    if (empty($rows)) {
        $result2 = "Lo sentimos, no se encontraron resultados";
    }
} else {
    $result2 = "Lo sentimos, la CURP ya tiene asociado un registro";
    $curp = "";
    $folio = "";
    $stateName = "";
    $munName = "";
    $cp = "";
}
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Registro editado</title>
    <link href="../css/styles.css" rel="stylesheet" type="text/css">
</head>

<body>
    <?php
    include 'cabecera.php';
    ?>
    <div class="container">
        <div class="containercurp center">
            <div class="titlecurp">
                <?php
                echo $result2;
                ?>
            </div>
            <div class="curp">
                <form id="formcurp">
                    <div>
                        <b class="text_bold">Folio:</b> <?php echo ($folio) ?>
                        <br />
                        <br />
                        <b class="text_bold">CURP:</b> <?php echo ($curp) ?>
                        <br />
                        <br />
                        <b class="text_bold">Estado:</b> <?php echo ($stateName) ?>
                        <br />
                        <br />
                        <b class="text_bold">Municipio:</b> <?php echo ($munName) ?>
                        <br />
                        <br />
                        <b class="text_bold">Código postal:</b> <?php echo ($cp) ?>
                        <br />
                        <br />
                        <input type="button" value="Regresar" class="btnReturn" name="btnReturn" onclick="location.href='menu.php'">
                        <br>
                        <br>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>
