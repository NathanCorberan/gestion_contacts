<?php
include 'Class/contact.php';  // Inclusion de la classe 'contact' pour manipuler les données des contacts.

//Variables pour les inputs du formulaire
$nom = '';  
$email = '';  
$tel = '';  
$contact = new contact();  // Création d'une instance de la classe 'contact'

if (isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['tel'])) {  // Vérifie que tous les champs du formulaire sont remplis
    //Récupère et nettoie les inputs du formulaire
    $nom = trim($_POST['nom']);  
    $email = trim($_POST['email']);  
    $tel = trim($_POST['tel']); 

    // Vérification que le nom n'est pas vide
    if (empty($nom)) {
        die("Le nom ne peut pas être vide.");
    }

    // Vérification de la validité de l'email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Adresse email invalide.");
    }

    // Vérification que le numéro de téléphone contient 10 chiffres
    if (!preg_match('/^[0-9]{10}$/', $tel)) {
        die("Le numéro de téléphone doit contenir 10 chiffres.");
    }

    // Si toutes les validations passent, on attribue les valeurs au contact et on le crée dans la base de données
    $contact->setNom($nom);
    $contact->setEmail($email);
    $contact->setTel($tel);
    $contact->create();

    // Redirige vers la page d'accueil après la création du contact
    header('Location: index.php');
    exit;  // Arrête l'exécution du script après la redirection
} else {
    echo "Tous les champs sont obligatoires.";  // Message d'erreur si des champs sont manquants
}
?>
