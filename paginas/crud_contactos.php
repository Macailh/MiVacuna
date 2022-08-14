<?php
require_once "proteccion.php";
require_once "conn_mysql.php";

$sql = 'SELECT idContacto,curp,nombre,primerApellido,segundoApellido,telefono1,telefono2,email1,email2,notas 
FROM contactos INNER JOIN personas ON contactos.idPersona = personas.curp';
$result = $conn->query($sql);
$rows = $result->fetchAll();
?>
<div id="tabla">
    <div id="titulo" class="center">
        <h1>Reporte contactos</h1>
    </div>
    <div id="form">
        <div>
            <a href="alta_contactos.php" class="boton">Agregar Contacto</a>
        </div>
        <br>
        <table class="center">
            <thead>
                <tr class="tabla_encabezado">
                    <th>CURP</th>
                    <th>Nombre</th>
                    <th>Apellido paterno</th>
                    <th>Apellido materno</th>
                    <th>Telefono</th>
                    <th>Email</th>
                    <th>Notas</th>
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
                        <td><?php echo $row['telefono1']; ?></td>
                        <td><?php echo $row['email1']; ?></td>
                        <td><?php echo $row['notas']; ?></td>
                        <td><a href="detalle_contacto.php?id=<?php echo $row['idContacto']; ?>" class="boton">Ver</a></td>
                        <td><a href="editar_contacto.php?id=<?php echo $row['idContacto']; ?>" class="boton">Editar</a></td>
                        <td><a href="eliminar_contacto.php?id=<?php echo $row['idContacto']; ?>" class="boton" onclick="return borrarRegistro('<?php echo $row['idContacto']; ?>', 'contacto')">Eliminar</a></td>
                    </tr>
                <?php
                }
                ?>
            </tbody>
        </table>
    </div>
</div>