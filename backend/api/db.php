<?php
$host = 'localhost';
$db_name = 'agenciadeviajes';
$username = 'root';
$password = 'leopas23';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$db_name", $username, $password);
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection error: " . $e->getMessage();
    exit();
}
?>
