<?php
require_once "proteccion.php";
require_once "conn_mysql.php";

$mensaje = "";
$name = $_POST["txtName"];
$lastName1 = $_POST["txtFirstLastName"];
$lastName2 = $_POST["txtSecondLastName"];
$curp = $_POST["txtCurp"];
$date = $_POST["txtDate"];
$stateBirth = $_POST["selStateBirth"];
$gender = $_POST["selGender"];

$sql = "SELECT * FROM personas WHERE curp =" . "'".$curp."'";
$result = $conn->query($sql);
$rows = $result->fetchAll();

if (empty($rows)) {
    $sqlP = "INSERT INTO personas(curp,nombre,primerApellido,segundoApellido,sexo,fechaNacimiento,entidadNacimiento)";
    $sqlP2 = $sqlP . "VALUES ('$curp', '$name', '$lastName1', '$lastName2', '$gender', '$date', '$stateBirth')";
    $result = $conn->query($sqlP2);
    $mensaje = "Persona registrada correctamente";

    foreach ($rows as $row) {
        if ($row['sexo'] == 'M') {
            $gender = 'Masculino';
        } else {
            $gender = 'Femenino';
        } 
    }
} else {
    $mensaje = "La persona no pudo ser registrada <br> La CURP ingresada ya existe en la base de datos";

    $name = "";
    $lastName1 = "";
    $lastName2 = "";
    $curp = "";
    $date = "";
    $stateBirth = "";
    $gender = "";
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Registro de personas</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <?php
    include 'cabecera.php';
    ?>
    <div class="container">
        <div class="containercurp center">
            <div class="titlecurp">
                <?php
                echo $mensaje;
                ?>
            </div>
            <div class="curp">
                <form id="formcurp" action="confirmar_contacto.php" method="post">
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
                        <b class="text_bold">Entidad de nacimiento:</b> <?php echo ($stateBirth); ?>
                        <br />
                        <br />
                        <input type="button" value="Registrar otra persona" class="btnSubmit" name="btnVac" onclick="location.href='alta_personas.php'">
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