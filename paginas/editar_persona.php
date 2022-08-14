<?php
    require_once "proteccion.php";
    require_once "conn_mysql.php";

    $result = "";
    $curp = $_GET["id"];

    if ($curp == "") {
        header("Location: menu.php");
    }
    if (is_null($curp)) {
        header("Location: menu.php");
    }

    $sql3 = 'SELECT curp,nombre,primerApellido,segundoApellido,sexo,fechaNacimiento,entidadNacimiento,estado FROM personas 
    INNER JOIN estados ON personas.entidadNacimiento = estados.idEstado WHERE curp=' . "'".$curp."'";
    $result = $conn->query($sql3);
    $rows = $result->fetchAll();

    if (empty($rows)) {
        $result = "Lo sentimos, no se encontraron personas";
		header("Location: menu.php");
		exit;
    }
    include "consulta_entidades.php"; 
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar personas</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script language="javascript" src="../javascript/valida_persona.js"></script>
    <script language="javascript" src="../javascript/obtener_municipios.js"></script>
</head>
<body>
    <?php
        include 'cabecera.php';
    ?>
    <div class="container">
        <form id="formcurp" onsubmit="return validaPersona();" method="post" action="actualizar_persona.php">
            <?php
                foreach ($rows as $row) {
            ?>
            <div class="containerForm center">
                <div class="titlecurp">
                    Editar persona
                </div>
                <div class="containerFormCurp">
                    <div class="txtCurp">
                        <label for="txtCurp"" class="">CURP</label>
                        <br>
                        <input type="text" name="txtCurp" id="txtCurp" class="txt" value="<?php echo $row['curp'] ?>" disabled>
                        <input type="hidden" name="txtCurpOculto" id="txtCurpOculto" class="txt" value="<?php echo $row['curp'] ?>">
                    </div>
                    <div id="name">
                        <label for="txtName" class="">Nombre</label>
                        <br>
                        <input type="text" name="txtName" id="txtName" class="txt" value="<?php echo $row['nombre'] ?>">
                    </div>
                    <div class="firstLastName">
                        <label for="txtFirstLastName" class="">Primer apellido</label>
                        <br>
                        <input type="text" name="txtFirstLastName" id="txtFirstLastName" class="txt" value="<?php echo $row['primerApellido'] ?>">
                    </div>
                    <div class="txtSecondLastName">
                        <label for="txtSecondLastName" class="">Segundo apellido</label>
                        <br>
                        <input type="text" name="txtSecondLastName" id="txtSecondLastName" class="txt" value="<?php echo $row['segundoApellido'] ?>">
                    </div>
                    
                    <div class="txtDate">
                        <label for="txtDate" class="">Fecha de nacimiento</label>
                        <br>
                        <input type="date" name="txtDate" id="txtDate" class="txt" value="<?php echo $row['fechaNacimiento'] ?>">
                    </div>
                    <div class="txtState">
                        <label for="selStateBirth" class="">Entidad de nacimiento</label>
                        <br>
                        <select name="selStateBirth" id="selStateBirth" class="txt">
                            <option value="0">Selecciona un estado</option>
                            <?php
                                foreach ($rowse as $rowe) {
                                    echo '<option value="' . $rowe['idEstado'] . '">' . $rowe['estado'] . '</option>';
                                }
                            ?>
                            <option value="<?php echo $row['entidadNacimiento'] ?>" selected><?php echo $row['estado'] ?></option>
                        </select>
                    </div>
                    <div class="txtGender">
                        <label for="selGender" class="">Sexo</label>
                        <br>
                        <select name="selGender" id="selGender" class="txt">
                            <?php
                                if ($row['sexo'] == 'M') {
                                    echo '<option value="F">Femenino</option>';
                                } else {
                                    echo '<option value="M">Masculino</option>';
                                }
                            ?>
                            <option value="<?php echo $row['sexo']; ?>" selected><?php if ($row['sexo']== 'M') {
                                echo 'Masculino';
                            } else {
                                echo 'Femenino';
                            }
                             ?></option>
                        </select>
                    </div>
                </div>
                <div class="containerSubmit">
                    <input type="submit" value="Actualizar persona" class="btnSubmit" name="btnVac">
                    <br>
                    <br>
                    <input type="button" value="Regresar" class="btnReturn" name="btnReturn" onclick="location.href='menu.php'">
                    <br>
                    <br>
                </div>
            </div>
            <?php
                }
            ?>
        </form>
    </div>    
</body>
</html>