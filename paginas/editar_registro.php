<?php
require_once "proteccion.php";
require_once "conn_mysql.php";

$result = "";
$folio = $_GET["id"];

if ($folio == "") {
    header("Location: menu.php");
}
if (is_null($folio)) {
    header("Location: menu.php");
}

$sql = "SELECT R.idRegistro,P.curp,P.nombre,P.primerApellido,P.segundoApellido,E.idEstado,E.estado,M.idMunicipio,M.municipio,R.codigoPostal
FROM registros R INNER JOIN personas P ON R.idPersona = P.curp
INNER JOIN estados E ON R.idEstado = E.idEstado
INNER JOIN municipios M ON R.idMunicipio = M.idMunicipio WHERE R.idRegistro='" . $folio . "'";
$result = $conn->query($sql);
$rows = $result->fetchAll();

if (empty($rows)) {
    $result = "Lo sentimos, no se encontraron resultados";
    header("Location: menu.php");
    exit;
}
foreach ($rows as $row) {
    $idEstado = $row['idEstado'];
}
$sqlCurp = 'SELECT curp FROM personas';
$resultCurp = $conn->query($sqlCurp);
$rowsC = $resultCurp->fetchAll();

$sqlM = 'SELECT * FROM municipios WHERE idEstado=' . $idEstado;
$stmtM = $conn->query($sqlM);
$rowsM = $stmtM->fetchAll();
include "consulta_entidades.php";
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Editar registro</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script language="javascript" src="../javascript/valida_registro.js"></script>
    <script language="javascript" src="../javascript/obtener_municipios.js"></script>
</head>

<body>
    <?php
    include 'cabecera.php';
    ?>
    <div class="container">
        <form id="formcurp" onsubmit="return validaRegistro();" method="post" action="actualizar_registro.php">
            <?php
            foreach ($rows as $row) {
            ?>
                <div class="containerForm center">
                    <div class="titlecurp">
                        Actualizar registros
                    </div>
                    <div class="containerFormCurp">
                        <div class="selCurp">
                            <label for="selCurp" class="">CURP:</label>
                            <br>
                            <select name="selCurp" id="selCurp" class="txt">
                                <option value="0">Selecciona la CURP</option>
                                <?php
                                foreach ($rowsC as $rowC) {
                                ?>
                                    <option value="<?php echo $rowC['curp'] ?>"><?php echo $rowC['curp'] ?></option>
                                <?php
                                }
                                ?>
                                <option value="<?php echo $row['curp'] ?>" selected><?php echo $row['curp'] ?></option>
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
                                <option value="<?php echo $row['idEstado'] ?>" selected><?php echo $row['estado'] ?></option>
                            </select>
                        </div>
                        <div class="txtMun">
                            <label for="selMun" class="">Municipio:</label>
                            <br>
                            <select name="selMun" id="selMun" class="txt">
                                <?php
                                foreach ($rowsM as $rowM) {
                                ?>
                                    <option value="<?php echo $rowM['idMunicipio'] ?>"><?php echo $rowM['municipio'] ?></option>
                                <?php
                                }
                                ?>
                                <option value="<?php echo $row['idMunicipio'] ?>" selected><?php echo $row['municipio'] ?></option>
                            </select>
                        </div>
                        <div class="txtCp">
                            <label for="txtCp" class="">Codigo postal:</label>
                            <br>
                            <input type="text" name="txtCp" id="txtCp" class="txt" value="<?php echo $row['codigoPostal'] ?>">
                        </div>
                    </div>
                    <div class="containerSubmit">
                        <input type="hidden" value="<?php echo $row['idRegistro'] ?>" name="txtFolio" id="txtFolio">
                        <input type="submit" value="Actualizar registro" class="btnSubmit" name="btnVac">
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