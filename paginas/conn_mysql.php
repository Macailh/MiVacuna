<?php
    $servername = "fdb34.atspace.me";  // ------ Servidor donde está la BD
    $username = "3886738_mivacuna";         // ------ Usuario para entrar a la BD
    $password = "[9bh^l:90.N9uG-]";      // ------ Password para entrar a la BD
	$BasedeDatos = "3886738_mivacuna"; // ------ Nombre de tu base de datos
try {
    $conn = new PDO("mysql:host=$servername;dbname=$BasedeDatos;charset=utf8", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
	
catch(PDOException $e)
    {
    echo "<div align='center'><h1>Opss!! ha ocurrido un error en la conexion con la base de datos: </h1></div> " . $e->getMessage();
    }
?> 