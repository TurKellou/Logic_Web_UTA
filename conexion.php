<?php
// Solución al error fatal: Definimos la ruta absoluta del proyecto
define('BASE_URL', 'http://localhost/UTA/');

// Credenciales por defecto de XAMPP
$host = 'localhost';
$dbname = 'logicweb_uta';
$user = 'root';
$pass = '';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8mb4", $user, $pass);
    // Habilitar el reporte de errores de PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    die("Error crítico de conexión a la base de datos: " . $e->getMessage());
}
?>