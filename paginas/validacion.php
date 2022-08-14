<?php
    session_start();
    ob_start();
    require_once "conn_mysql.php";
	
    $password = trim($_POST["txtPass"]);
	$user = trim($_POST["txtUser"]);
	
    $sqlLOGIN = "SELECT * FROM usuarios WHERE usuario='$user' AND clave='$password'";
    $result = $conn->query($sqlLOGIN);
    $rows = $result->fetchAll();	
	$cuantos = (int)$rows;
	if ($cuantos > 0){
	   $_SESSION["validado"]="true";
	   $conn = null;
       header("Location: menu.php");
	   exit;
    } else {
	    $conn = null;
        header("Location: ../login.php");
	   exit;
    }
?>