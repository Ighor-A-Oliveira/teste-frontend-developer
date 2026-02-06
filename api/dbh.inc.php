<?php
$host = getenv('DB_HOST') ?: "localhost";
$port = getenv('DB_PORT') ?: "3307";
$dbname = getenv('DB_NAME') ?: "db_testetecnico";
$dbusername = getenv('DB_USER') ?: "root";
$dbpassword = getenv('DB_PASSWORD') ?: "";

$dsn = "mysql:host=$host;port=$port;dbname=$dbname;charset=utf8";
try{
    $pdo = new PDO($dsn, $dbusername, $dbpassword);
    // if an error happens we throw an exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    http_response_code(500);
    echo "Erro na conexão."; 
    exit(); 
}