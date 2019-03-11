<?php 

class Utilisateur  
{
    private $id;
    private $login;
    private $mdp;

    function utilisateur($mId, $mLogin,$mMdp) extends Exception {
        $this->id = $mId;
        $this->login = $mLogin;
        setMdp($mMdp);
    }

    function setMdp($mMdp) {
        $length = strlen($mMdp);
        if ( $length <= 6) {
            throw new Exception(" mdp length not good <6 !");
            error_reporting(0);
        } 
        elseif (preg_match('#^(?=.*[a-z])(?=.*[A-Z])(?=.*[0-9])(?=.*\W)#',$mMdp)) 
        {
            echo 'Mot de passe conforme';
            echo '</br>';
            $this->mdp = $mMdp;
        }
        else 
        {
            throw new Exception(" mdp  not good <6 & 1 number min & 1 maj min !");
        }
    }


    function infoUser() {
        echo $this->id . '</br>' ;
        echo $this->nom . '</br>';
    }

    function getLogin() {
        return $this->nom;
    }

    function verifLogin($mLogin,$mMdp) {
        if (strcasecmp($mLogin,$this->login)) {
            return false
        }
        elseif (strcasecmp($mMdp,$this->mdp)) {
            return false
        }
        else {
            return true
        }
    }

}