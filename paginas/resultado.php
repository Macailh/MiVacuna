<?php
require_once "conn_mysql.php";

if (isset($_POST["txtCurp"])) {
    $curp = $_POST["txtCurp"];
} else {
    $curp = $_GET["id"];
}

$sqlP = "SELECT * FROM personas WHERE curp=" . "'" . $curp . "'";
$resultP = $conn->query($sqlP);
$rowsP = $resultP->fetchAll();

$sqlR = "SELECT * FROM registros INNER JOIN personas ON registros.idPersona = personas.curp WHERE curp=" . "'" . $curp . "'";
$resultR = $conn->query($sqlR);
$rowsR = $resultR->fetchAll();

$cuantos = (int)$rowsP;
$cuantos2 = (int)$rowsR;

if ($cuantos == 0) {
    $mensaje = "";
    $name = $_POST["txtName"];
    $lastName1 = $_POST["txtFirstLastName"];
    $lastName2 = $_POST["txtSecondLastName"];
    $curp = $_POST["txtCurp"];
    $date = $_POST["txtDate"];
    $stateBirth = $_POST["selStateBirth"];
    $gender = $_POST["selGender"];

    $state = $_POST["selState"];
    $mun = $_POST["selMun"];
    $cp = $_POST["txtCp"];
    $phone = $_POST["txtTelefono"];
    $phone2 = $_POST["txtTelefono2"];
    $email = $_POST["txtEmail"];
    $email2 = $_POST["txtEmail2"];
    $note = $_POST["txtNote"];
    $folio = uniqid();

    $sqlP = "INSERT INTO personas(curp,nombre,primerApellido,segundoApellido,sexo,fechaNacimiento,entidadNacimiento)";
    $sqlP2 = $sqlP . "VALUES ('$curp', '$name', '$lastName1', '$lastName2', '$gender', '$date', '$stateBirth')";
    $result = $conn->query($sqlP2);

    $sqlC = "INSERT INTO contactos(idPersona,telefono1,telefono2,email1,email2,notas)";
    $sqlC2 = $sqlC . "VALUES ('$curp', '$phone', '$phone2', '$email', '$email2', '$note')";
    $result = $conn->query($sqlC2);

    $sqlR = "INSERT INTO registros(idRegistro,idEstado,idMunicipio,codigoPostal,idPersona)";
    $sqlR2 = $sqlR . "VALUES ('$folio','$state', '$mun', '$cp', '$curp')";
    $result = $conn->query($sqlR2);

    $mensaje = "Ud. ha sido registrado exitosamente.<br>Con el folio: " . $folio . ".<br>" .
        "Espera nuestra llamada donde le indicaremos su fecha y lugar de vacunación<br>" .
        "CURP: " . $curp;
} else if ($cuantos == 1 && $cuantos2 == 0) {
    $state = $_POST["selState"];
    $mun = $_POST["selMun"];
    $cp = $_POST["txtCp"];
    $phone = $_POST["txtTelefono"];
    $phone2 = $_POST["txtTelefono2"];
    $email = $_POST["txtEmail"];
    $email2 = $_POST["txtEmail2"];
    $note = $_POST["txtNote"];
    $folio = uniqid();
    $curp = $_POST["txtCurp"];

    $sqlC = "INSERT INTO contactos(idPersona,telefono1,telefono2,email1,email2,notas)";
    $sqlC2 = $sqlC . "VALUES ('$curp', '$phone', '$phone2', '$email', '$email2', '$note')";
    $result = $conn->query($sqlC2);

    $sqlR = "INSERT INTO registros(idRegistro,idEstado,idMunicipio,codigoPostal,idPersona)";
    $sqlR2 = $sqlR . "VALUES ('$folio','$state', '$mun', '$cp', '$curp')";
    $result = $conn->query($sqlR2);

    $sqlV = "SELECT * FROM personas WHERE curp=" ."'" .$curp."'";
    $result = $conn->query($sqlV);
    $rows = $result->fetchAll();

    foreach ($rows as $row) {
        $name = $row['nombre'];
        $lastName1 = $row['primerApellido'];
        $lastName2 = $row['segundoApellido'];
    }

    $mensaje = "Ud. ha sido registrado exitosamente.<br>Con el folio: " . $folio . ".<br>" .
    "Espera nuestra llamada donde le indicaremos su fecha y lugar de vacunación<br>" .
    "CURP: " . $curp;
} else if ($cuantos > 0 && $cuantos2 > 0) {
    $sqlV = "SELECT * FROM personas WHERE curp=" ."'" .$curp."'";
    $result = $conn->query($sqlV);
    $rows = $result->fetchAll();

    $sqlC = "SELECT * FROM contactos WHERE idPersona=" . "'".$curp."'";
    $resultC = $conn->query($sqlC);
    $rowsC = $resultC->fetchAll();
    
    $sqlR = "SELECT * FROM registros INNER JOIN personas ON registros.idPersona = personas.curp WHERE curp=" . "'".$curp."'";
    $resultR = $conn->query($sqlR);
    $rowsR = $resultR->fetchAll();
    foreach ($rows as $row) {
        $curp = $row['curp'];
        $name = $row['nombre'];
        $lastName1 = $row['primerApellido'];
        $lastName2 = $row['segundoApellido'];
    }
    foreach ($rowsC as $rowC) {
        $phone = $rowC['telefono1'];
        $phone2 = $rowC['telefono2'];
        $email = $rowC['email1'];
    }
    foreach ($rowsR as $rowR) {
        $folio = $rowR['idRegistro'];
        $cp = $rowR['codigoPostal'];
        $state = $rowR['idEstado'];
        $mun = $rowR['idMunicipio'];
    }

    $mensaje = "Ud. ha sido registrado exitosamente.<br>Con el folio: " . $folio . ".<br>" .
    "Espera nuestra llamada donde le indicaremos su fecha y lugar de vacunación<br>" .
    "CURP: " . $curp;
}
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Mi vacuna</title>
    <link rel="stylesheet" href="../css/styles.css">
