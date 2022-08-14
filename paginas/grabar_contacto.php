<?php
require_once "proteccion.php";
require_once 'conn_mysql.php';

$mensaje = "";
$phone = $_POST["txtTelefono"];
$phone2 = $_POST["txtTelefono2"];
$email = $_POST["txtEmail"];
$email2 = $_POST["txtEmail2"];
$note = $_POST["txtNote"];
$curp = $_POST["selCurp"];

$sql = "SELECT * FROM contactos WHERE idPersona='" . $curp . "'";
$result = $conn->query($sql);
$rows = $result->fetchAll();
if (empty($rows)) {
    $sqlC = "INSERT INTO contactos(idPersona,telefono1,telefono2,email1,email2,notas)";
    $sqlC2 = $sqlC . "VALUES ('$curp', '$phone', '$phone2', '$email', '$email2', '$note')";
    $result = $conn->query($sqlC2);
    $mensaje = "Persona registrada correctamente";

    foreach ($rows as $row) {
        $idContacto = $row['idContacto'];
    }
} else {
    $mensaje = "El contacto no pudo ser regsitrado correctamente la CURP ingresada ya tiene un contacto asociado";

    $idContacto = "";
    $curp = "";
    $phone = "";
    $phone2 = "";
    $email = "";
    $email2 = "";
    $note = "";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro de contactos</title>
    <link rel="stylesheet" href="../css/styles.css">
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
                        <b class="text_bold">CURP:</b> <?php echo ($curp); ?>
                        <br />
                        <br />
                        <b class="text_bold">Teléfono (1):</b> <?php echo ($phone); ?>
                        <br />
                        <br />
                        <b class="text_bold">Teléfono (2):</b> <?php echo ($phone2); ?>
                        <br />
                        <br />
                        <b class="text_bold">Email personal:</b> <?php echo($email) ?>
                        <br />
                        <br />
                        <b class="text_bold">Email de apoyo:</b> <?php echo ($email2); ?>
                        <br />
                        <br />
                        <b class="text_bold">Notas:</b> <?php echo ($note); ?>
                        <br />
                        <br />
                        <input type="button" value="Registrar otro contacto" class="btnSubmit" name="btnVac" onclick="location.href='alta_contactos.php'">
                        <br>
                        <br>
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