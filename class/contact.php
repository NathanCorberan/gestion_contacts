<?php
include 'db.php';  // Inclusion de la connexion à la base de données

class contact
{
    public $id, $nom, $email, $tel;  // Propriétés du contact
    private $PDO;  // Instance de la connexion à la base de données

    // Constructeur, initialise soit la connexion DB, soit les informations d'un contact
    function __construct()
    {
        $args_num = func_num_args();
        switch ($args_num)
        {
            case 0:
                $this->PDO = connectDB();  // Connexion sans paramètres
                break;
            case 4:
                // Initialise le contact avec les données passées en arguments
                $args_list = func_get_args();
                $this->id = $args_list[0];
                $this->nom = $args_list[1];
                $this->email = $args_list[2];
                $this->tel = $args_list[3];
                $this->PDO = connectDB();  // Connexion à la base de données
                break;
        }
    }

    // Méthodes d'accès aux propriétés (getters/setters)
    function getId(){return $this->id;}
    function getNom(){return $this->nom;}
    function getEmail(){return $this->email;}
    function getTel(){return $this->tel;}
    function setId($id){$this->id = $id;}
    function setNom($nom){$this->nom = $nom;}
    function setEmail($email){$this->email = $email;}
    function setTel($tel){$this->tel = $tel;}

    // Création d'un nouveau contact dans la base de données
    function create()
    {
        $sqlenvoie= "INSERT INTO contacts(nom, email, telephone) VALUES (:_nom, :_email, :_tel)";
        $STMT= $this->PDO->prepare($sqlenvoie);
        $STMT->bindParam(':_nom', $this->nom);
        $STMT->bindParam(':_email', $this->email);
        $STMT->bindParam(':_tel', $this->tel);
        $STMT->execute();
    }

    // Récupère les données d'un contact spécifique par son ID
    function retrieve($id)
    {
        $sqlenvoie= "SELECT * FROM contacts WHERE id = :_id";
        $STMT= $this->PDO->prepare($sqlenvoie);
        $STMT->bindParam(':_id', $id);
        $STMT->execute();
        return $STMT->fetch();  // Retourne le contact trouvé
    }

    // Mise à jour des informations d'un contact dans la base de données
    function update()
    {
        $sqlenvoie= "UPDATE contacts SET nom = :_nom, email = :_email, telephone = :_tel WHERE id = :_id";
        $STMT= $this->PDO->prepare($sqlenvoie);
        $STMT->bindParam(':_nom', $this->nom);
        $STMT->bindParam(':_email', $this->email);
        $STMT->bindParam(':_tel', $this->tel);
        $STMT->bindParam(':_id', $this->id);
        $STMT->execute();
    }

    // Supprime un contact de la base de données par son ID
    function delete($id)
    {
        $sql = "DELETE FROM contacts WHERE id = :_id";
        $STMT = $this->PDO->prepare($sql);
        $STMT->bindParam(':_id', $id);
        $STMT->execute();
    }

    // Récupère tous les contacts
    function findAll()
    {
        $req = "SELECT * FROM contacts";
        $STMT = $this->PDO->prepare($req);
        $STMT->execute();
        return $STMT->fetchAll();  // Retourne tous les contacts
    }
}
?>
