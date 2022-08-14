<?php
require_once "conn_mysql.php";

$result = "";
$result2 = "";

$idContacto = $_GET["id"];
$idContacto = (int)$idContacto;

$sqlContactos ='SELECT idContacto,curp,nombre,primerApellido,segundoApellido,telefono1,telefono2,email1,email2,notas 
FROM contactos INNER JOIN personas ON contactos.idPersona = personas.curp WHERE idContacto=' . $idContacto;
$stmt2 = $conn->query($sqlContactos);
$rows2 = $stmt2->fetchAll();

if (empty($rows2)) {
    $result2 = "Lo sentimos, no se encontraron resultados";
}

if ($idContacto == "") {
    header("Location: menu.php");
}
if (is_null($idContacto)) {
    header("Location: menu.php");
}

$sql3 = 'SELECT * FROM contactos WHERE idContacto=' . "'".$idContacto."'";

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
                    <h1>Detalle del contacto seleccionado</h1>
                </div>
                <div id="form">
                    <br>
                    <table class="center">
                        <thead>
                            <tr class="tabla_encabezado">
                                <th>ID Contacto</th>
                                <th>CURP</th>
                                <th>Nombre</th>
                                <th>Apellido paterno</th>
                                <th>Apellido materno</th>
                                <th>Teléfono 1</th>
                                <th>Teléfono 2</th>
                                <th>Email personal</th>
                                <th>Email de apoyo</th>
                                <th>Notas</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            foreach ($rows2 as $row2) {
                            ?>
                                <tr>
                                    <td><?php echo $row2['idContacto']; ?></td>
                                    <td><?php echo $row2['curp']; ?></td>
                                    <td><?php echo $row2['nombre'] ?></td>
                                    <td><?php echo $row2['primerApellido']; ?></td>
                                    <td><?php echo $row2['segundoApellido']; ?></td>
                                    <td><?php echo $row2['telefono1']; ?></td>
                                    <td><?php echo $row2['telefono2']; ?></td>
                                    <td><?php echo $row2['email1']; ?></td>
                                    <td><?php echo $row2['email2']; ?></td>
                                    <td><?php echo $row2['notas']; ?></td>
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