<?php
// =============================================
// Configuration de la connexion à la base MySQL
// =============================================

$host = 'localhost';
$dbname = 'xboxsurvey';
$username = 'root';       // Utilisateur par défaut de WAMP
$password = '';            // Mot de passe vide par défaut sur WAMP

try {
    $pdo = new PDO(
        "mysql:host=$host;dbname=$dbname;charset=utf8mb4",
        $username,
        $password,
        [
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ]
    );
} catch (PDOException $e) {
    http_response_code(500);
    die("Erreur de connexion à la base de données : " . $e->getMessage());
}
?>
