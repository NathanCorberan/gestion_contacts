<?php
include 'Class/contact.php';  // Inclusion de la classe 'contact' pour manipuler les contacts.

$contact = new contact();  // Création d'une instance de la classe 'contact'.

// Fonction pour afficher tous les contacts dans un tableau HTML
function showData($contact)
{
    $results = $contact->findAll();  // Récupère tous les contacts depuis la base de données.

    // Affichage du début du tableau HTML avec les en-têtes des colonnes
    echo '
         <table>
            <tr>
                <th>Id</th>
                <th>Nom</th>
                <th>Email</th>
                <th>Telephone</th>
                <th>Action</th>
            </tr>';

    // Boucle pour afficher chaque contact dans une ligne du tableau
    foreach ($results as $row) {
        echo '
                <tr>
                    <td>' . htmlspecialchars($row['id']) . '</td>  
                    <td>' . htmlspecialchars($row['nom']) . '</td>  
                    <td>' . htmlspecialchars($row['email']) . '</td>  
                    <td>' . htmlspecialchars($row['telephone']) . '</td>  
                    <td>
                        <a href="edit.php?id=' . $row['id'] . '">Modifier</a>  
                        <a href="delete_contact.php?id=' . $row['id'] . '">Supprimer</a> 
                    </td>
                </tr>';
    }

    // Fermeture du tableau HTML
    echo '</table>';
}
?>
