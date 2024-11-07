<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="fr">
    <center>
        <link rel="stylesheet" href="css/styles.css">
        <header>
            <?php
            include 'header.php';
            include 'data.php';
            ?>
        </header>
        <body>
        <h2>Formulaire de Contact</h2>
        <form method="post">
            <label for="nom">Nom :</label>
            <br>
            <input type="text" id="nom" name="nom" required><br><br>
            <label for="email">Email :</label>
            <br>
            <input type="email" id="email" name="email" required><br><br>
            <label for="telephone">Téléphone :</label>
            <br>
            <input type="tel" id="telephone" name="tel" required><br><br>
            <button type="submit">Soumettre</button>
        </form>
        <br>

        <?php 
            showData($contact);
        ?>

        <br>
        </body>
        <footer>
            <?php
            include 'footer.php';
            ?>
        </footer>
    </center>
</html>
