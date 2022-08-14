<?php
require_once "proteccion.php";
require_once "conn_mysql.php";
$sql = 'SELECT curp FROM personas';
$result = $conn->query($sql);
$rows = $result->fetchAll();
include "consulta_entidades.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro de contactos</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script language="javascript" src="../javascript/valida_contacto.js"></script>
    <script language="javascript" src="../javascript/obtener_municipios.js"></script>
</head>

<body>
    <?php
    include 'cabecera.php';
    ?>
    <div class="container">
        <form id="formcurp" onsubmit="return validaContacto();" method="post" action="grabar_contacto.php">
            <div class="containerForm center">
                <div class="titlecurp">
                    Registrar contacto
                </div>
                <div class="containerFormCurp">
                    <div class="selCurp">
                        <label for="selCurp" class="">CURP:</label>
                        <br>
                        <select name="selCurp" id="selCurp" class="txt">
                        <?php
                        foreach ($rows as $row) {
                        ?>
                        <option value="<?php echo $row['curp'] ?>"><?php echo $row['curp'] ?></option>
                        <?php
                        }
                        ?>
                        </select>
                    </div>
                    <div class="txtTelefono">
                        <label for="txtTelefono" class="">Teléfono (1):</label>
                        <br>
                        <input type="text" name="txtTelefono" id="txtTelefono" class="txt">
                    </div>
                    <div class="txtTelefono2">
                        <label for="txtTelefono2" class="">Teléfono (2):</label>
                        <br>
                        <input type="txtTelefono2" name="txtTelefono2" id="txtTelefono2" class="txt">
                    </div>

                    <div class="txtEmail">
                        <label for="txtEmail" class="">Correo electrónico personal:</label>
                        <br>
                        <input type="text" name="txtEmail" id="txtEmail" class="txt">
                    </div>
                    <div class="txtEmail2">
                        <label for="txtEmail2" class="">Correo electrónico de apoyo:</label>
                        <br>
                        <input type="text" name="txtEmail2" id="txtEmail2" class="txt">
                    </div>
                    <div class="txtNote">
                        <label for="txtNote" class="">Notas de contacto:</label>
                        <br>
                        <input type="text" name="txtNote" id="txtNote" class="txt">
                    </div>
                </div>
                <div class="containerSubmit">
                    <input type="submit" value="Registrar contacto" class="btnSubmit" name="btnVac">
                    <br>
                    <br>
                    <input type="button" value="Regresar" class="btnReturn" name="btnReturn" onclick="location.href='menu.php'">
                    <br>
                    <br>
                </div>
            </div>
        </form>
    </div>
</body>

</html>