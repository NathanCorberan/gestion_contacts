<?php
include 'Class/contact.php';
    $nom = '';
    $email = '';
    $tel = '';
    $contact = new contact();

    if (isset($_POST['nom']) && isset($_POST['email']) && isset($_POST['tel'])) {
        $nom = $_POST['nom'];
        $email = $_POST['email'];
        $tel = $_POST['tel'];
        $contact->setNom($nom);
        $contact->setEmail($email);
        $contact->setTel($tel);
        $contact->create();
    }

    function showData($contact)
    {
        $results = $contact->findAll();
        echo '
             <table>
                <tr>
                    <th>Id</th>
                    <th>Nom</th>
                    <th>Email</th>
                    <th>Telephone</th>
                </tr>';
        foreach ($results as $row) {
            echo '
                    <tr>
                        <td>' . $row['id'] . '</td>
                        <td>' . $row['nom'] . '</td>
                        <td>' . $row['email'] . '</td>
                        <td>' . $row['telephone'] . '</td>
                    </tr>                
            ';
        }
        echo '</table>';
    }
?>
