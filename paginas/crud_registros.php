<?php
require_once "proteccion.php";
require_once "conn_mysql.php";

$sql = 'SELECT idRegistro,curp,nombre,primerApellido,segundoApellido,estado,municipio,codigoPostal
FROM registros INNER JOIN personas ON registros.idPersona = personas.curp
INNER JOIN estados ON registros.idEstado = estados.idEstado
INNER JOIN municipios ON registros.idMunicipio = municipios.idMunicipio';
$result = $conn->query($sql);
$rows = $result->fetchAll();
?>
<div id="tabla">
    <div id="titulo" class="center">
        <h1>Reporte registros</h1>
    </div>
    <div id="form">
        <div>
            <a href="alta_registros.php" class="boton">Agregar Registros</a>
        </div>
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
                    <th>Código Postal</th>
                    <th>Ver</th>
                    <th>Editar</th>
                    <th>Eliminar</th>
                </tr>
            </thead>
            <tbody>
                <?php
                foreach ($rows as $row) {
                ?>
                    <tr>
                        <td><?php echo $row['idRegistro']; ?></td>
                        <td><?php echo $row['curp']; ?></td>
                        <td><?php echo $row['nombre'] ?></td>
                        <td><?php echo $row['primerApellido']; ?></td>
                        <td><?php echo $row['segundoApellido']; ?></td>
                        <td><?php echo $row['estado']; ?></td>
                        <td><?php echo $row['municipio']; ?></td>
                        <td><?php echo $row['codigoPostal']; ?></td>
                        <td><a href="detalle_registro.php?id=<?php echo $row['idRegistro']; ?>" class="boton">Ver</a></td>
                        <td><a href="editar_registro.php?id=<?php echo $row['idRegistro']; ?>" class="boton">Editar</a></td>
                        <td><a href="eliminar_registro.php?id=<?php echo $row['idRegistro']; ?>" class="boton" onclick="return borrarRegistro('<?php echo $row['idRegistro']; ?>', 'registro')">Eliminar</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>