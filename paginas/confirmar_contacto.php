<?php 
    require_once "conn_mysql.php";
    include "consulta_entidades.php"; 
    $curp = $_GET["id"]; 
    $sqlP = "SELECT curp,nombre,primerApellido,segundoApellido,sexo,fechaNacimiento,estado,entidadNacimiento FROM personas 
    INNER JOIN estados ON personas.entidadNacimiento = estados.idEstado
    WHERE curp=" ."'" .$curp."'";
    $resultP = $conn->query($sqlP);
    $rowsP = $resultP->fetchAll();
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi vacuna</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script language="javascript" src="../javascript/valida_persona.js"></script>
    <script language="javascript" src="../javascript/obtener_municipios.js"></script>
    <script language="javascript" src="../javascript/valida_contacto_lugar.js"></script>
</head>
<body>
    <?php
        include 'cabecera.php';
    ?>
    <div class="container">
        <form id="formcurp" onsubmit="return validaContacto();" method="post" action="resultado.php">
            <?php 
            foreach($rowsP as $rowP){
            ?>
            <div class="containerForm center">
                <div class="titlecurp">
                    Confirmar CURP
                </div>
                <div class="containerFormCurp">
                    <div id="name">
                        <label for="txtName" class="">Nombre</label>
                        <br>
                        <input type="text" name="txtName" id="txtName" class="txt" value="<?php echo $rowP['nombre'] ?>" disabled>
                        <input type="hidden" name="txtName" id="txtName" class="txt" value="<?php echo $rowP['nombre'] ?>">
                    </div>
                    <div class="firstLastName">
                        <label for="txtFirstLastName" class="">Primer apellido</label>
                        <br>
                        <input type="text" name="txtFirstLastName" id="txtFirstLastName" class="txt" value="<?php echo $rowP['primerApellido'] ?>" disabled>
                        <input type="hidden" name="txtFirstLastName" id="txtFirstLastName" class="txt" value="<?php echo $rowP['primerApellido'] ?>">  
                    </div>
                    <div class="txtSecondLastName">
                        <label for="txtSecondLastName" class="">Segundo apellido</label>
                        <br>
                        <input type="text" name="txtSecondLastName" id="txtSecondLastName" class="txt" value="<?php echo $rowP['segundoApellido'] ?>" disabled>
                        <input type="hidden" name="txtSecondLastName" id="txtSecondLastName" class="txt" value="<?php echo $rowP['segundoApellido'] ?>">
                    </div>
                    <div class="txtCurp">
                        <label for="txtCurp"" class="">CURP</label>
                        <br>
                        <input type="text" name="txtCurp" id="txtCurp" class="txt" value="<?php echo $curp ?>" disabled>
                        <input type="hidden" value="<?php echo $curp ?>" id="txtCurp" name="txtCurp">
                    </div>
                    <div class="txtDate">
                        <label for="txtDate" class="">Fecha de nacimiento</label>
                        <br>
                        <input type="date" name="txtDate" id="txtDate" class="txt" value="<?php echo $rowP['fechaNacimiento'] ?>" disabled>
                        <input type="hidden" name="txtDate" id="txtDate" class="txt" value="<?php echo $rowP['fechaNacimiento'] ?>">
                    </div>
                    <div class="txtState">
                        <label for="selStateBirth" class="">Entidad de nacimiento</label>
                        <br>
                        <select name="selStateBirth" id="selStateBirth" class="txt">
                            <option value="<?php echo $rowP['entidadNacimiento'] ?>" selected><?php echo $rowP['estado'] ?></option>
                        </select>
                    </div>
                    <div class="txtGender">
                        <label for="selGender" class="">Sexo</label>
                        <br>
                        <select name="selGender" id="selGender" class="txt">
                            <option value="<?php echo $rowP['sexo'] ?>" selected><?php if ($rowP['sexo']== 'M') {
                                echo 'Masculino';
                            } else {
                                echo 'Femenino';
                            }
                             ?></option>
                        </select>
                    </div>
                </div>
                <div class="containerSubmit">
                    <input type="button" value="Quiero vacunarme" class="btnSubmit" name="btnVac" onclick="return validaPersona();">
                    <br>
                    <br>
                    <input type="button" value="Regresar" class="btnReturn" name="btnReturn" onclick="location.href='inicio.php'">
                    <br>
                    <br>
                </div>
            </div>
            <div id="form2" style="display: none;" class="containerForm center">
                <?php include "form2.php"; ?>                    
            </div>
            <?php 
            }
            ?>
        </form>
    </div>
    <?php
    include 'footer.php';
    ?>    
</body>
</html>