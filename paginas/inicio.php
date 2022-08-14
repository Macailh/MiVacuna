<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Mi vacuna</title>
    <link rel="stylesheet" href="../css/styles.css">
    <script src="https://kit.fontawesome.com/fee8a22a74.js" crossorigin="anonymous"></script>
    <script src="https://www.google.com/recaptcha/api.js" async defer></script>
    <script language="javascript" src="../javascript/valida_curp.js"></script>
    <script language="javascript" src="../javascript/activar_boton.js"></script>
    <script language="javascript" src="../javascript/valida_curpi.js"></script>
</head>
<body>
    <?php
        include 'cabecera.php';
    ?>
    <div class="container">
        <div class="containercurp center">
            <div class="titlecurp">
                Soy mayor de 18 años y estoy embarazada o este año cumplo 40 años o más y me quiero vacunar:
            </div>
            <div class="curp">
                <form id="formcurp" action="valida_curp.php" onsubmit="return validaCurp()" method="post">
                    <div>
                        <div id="user">
                            <i class="fas fa-user"></i>  
                        </div>
                        <input type="text" placeholder="Introducir CURP" name="txtcurp" id="txtcurp" oninput="validarInput(this)" onchange="activarBoton();" style="text-transform:uppercase;"><br><br>
                        <pre id="resultado"></pre>
                        <br>
                        <div class="center">
                            <div class="g-recaptcha" data-sitekey="6LengXEbAAAAAMTA8Xrxwylpv7YA702-17TH7xaz" data-callback="enabledSubmit"></div>
                        </div>
                        <br>
                        <input type="submit" value="Confirmar CURP" class="btnSubmit" id="btnSubmit" name="btnSubmit" disabled>
                    </div>
                </form>
            </div>
        </div>
        <div class="containerbutton">
            <div id="guide">
                <a href="https://mivacuna.salud.gob.mx/pdf/registro_vacuna_imgns_c6.pdf" class="btn blue" role="button" target="_blank">
                Guía para registrarse en mivacuna</a>
            </div>
            <div id="consultcurp">
                <a href="https://www.gob.mx/curp/" target="_blank" class="btn green" role="button" target="_blank"> 
                ¿No conoces tu CURP...? Consúltala aquí</a>
            </div>
            <div id="privacy">
                <a href="https://mivacuna.salud.gob.mx/pdf/aviso_de_privacidad_integral.pdf" class="btn gray" role="button" target="_blank">
                Aviso de Privacidad</a>
            </div>
            <div id="info">
                <a href="https://mivacuna.salud.gob.mx/pdf/info_segunda_dosis.pdf" class="btn darkcyan" role="button" target="_blank">
                Información segunda dosis</a>
            </div>
        </div>
    </div>
    <?php
    include 'footer.php';
    ?>
   </body>
</html>