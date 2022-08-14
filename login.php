<?php
session_start();
$_SESSION["validado"] = "";
session_unset();
session_destroy();
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <title>Mi vacuna</title>
    <link rel="stylesheet" href="css/styles.css">
    <script src="https://kit.fontawesome.com/fee8a22a74.js" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script language="javascript" src="javascript/valida_login.js"></script>
</head>

<body>
    <h2 class="center">
        <br>
        <img src='imagenes/gmx.png' alt="Gobierno de México">
        <br>
        <br>
    </h2>
    <div class="navbar">
    </div>
    <div class="container">
        <div class="containercurp center">
            <div class="titlecurp">
                Login
            </div>
            <div class="curp">
                <form id="formcurp" method="post" onsubmit="return validaFormulario()" action="paginas/validacion.php">
                    <div class="loginContainer">
                        <input type="text" placeholder="Nombre de usuario" id="txtUser" name="txtUser" class="loginFields"><br><br>
                        <input type="password" placeholder="Contraseña" id="txtPass" name="txtPass" class="loginFields"><br><br>
                    </div>
                    <input type="submit" value="Ingresar" class="btnSubmit" id="btnSubmit" name="btnSubmit">
                </form>
            </div>
        </div>
    </div>
    <?php
    include 'paginas/footer.php';
    ?>
</body>

</html>