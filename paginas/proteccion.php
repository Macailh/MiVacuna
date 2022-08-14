<?php
    session_start();

    if ($_SESSION["validado"] != "true") {
        header("Location: ../login.php");
        exit;
    }
?>