<?php
include 'Class/contact.php';  // Inclusion de la classe 'contact' pour gérer les données des contacts.

if (isset($_GET['id'])) {  // Vérifie si un ID de contact est passé dans l'URL.
    $id = $_GET['id'];  // Récupère l'ID du contact à modifier.
    $contact = new contact();  // Crée une nouvelle instance de la classe 'contact'.
    
    $contactData = $contact->retrieve($id);  // Récupère les données du contact via la méthode 'retrieve' de la classe 'contact'.
} else {
    echo "ID de contact non spécifié.";  // Si l'ID n'est pas spécifié dans l'URL, affiche un message d'erreur.
    exit;  // Arrête l'exécution du script.
}
?>
<!DOCTYPE html>
<html lang="fr">
    <center> <!-- Centre le contenu de la page (méthode obsolète en HTML5) -->
        <link rel="stylesheet" href="css/styles.css">  <!-- Inclusion de la feuille de style CSS -->
        <header>
            <?php include 'header.php'; ?>  <!-- Inclusion de l'en-tête du site -->
        </header>
        <body>
        <h2>Formulaire de modification de Contact</h2> <!-- Titre de la page -->

        <!-- Formulaire permettant de modifier un contact -->
        <form method="post" action="edit_contact.php">
            <input type="hidden" name="id" value="<?php echo $contactData['id']; ?>"> <!-- Champ caché pour l'ID du contact -->
            
            <label for="nom">Nom :</label><br>
            <input type="text" id="nom" name="nom" value="<?php echo htmlspecialchars($contactData['nom']); ?>" required><br><br> <!-- Champ de saisie pour le nom, avec la valeur actuelle du contact -->
            
            <label for="email">Email :</label><br>
            <input type="email" id="email" name="email" value="<?php echo htmlspecialchars($contactData['email']); ?>" required><br><br> <!-- Champ de saisie pour l'email -->
            
            <label for="telephone">Téléphone :</label><br>
            <input type="tel" id="telephone" name="tel" value="<?php echo htmlspecialchars($contactData['telephone']); ?>" required><br><br> <!-- Champ de saisie pour le téléphone -->
            
            <button type="submit">Modifier</button> <!-- Bouton pour soumettre les modifications -->
        </form>
        
        <br>
        </body>
        <footer>
            <?php include 'footer.php'; ?> <!-- Inclusion du pied de page -->
        </footer>
    </center>
</html>
