<?php
require_once "proteccion.php";
require_once "conn_mysql.php";

$result = "";
$idContacto = $_GET["id"];

if ($idContacto == "") {
    header("Location: menu.php");
}
if (is_null($idContacto)) {
    header("Location: menu.php");
}

$sql = 'SELECT idContacto,curp,nombre,primerApellido,segundoApellido,telefono1,telefono2,email1,email2,notas 
    FROM contactos INNER JOIN personas ON contactos.idPersona = personas.curp WHERE idContacto=' . $idContacto;
$result = $conn->query($sql);
$rows = $result->fetchAll();

if (empty($rows)) {
    $result = "Lo sentimos, no se encontraron personas";
    header("Location: menu.php");
    exit;
}
$sqlCurp = 'SELECT curp FROM personas';
$resultCurp = $conn->query($sqlCurp);
$rowsC = $resultCurp->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar contacto</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script language="javascript" src="../javascript/valida_contacto.js"></script>
    <script language="javascript" src="../javascript/obtener_municipios.js"></script>
</head>

<body>
    <?php
    include 'cabecera.php';
    ?>
    <div class="container">
        <form id="formcurp" onsubmit="return validaContacto();" method="post" action="actualizar_contacto.php">
            <?php
                foreach ($rows as $row) {
            ?>
            <div class="containerForm center">
                <div class="titlecurp">
                    Actualzar contacto
                </div>
                <div class="containerFormCurp">
                    <div class="selCurp">
                    <label for="selCurp" class="">CURP:</label>
                        <br>
                        <select name="selCurp" id="selCurp" class="txt">
                        <?php
                        foreach ($rowsC as $rowC) {
                        ?>
                        <option value="<?php echo $rowC['curp'] ?>"><?php echo $rowC['curp'] ?></option>
                        <?php
                        }
                        ?>
                        <option value="<?php echo $rowC['curp'] ?>" selected><?php echo $row['curp'] ?></option>
                        </select>
                    </div>
                    <div class="txtTelefono">
                        <label for="txtTelefono" class="">Teléfono (1):</label>
                        <br>
                        <input type="text" name="txtTelefono" id="txtTelefono" class="txt" value="<?php echo $row['telefono1'] ?>">
                    </div>
                    <div class="txtTelefono2">
                        <label for="txtTelefono2" class="">Teléfono (2):</label>
                        <br>
                        <input type="txtTelefono2" name="txtTelefono2" id="txtTelefono2" class="txt" value="<?php echo $row['telefono2'] ?>">
                    </div>

                    <div class="txtEmail">
                        <label for="txtEmail" class="">Correo electrónico personal:</label>
                        <br>
                        <input type="text" name="txtEmail" id="txtEmail" class="txt" value="<?php echo $row['email1'] ?>">
                    </div>
                    <div class="txtEmail2">
                        <label for="txtEmail2" class="">Correo electrónico de apoyo:</label>
                        <br>
                        <input type="text" name="txtEmail2" id="txtEmail2" class="txt" value="<?php echo $row['email2'] ?>">
                    </div>
                    <div class="txtNote">
                        <label for="txtNote" class="">Notas de contacto:</label>
                        <br>
                        <input type="text" name="txtNote" id="txtNote" class="txt" value="<?php echo $row['notas'] ?>">
                    </div>
                </div>
                <div class="containerSubmit">
                    <input type="hidden" value="<?php echo $row['idContacto'] ?>" name="txtCurpHide" id="txtCurpHide">
                    <input type="submit" value="Actualizar contacto" class="btnSubmit" name="btnVac">
                    <br>
                    <br>
                    <input type="button" value="Regresar" class="btnReturn" name="btnReturn" onclick="location.href='menu.php'">
                    <br>
                    <br>
                </div>
            </div>
            <?php
                }
            ?>
        </form>
    </div>
</body>

</html>