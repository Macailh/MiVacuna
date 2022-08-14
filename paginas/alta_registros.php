<?php
require_once "proteccion.php";
require_once "conn_mysql.php";
$sql = 'SELECT idRegistro,curp,nombre,primerApellido,segundoApellido,estado,municipio,codigoPostal
FROM registros INNER JOIN personas ON registros.idPersona = personas.curp
INNER JOIN estados ON registros.idEstado = estados.idEstado
INNER JOIN municipios ON registros.idMunicipio = municipios.idMunicipio';
$result = $conn->query($sql);
$rows = $result->fetchAll();

$sqlP = 'SELECT curp FROM personas';
$resultP = $conn->query($sqlP);
$rowsP = $resultP->fetchAll();

include "consulta_entidades.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Alta de registros</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script language="javascript" src="../javascript/valida_registro.js"></script>
    <script language="javascript" src="../javascript/obtener_municipios.js"></script>
</head>

<body>
    <?php
    include 'cabecera.php';
    ?>
    <div class="container">
        <form id="formcurp" onsubmit="return validaRegistro();" method="post" action="grabar_registro.php">
            <div class="containerForm center">
                <div class="titlecurp">
                    Alta de registros
                </div>
                <div class="containerFormCurp">
                    <div class="selCurp">
                        <label for="selCurp" class="">CURP:</label>
                        <br>
                        <select name="selCurp" id="selCurp" class="txt">
                            <option value="0">Selecciona la CURP</option>
                            <?php
                            foreach ($rowsP as $rowP) {
                            ?>
                                <option value="<?php echo $rowP['curp'] ?>"><?php echo $rowP['curp'] ?></option>
                            <?php
                            }
                            ?>
                        </select>
                    </div>
                    <div class="txtState">
                        <label for="selState" class="">Entidad:</label>
                        <br>
                        <select name="selState" id="selState" class="txt" onChange="javascript:pedirMunicipios();">
                            <option value="0">Selecciona un estado</option>
                            <?php
                            foreach ($rowse as $rowe) {
                                echo '<option value="' . $rowe['idEstado'] . '">' . $rowe['estado'] . '</option>';
                            }
                            ?>
                        </select>
                    </div>
                    <div class="txtMun">
                        <label for="selMun" class="">Municipio:</label>
                        <br>
                        <select name="selMun" id="selMun" class="txt">

                        </select>
                    </div>
                    <div class="txtCp">
                        <label for="txtCp" class="">Codigo postal:</label>
                        <br>
                        <input type="text" name="txtCp" id="txtCp" class="txt">
                    </div>
                </div>
                <div class="containerSubmit">
                <?php
                foreach ($rows as $row) {
                ?>
                    <input type="hidden" value="<?php echo $row['idRegistro']; ?>" name="txtFolio" id="txtFolio">
                <?php } ?>
                <input type="submit" value="Guardar registro" class="btnSubmit" name="btnVac">
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