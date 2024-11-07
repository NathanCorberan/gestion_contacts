<?php
    class contact
    {
        public $id;
        public $nom;
        public $email;
        public $tel;
        private $PDO;

        function __construct()
        {
            $args_num = func_num_args();

            switch ($args_num)
            {
                case 0:
                    $this->PDO = new PDO("mysql:host=localhost;dbname=gestion_contacts", 'root', '');
                    break;
                case 4:
                    $args_list = func_get_args();
                    $this->id = $args_list[0];
                    $this->nom = $args_list[1];
                    $this->email = $args_list[2];
                    $this->tel = $args_list[3];
                    $this->PDO = new PDO("mysql:host=localhost;dbname=gestion_contacts", 'root', '');
                    break;
            }
        }

        function getId(){return $this->id;}
        function getNom(){return $this->nom;}
        function getEmail(){return $this->email;}
        function gettel(){return $this->tel;}
        function setId($id){$this->id = $id;}
        function setNom($nom){$this->nom = $nom;}
        function setEmail($email){$this->email = $email;}
        function setTel($tel){$this->tel = $tel;}

        function create()
        {
            $sqlenvoie= "INSERT INTO contact(nom, email, telephone) VALUES (:_nom, :_email, :_tel)";
            $STMT= $this->PDO->prepare($sqlenvoie);
            $STMT->bindParam(':_nom', $this->nom);
            $STMT->bindParam(':_email', $this->email);
            $STMT->bindParam(':_tel', $this->tel);
            $STMT->execute();
        }

        function findAll()
        {
            $req = "SELECT * FROM contact";
            $STMT = $this->PDO->prepare($req);
            $STMT->execute();
            $result = $STMT->fetchAll();
            $_SESSION['findAll'] = $result;
            return $result;
        }


    }
?>