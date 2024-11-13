<?php
include 'Class/contact.php';  // Inclusion de la classe 'contact' pour manipuler les contacts

// Vérifie que la méthode de la requête est POST
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Récupération des données envoyées via POST
    $id = $_POST['id'];
    $nom = trim($_POST['nom']);  // Nettoyage du nom
    $email = trim($_POST['email']);  // Nettoyage de l'email
    $tel = trim($_POST['tel']);  // Nettoyage du téléphone

    // Validation des données
    if (empty($nom)) {
        die("Le nom ne peut pas être vide.");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Adresse email invalide.");
    }

    if (!preg_match('/^[0-9]{10}$/', $tel)) {
        die("Le numéro de téléphone doit contenir 10 chiffres.");
    }

    // Création d'un objet contact avec les informations validées et mise à jour du contact
    $contact = new contact($id, $nom, $email, $tel);
    $contact->update();  // Mise à jour des informations du contact dans la base de données

    // Redirection vers la page d'accueil après la mise à jour
    header("Location: index.php");
    exit;  // Arrêt de l'exécution du script après la redirection
} else {
    echo "Requête invalide.";  // Message d'erreur si la méthode de la requête n'est pas POST
}
?>
