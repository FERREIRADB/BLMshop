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

function getDb()
{
    static $db;
    if ($db) {
        return $db;
    }
    return $db = new PDO("mysql:host=localhost;dbname=BLMshop", 'root', 'Super', array(
        PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
        PDO::ATTR_PERSISTENT => true,
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_EMULATE_PREPARES => false
    ));
}


