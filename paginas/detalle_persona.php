<?php
require_once "conn_mysql.php";

$result = "";
$result2 = "";

$sqlPersonas = 'SELECT * FROM personas';
$stmt2 = $conn->query($sqlPersonas);
$rows2 = $stmt2->fetchAll();

if (empty($rows2)) {
    $result2 = "Lo sentimos, no se encontraron personas";
}

$idPersonas = $_GET["id"];

if ($idPersonas == "") {
    header("Location: menu.php");
}
if (is_null($idPersonas)) {
    header("Location: menu.php");
}

$sql3 = 'SELECT * FROM personas WHERE curp=' . "'".$idPersonas."'";

$result = $conn->query($sql3);
$rows = $result->fetchAll();

if (empty($rows)) {
    $result = "Lo sentimos, no se encontraron resultados";
    header("Location: menu.php");
    exit;
}
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Detalle persona</title>
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
                    <h1>Detalle de la persona seleccionada</h1>
                </div>
                <div id="form">
                    <br>
                    <table class="center">
                        <thead>
                            <tr class="tabla_encabezado">
                                <th>CURP</th>
                                <th>Nombre</th>
                                <th>Apellido paterno</th>
                                <th>Apellido materno</th>
                                <th>Sexo</th>
                                <th>Fecha de nacimiento</th>
                                <th>Entidad de nacimiento</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($rows as $row) {
                            ?>
                                <tr>
                                    <td><?php echo $row['curp']; ?></td>
                                    <td><?php echo $row['nombre'] ?></td>
                                    <td><?php echo $row['primerApellido']; ?></td>
                                    <td><?php echo $row['segundoApellido']; ?></td>
                                    <td><?php if ($row['sexo'] == 'M') {
                                            echo 'Masculino';
                                        } else {
                                            echo 'Femenino';
                                        }
                                        ?></td>
                                    <td><?php echo $row['fechaNacimiento']; ?></td>
                                    <td><?php echo $row['entidadNacimiento']; ?></td>
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