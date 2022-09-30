<?php 

$dsn = 'mysql:dbname=BLMshop;host=localhost';
$user = 'root';
$pass = 'Super';
session_start();

try {
    $pdo = new PDO($dsn, $user, $pass);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    if (!isset($_SESSION['connected'])) {
        $_SESSION['connected'] = false;
    }
} catch (PDOException $e) {
    echo "PDO error " . $e->getMessage();
    die();
}


