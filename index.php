<?php
    session_start();  // Démarre une session PHP pour gérer les variables de session.
?>
<!DOCTYPE html>
<html lang="fr"> <!-- Déclaration du document HTML en français -->
    <center> <!-- Centrage du contenu, mais obsolète en HTML5 -->
        <link rel="stylesheet" href="css/styles.css"> <!-- Inclusion de la feuille de style CSS -->
        <header>
            <?php
            include 'header.php';  // Inclusion de l'en-tête du site
            include 'FindAll_Contact.php';  // Inclusion pour récupérer ou afficher des contacts
            ?>
        </header>
        <body>
        <h2>Formulaire de Contact</h2> <!-- Titre du formulaire -->
        <form method="post" action="add_contact.php"> <!-- Formulaire d'envoi des données -->
            <label for="nom">Nom :</label>
            <br>
            <input type="text" id="nom" name="nom" required> <!-- Champ pour le nom -->
            <br><br>
            <label for="email">Email :</label>
            <br>
            <input type="email" id="email" name="email" required> <!-- Champ pour l'email -->
            <br><br>
            <label for="telephone">Téléphone :</label>
            <br>
            <input type="tel" id="telephone" name="tel" required> <!-- Champ pour le téléphone -->
            <br><br>
            <button type="submit">Soumettre</button> <!-- Bouton d'envoi -->
        </form>
        <br>

        <?php 
            showData($contact);  // Affiche les données de contact
        ?>

        <br>
        </body>
        <footer>
            <?php
            include 'footer.php';  // Inclusion du pied de page du site
            ?>
        </footer>
    </center> <!-- Fermeture du centrage -->
</html>
