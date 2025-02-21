<?php
//Model

class ModelPlayer implements InterfaceModel{

    // bind params: 
    private int $id;
    private string $pseudo;
    private string $email;
    private int $score;
    private string $password;
    private PDO $bdd;

    // constructor: 
    public function __construct($bdd){
        $this-> $bdd = connect();
    }


    // Getter and Setter: 
    public function getId(): int{
        return $this->id ;
    }
    public function setId(int $NewId): self{
        $this->id = $NewId;
        return $this;
    }

    public function getPseudo(): string{
       return $this->pseudo;
    }
    public function setPseudo(string $NewPseudo): self{
        $this->pseudo = $NewPseudo;
        return $this;
    }

    public function getEmail(): string{
        return $this->email;
    }
    public function setEmail(string $NewEmail): self{
        $this->email = $NewEmail;
        return $this;
    }

    public function getScore(): string{
        return $this->score;
    }
    public function setScore(int $NewScore): self{
        $this->score = $NewScore;
        return $this;
    }

    public function getPassword(): string{
        return $this->password;
    }
    public function setPassword(string $NewPassword): self{
        $this->password = $NewPassword;
        return $this;
    }
    public function getBdd(): PDO{
        return $this->bdd;
    }
    public function setBdd(PDO $NewBdd): self{
        $this->bdd = $NewBdd;
        return $this;
    }

    // Methods :

    public function add(): string
    {
        //request
        $requete = "INSERT INTO players(pseudo, email, score, psswrd) VALUE(?,?,?,?)";
        try {
            $bdd = $this->getBdd() ;//->connect()
            $pseudo = $this->getPseudo();
            $email = $this->getEmail();
            $score = $this->getScore();
            $password = $this->getPassword();

            //preparing sending data:
            $req = $bdd->prepare($requete);
            //link bind param with real datas
            $req->bindParam(1, $pseudo, PDO::PARAM_STR);
            $req->bindParam(2, $email, PDO::PARAM_STR);
            $req->bindParam(3, $score, PDO::PARAM_INT);
            $req->bindParam(4, $password, PDO::PARAM_STR);
            //send request to database
            $req->execute();

        } catch (Exception $e) {
            echo "Erreur" . $e->getMessage();
        }
        return 'Enregistrement effectué avec succès !';
    }

    // get all players in database and display them 
    public function getAll():array | null{
        try {
            $bdd = $this->getBdd(); //->connect();

            $requete = "SELECT  pseudo, email, score FROM players";
            $req = $bdd->prepare($requete);
            $req->execute();
            $data = $req->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }

    // Find player with it's email:
    public function getByEmail():array | null {
        try {
            $bdd = $this->getBdd(); //->connect();
            $email = $this->getEmail();
            $requete = "SELECT  pseudo, email,score  FROM players WHERE email = ?";
            $req = $bdd->prepare($requete);
            $req->bindParam(1,$email, PDO::PARAM_STR);
            $req->execute();
            $data = $req->fetch(PDO::FETCH_ASSOC);
            return $data;
        } catch (Exception $e) {
            echo "Erreur : " . $e->getMessage();
        }
    }
}
