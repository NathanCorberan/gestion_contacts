<?php
include 'Class/contact.php';  // Inclusion de la classe 'contact' pour manipuler les contacts

// Vérifie si l'ID du contact est passé dans l'URL
if (isset($_GET['id'])) {
    $id = $_GET['id'];  // Récupère l'ID du contact à supprimer
    $contact = new contact();  // Création d'une instance de la classe 'contact'
    
    // Appelle la méthode delete() de l'objet 'contact' pour supprimer le contact
    $contact->delete($id);
    
    // Redirige vers la page principale (index.php) après suppression
    header("Location: index.php");
    exit;  // Arrête l'exécution du script après la redirection
} else {
    // Affiche un message d'erreur si l'ID n'est pas spécifié dans l'URL
    echo "ID de contact non spécifié.";
}
?>
