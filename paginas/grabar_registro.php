<?php
require_once "proteccion.php";
require_once 'conn_mysql.php';

$mensaje = "";
$folio = uniqid();
$curp = $_POST["selCurp"];
$state = $_POST["selState"];
$mun = $_POST["selMun"];
$cp = $_POST["txtCp"];

$sql = "SELECT * FROM registros WHERE idPersona='" . $curp. "'";
$result = $conn->query($sql);
$rows = $result->fetchAll();
if (empty($rows)) {
    $sqlR = "INSERT INTO registros(idRegistro,idEstado,idMunicipio,codigoPostal,idPersona)";
    $sqlR2 = $sqlR . "VALUES ('$folio',$state, $mun, $cp, '$curp')";
    $resultR = $conn->query($sqlR2);
    $mensaje = "Registro guardado correctamente";

    $sql2 = "SELECT idRegistro,curp,nombre,primerApellido,segundoApellido,estado,municipio,codigoPostal
    FROM registros INNER JOIN personas ON registros.idPersona = personas.curp
    INNER JOIN estados ON registros.idEstado = estados.idEstado
    INNER JOIN municipios ON registros.idMunicipio = municipios.idMunicipio WHERE idRegistro='" . $folio . "'";
    $result2 = $conn->query($sql2);
    $rows2 = $result2->fetchAll();

    foreach ($rows2 as $row2) {
        $stateName = $row2['estado'];
        $munName = $row2['municipio'];
    }
} else {
    $mensaje = "El contacto no pudo ser registrado correctamente la CURP ingresada ya tiene un contacto asociado";

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
    <title>Registro guardado</title>
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
                echo $mensaje;
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
