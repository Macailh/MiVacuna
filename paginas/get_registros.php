<!doctype html>
<html>
<head>
<link href="../css/styles.css" rel="stylesheet" type="text/css">
<script language="javascript" src="../javascript/borrar_registro.js"></script>
</head>
<body>
<?php
    // Insertamos el código PHP donde nos conectamos a la base de datos *******************************
    require_once "conn_mysql.php";
	// Recuperamos los valores de los objetos de QUERYSTRING que viene desde la URL mediante GET ******
	$idMunicipio = $_GET['q'];

    // Escribimos la consulta para recuperar el UNICO REGISTRO de MySQL mediante el ID obtenido por _GET
	
	$sql = "SELECT idRegistro,curp,nombre,primerApellido,segundoApellido,estado,municipio,codigoPostal
	FROM registros INNER JOIN personas ON registros.idPersona = personas.curp
	INNER JOIN estados ON registros.idEstado = estados.idEstado
	INNER JOIN municipios ON registros.idMunicipio = municipios.idMunicipio AND registros.idMunicipio=" . $idMunicipio;

    // Ejecutamos la consulta y asignamos el resultado a la variable llamada $result
    $result = $conn->query($sql);
      
    // Recuperamos los valores o registros de la variable $result y los asignamos a la variable $rows
    $rows = $result->fetchAll();
    // El resultado se mostrará en la página, en el BODY ***************************************************
	
echo "<div>
		<a href='alta_registros.php' class='boton'>Agregar Registros</a>
	</div>
	<br>
	<table class='center'>
		<thead>
            <tr>
				<th>Folio</th>
				<th>CURP</th>
				<th>Nombre</th>
				<th>Apellido paterno</th>
				<th>Apellido materno</th>
				<th>Estado</th>
				<th>Municipio</th>
				<th>Codigo Postal</th>
				<th>Ver</th>
				<th>Editar</th>
				<th>Eliminar</th>
            </tr>
		</thead>";

		 foreach ($rows as $row) {
			  //Imprimimos en la página un renglon de tabla HTML por cada registro de tabla de MySQL
			  echo "<tbody>";
			  echo "<tr>";
						echo "<td>" . $row['idRegistro'] . "</td>";
						echo "<td>" . $row['curp'] . "</td>";
						echo "<td>" . $row['nombre'] . "</td>";
						echo "<td>" . $row['primerApellido'] . "</td>";
						echo "<td>" . $row['segundoApellido'] . "</td>";
						echo "<td>" . $row['estado'] . "</td>";
						echo "<td>" . $row['municipio'] . "</td>";
						echo "<td>" . $row['codigoPostal'] . "</td>";
						echo "<td><a href='detalle_registro.php?id=" . $row['idRegistro']."'"."class='boton'>Ver</a>"."</td>";
						echo "<td><a href='editar_registro.php?id=" . $row['idRegistro']."'"."class='boton'>Editar</a>"."</td>";
						?>
						<td><a href="eliminar_registro.php?id=<?php echo $row['idRegistro']; ?>" class="boton" onclick="return borrarRegistro('<?php echo $row['idRegistro']; ?>', 'registro')">Eliminar</a></td>
						<?php
			  echo "</tr>";
			  echo "</tbody>";
         }
		 
echo "</table>";
         //Cerramos la oonexion a la base de datos **********************************************
		 $conn = null;
?>
</body>
</html>