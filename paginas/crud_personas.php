<?php
require_once "proteccion.php";
require_once "conn_mysql.php";

$sql = 'SELECT * FROM personas INNER JOIN estados ON personas.entidadNacimiento = estados.idEstado';
$result = $conn->query($sql);
$rows = $result->fetchAll();
?>
<div id="tabla">
    <div id="titulo" class="center">
        <h1>Reporte personas</h1>
    </div>
    <div id="form">
        <div>
            <a href="alta_personas.php" class="boton">Agregar Personas</a>
        </div>
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
                        <td><?php echo $row['estado']; ?></td>
                        <td><a href="detalle_persona.php?id=<?php echo $row['curp']; ?>" class="boton">Ver</a></td>
                        <td><a href="editar_persona.php?id=<?php echo $row['curp']; ?>" class="boton">Editar</a></td>
                        <td><a href="eliminar_persona.php?id=<?php echo $row['curp']; ?>" class="boton" onclick="return borrarRegistro('<?php echo $row['curp']; ?>', 'persona')">Eliminar</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>