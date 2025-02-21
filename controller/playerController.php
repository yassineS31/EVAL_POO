<?php
// Create PlayerController class using AbstractController model (inherit) 
class PlayerController extends AbstractController{
    // Bind param:
    private ViewPlayer $player;

    // Getter and Setter : 

    public function getPlayer(): ViewPlayer{
        return $this ->player;
    }
    public function setPlayer(ViewPlayer $NewPlayer):self{
        $this->player = $NewPlayer;
        return $this;
    }


    // Function for add new player in database:
    public function addPlayer():string{
            //Check if form send correctly
            if(isset($_POST['signUpMessage'])){
                echo 'test';
                //check if all of inputs are not empty
                if(empty($_POST['pseudo']) || empty($_POST['email']) || empty($_POST['password']) || empty($_POST['score'])){
                    //render error message if it doesnt work
                    return "Veuillez remplir tout les champs !";
                }
        
                //check email formate
                if(!filter_var($_POST['email'],FILTER_VALIDATE_EMAIL)){
                    //error message if it doesnt work
                    return "Email pas au bon format !";
                }
        
                //Clean datas
                $pseudo = sanitize($_POST['pseudo']);
                $email = sanitize($_POST['email']);
                $password = sanitize($_POST['password']);
                $score = sanitize($_POST['score']);

    
                //Hash password
                $password = password_hash($password, PASSWORD_BCRYPT);
        
                //Check if user doesnt exist in database:
                // if(!empty($this->getPlayerList()["listModel"]->setEmail($email)->getByEmail())){
                //     //render error mesage if it's doesnt work
                //     return "Cet email existe déjà !";
                // }
        
                // register new player in database:
                $player = [$pseudo, $email, $password, $score];
                $this->getPlayer()->setSignUpMessage($player);
            
                return "$pseudo a été enregistré  avec un score de $score !";
            }
            return '';
        }


        // display all views on index.html page
        public function render():void{
                $this->getHeader()->displayView();
                echo $this->getPlayer()->getSignUpMessage();
                echo $this->getPlayer()->getPlayerList();
                $this->getFooter()->displayView();
        }
    }
