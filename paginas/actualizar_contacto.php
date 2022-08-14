<?php
require_once "proteccion.php";
require_once 'conn_mysql.php';

$mensaje = "";
$idContacto = $_POST["txtCurpHide"];
$phone = $_POST["txtTelefono"];
$phone2 = $_POST["txtTelefono2"];
$email = $_POST["txtEmail"];
$email2 = $_POST["txtEmail2"];
$note = $_POST["txtNote"];
$curp = $_POST["selCurp"];
$result2 = "";

$sqlC = "SELECT * FROM contactos WHERE idPersona='" . $curp . "'";
$resultC = $conn->query($sqlC);
$rowsC = $resultC->fetchAll();
$cuantos = (int)$rowsC;

if ($cuantos <= 1) {
    $sqlUpdate  = "UPDATE contactos 
    SET idPersona = '$curp', telefono1 ='$phone', telefono2 = '$phone2', email1 = '$email', email2 = '$email2', notas = '$note' 
    WHERE idContacto ='" . $idContacto . "'";
    $conn->exec($sqlUpdate);
    $result2 = "Contacto actualizada correctamente";

    $sql = 'SELECT idContacto,curp,nombre,primerApellido,segundoApellido,telefono1,telefono2,email1,email2,notas 
    FROM contactos INNER JOIN personas ON contactos.idPersona = personas.curp WHERE idContacto=' . $idContacto;
    $result = $conn->query($sql);
    $rows = $result->fetchAll();

    foreach ($rows as $row) {
        $name = $row['nombre'];
        $lastname1 = $row['primerApellido'];
        $lastname2 = $row['segundoApellido'];
    }

    if (empty($rows)) {
        $result2 = "Lo sentimos, no se encontraron resultados";
    }
} else {
    $result2 = "Lo sentimos, la CURP ya tiene asociado un contacto";
    $phone = "";
    $phone2 = "";
    $email = "";
    $email2 = "";
    $note = "";
    $curp = "";
    $name = "";
    $lastname1 = "";
    $lastname2 = "";
}
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Persona editada</title>
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
                        <b class="text_bold">CURP:</b> <?php echo ($curp) ?>
                        <br />
                        <br />
                        <b class="text_bold">Nombre:</b> <?php echo ($name) ?>
                        <br />
                        <br />
                        <b class="text_bold">Apellido paterno:</b> <?php echo ($lastname1) ?>
                        <br />
                        <br />
                        <b class="text_bold">Apellido materno:</b> <?php echo ($lastname2) ?>
                        <br />
                        <br />
                        <b class="text_bold">Teléfono (1):</b> <?php echo ($phone); ?>
                        <br />
                        <br />
                        <b class="text_bold">Teléfono (2):</b> <?php echo ($phone2); ?>
                        <br />
                        <br />
                        <b class="text_bold">Email personal:</b> <?php echo ($email) ?>
                        <br />
                        <br />
                        <b class="text_bold">Email de apoyo:</b> <?php echo ($email2); ?>
                        <br />
                        <br />
                        <b class="text_bold">Notas:</b> <?php echo ($note); ?>
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