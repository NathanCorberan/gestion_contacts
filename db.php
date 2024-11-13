<?php
function connectDB() {
    $host = 'localhost';         
    $dbname = 'contacts_db';     
    $username = 'root';
    $password = '';
    $charset = 'utf8mb4';       

    $dsn = "mysql:host=$host;dbname=$dbname;charset=$charset";

    try {
        // Création de l'objet PDO
        $pdo = new PDO($dsn, $username, $password);

        // Configuration des options PDO
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC); 

        return $pdo; 
    } catch (PDOException $e) {
        echo 'Erreur de connexion : ' . $e->getMessage();
        exit;
    }
}
