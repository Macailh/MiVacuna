<?php
require_once "proteccion.php";
require_once "conn_mysql.php";

$mensaje = "";
$name = $_POST["txtName"];
$lastName1 = $_POST["txtFirstLastName"];
$lastName2 = $_POST["txtSecondLastName"];
$curp = $_POST["txtCurpOculto"];
$date = $_POST["txtDate"];
$stateBirth = $_POST["selStateBirth"];
$gender = $_POST["selGender"];

    $sqlUpdate  = "UPDATE personas SET nombre = '$name', primerApellido ='$lastName1', segundoApellido = '$lastName2', sexo = '$gender', fechaNacimiento = '$date', entidadNacimiento = '$stateBirth' WHERE curp ='" . $curp . "'";
    $conn->exec($sqlUpdate);

    $sqlEstados= "SELECT * FROM estados WHERE idEstado='" . $stateBirth . "'";
    $stmt2 = $conn->query($sqlEstados);
    $rows2 = $stmt2->fetchAll();

    if (empty($rows2)) {
        $result2 = "Lo sentimos, no se encontraron resultados";
    } else {
		foreach ($rows2 as $row2) 
		{
			$nombreEstado = $row2['estado'];
		}
	}
?>
<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Persona editada</title>
<link href="../css/styles.css" rel="stylesheet" type="text/css">
</head>
<body>
    <?php
    include 'cabecera.php';
    ?>
    <div class="container">
        <div class="containercurp center">
            <div class="titlecurp">
                Persona actualizada correctamente
            </div>
            <div class="curp">
                <form id="formcurp">
                    <div>
                        <b class="text_bold">CURP:</b> <?php echo ($curp); ?>
                        <br />
                        <br />
                        <b class="text_bold">Nombre:</b> <?php echo ($name); ?>
                        <br />
                        <br />
                        <b class="text_bold">Apellido paterno:</b> <?php echo ($lastName1); ?>
                        <br />
                        <br />
                        <b class="text_bold">Apellido materno:</b> <?php echo ($lastName2); ?>
                        <br />
                        <br />
                        <b class="text_bold">Sexo:</b> <?php echo($gender) ?>
                        <br />
                        <br />
                        <b class="text_bold">Fecha de nacimiento:</b> <?php echo ($date); ?>
                        <br />
                        <br />
                        <b class="text_bold">Entidad de nacimiento:</b> <?php echo ($nombreEstado); ?>
                        <br>
                        <br>
                        <input type="button" value="Regresar" class="btnReturn" name="btnReturn" onclick="location.href='menu.php'">
                        <br>
                        <br>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>

</html>