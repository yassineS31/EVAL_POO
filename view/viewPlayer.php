<?php

class ViewPlayer {
    // Bind param: 
    private string $signUpMessage ='' ;
    private string $playerList ='';
    
    // // constructor: 
    // public function __construct(string $signUpMessage,string $playerList){
    //     $this->signUpMessage = $signUpMessage;
    //     $this->playerList = $playerList;
    // }
    

    // Getter and Setter :

    public function getSignUpMessage(): string{
        return $this->signUpMessage;
    }

    public function setSignUpMessage($NewSignUpMessage):self{
        $this->signUpMessage = $NewSignUpMessage;
        return $this;
    }

    public function getPlayerList(): string{
        return $this->playerList;
    }

    public function setPlayerList($NewPlayerList): self{
        $this->playerList = $NewPlayerList;
        return $this;
    }

    // Method for display form and it message, and also the user's list (all players):
     public function displayView(string $signUpMessage,string $playerList):string{
        return
"
            <section>
                <h2>Inscription d'un Joueur</h2>
                <form action='' method='post'>
                    <input type='text' name='pseudo' placeholder='Votre Pseudo'>
                    <input type='text' name='email' placeholder='Votre Email'>
                    <input type='password' name='password' placeholder='Votre Mot de Passe'>
                    <input type='score' name='score' placeholder='Votre Score'>
                    <input type='submit' name='signUpMessage'>
                </form>
                <p> $signUpMessage</p>
            </section>
            <section>
                $playerList;
            </section>
            "
            ;
     }
}
