<?php

$serverName = "whatever_shoes_tcc.mssql.somee.com";
$databaseName = "whatever_shoes_tcc";
$uid = "Carlos4689_SQLLogin_3";
$pwd = "Some@conn#40";

try {
    $conn = new PDO("sqlsrv:Server=$serverName;Database=$databaseName", $uid, $pwd);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Conexão bem-sucedida!";
    
} catch (PDOException $e) {
    die("Erro na conexão: " . $e->getMessage());
}