</head>

<body>
    <?php
    include 'cabecera.php';
    ?>
    <div class="container">
        <form id="formcurp" action="comprobante.php" method="post">
            <div class="containercurp center">
                <div class="titlecurp">
                    Resultado:
                </div>
                <div class="curp">

                    <div id="textResultado">
                        <?php
                        echo '<b id="textResultado">' . $mensaje . '</b>';
                        ?>
                    </div>
                    <input type="hidden" value="<?php echo $curp ?>" name="txtCurp" id="txtCurp">
                    <input type="hidden" value="<?php echo $folio ?>" name="txtFolio" id="txtFolio">
                    <input type="hidden" value="<?php echo $name ?>" name="txtName" id="txtCurp">
                    <input type="hidden" value="<?php echo $lastName1 ?>" name="txtFirstLastName" id="txtFirstLastName">
                    <input type="hidden" value="<?php echo $lastName2 ?>" name="txtSecondLastName" id="txtSecondLastName">
                    <input type="hidden" value="<?php echo $phone ?>" name="txtTelefono" id="txtTelefono">
                    <input type="hidden" value="<?php echo $phone2 ?>" name="txtTelefono2" id="txtTelefono2">
                    <input type="hidden" value="<?php echo $email ?>" name="txtEmail" id="txtEmail">
                    <input type="hidden" value="<?php echo $cp ?>" name="txtCp" id="txtCp">
                    <input type="hidden" value="<?php echo $mun ?>" name="txtMun" id="txtMun">
                    <input type="hidden" value="<?php echo $state ?>" name="txtState" id="txtState">
                </div>
            </div>
            <div class="containerbutton">
                <input type="submit" value="Comprobante" class="btnReturn" name="btnCom" onclick="">
            </div>
        </form>
    </div>
    <?php
    include 'footer.php';
    ?>
</body>

</html>