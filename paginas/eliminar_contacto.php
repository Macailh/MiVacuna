<?php
ob_start();
require_once "proteccion.php";
require_once "conn_mysql.php";

$idContacto = $_GET["id"];
$idContacto = (int)$idContacto;

if ($idContacto == "") {
    header("Location: menu.php");
    exit;
}
if (is_null($idContacto)) {
    header("Location: menu.php");
    exit;
}
if (!is_int($idContacto)) {
    header("Location: menu.php");
    exit;
}

$sqlContactos ='SELECT idContacto,curp,nombre,primerApellido,segundoApellido,telefono1,telefono2,email1,email2,notas 
FROM contactos INNER JOIN personas ON contactos.idPersona = personas.curp WHERE idContacto=' . $idContacto;
$stmt2 = $conn->query($sqlContactos);
$rows2 = $stmt2->fetchAll();

$sqlBorrar = 'DELETE FROM contactos WHERE idContacto=' . $idContacto;
$conn->exec($sqlBorrar);
?>
<!doctype html>
<html>

<head>
    <meta charset="utf-8">
    <title>Borrar contacto</title>
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
                    <h1>Detalle del contacto eliminado</h1>
                </div>
                <div id="form">
                    <br>
                    <table class="center">
                        <thead>
                            <tr class="tabla_encabezado">
                                <th>ID Contacto</th>
                                <th>CURP</th>
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