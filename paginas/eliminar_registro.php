<?php
ob_start();
require_once "proteccion.php";
require_once "conn_mysql.php";

$idRegistro = $_GET["id"];

if ($idRegistro == "") {
    header("Location: menu.php");
    exit;
}
if (is_null($idRegistro)) {
    header("Location: menu.php");
    exit;
}

$sql = "SELECT idRegistro,curp,nombre,primerApellido,segundoApellido,estado,municipio,codigoPostal
FROM registros INNER JOIN personas ON registros.idPersona = personas.curp
INNER JOIN estados ON registros.idEstado = estados.idEstado
INNER JOIN municipios ON registros.idMunicipio = municipios.idMunicipio WHERE idRegistro='" . $idRegistro . "'";
$result2 = $conn->query($sql);
$rows2 = $result2->fetchAll();

$sqlBorrar = "DELETE FROM registros WHERE idRegistro='" . $idRegistro . "'";
$conn->exec($sqlBorrar);
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Borrar registro</title>
    <link href="../css/styles.css" rel="stylesheet" type="text/css">
</head>

<body>
    <div id="contenedor">
        <?php
        include "cabecera.php";
        ?>
        <div id="cuerpo">
            <div id="tabla">
                <div id="titulo" class="center">
                    <h1>Detalle del registro eliminado</h1>
                </div>
                <div id="form">
                    <br>
                    <table class="center">
                        <thead>
                            <tr class="tabla_encabezado">
                                <th>Folio</th>
                                <th>CURP</th>
                                <th>Nombre</th>
                                <th>Apellido paterno</th>
                                <th>Apellido materno</th>
                                <th>Estado</th>
                                <th>Municipio</th>
                                <th>Codigo Postal</th>
                            </tr>
                        </thead>
                        <tbody>
                        <?php
                            foreach ($rows2 as $row2) {
                            ?>
                                <tr>
                                    <td><?php echo $row2['idRegistro']; ?></td>
                                    <td><?php echo $row2['curp']; ?></td>
                                    <td><?php echo $row2['nombre'] ?></td>
                                    <td><?php echo $row2['primerApellido']; ?></td>
                                    <td><?php echo $row2['segundoApellido']; ?></td>
                                    <td><?php echo $row2['estado']; ?></td>
                                    <td><?php echo $row2['municipio']; ?></td>
                                    <td><?php echo $row2['codigoPostal']; ?></td>
                                </tr>
                            <?php
                            }
                            ?>
                        </tbody>
                    </table>
                </div>
                <div class="center">
                    <br>
                    <br>
                    <input type="button" value="Regresar" class="btnReturn" name="btnReturn" onclick="location.href='menu.php'">
                    <br>
                    <br>
                </div>
            </div>
        </div>
    </div>
    <?php
    $conn = null;
    ?>
</body>

</html>