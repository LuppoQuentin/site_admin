<?php 

class Utilisateur  
{
    private $id;
    private $nom;
    private $prenom;
    private $mail;
    private $mdp;
    private $dateLast;
    private $birthDate;

    function utilisateur($mId, $mNom, $mPrenom, $mMdp, $mDate, $mMail) extends Exception {
        $this->id = $mId;
        $this->nom = $mNom;
        $this->prenom = $mPrenom;
        verifBirthDate($mDate);
        verifMail($mMail);
        setMdp($mMdp);
        $this->dateLast = date('m.d.y H:i:s') ;
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

    function verifMail($mMail)
    {
        if (filter_var($mMail, FILTER_VALIDATE_EMAIL)) {
            echo "L'adresse email '$mMail' est considérée comme valide.";
            $this->mail = $mMail;
        } 
        else {
            throw new Exception(" emqil not good !");
        }

    }

    function verifBirthDate($mDate) {
        $month = '';
        $year = '';
        $date = '';
        preg_match("/[0-9]{0,2}\/([0-9]{0,2})\/[0-9]{0,4}/",$mDate,$month);
        preg_match("/[0-9]{0,2}\/[0-9]{0,2}\/([0-9]{0,4})/",$mDate,$year);
        preg_match("/([0-9]{0,2})\/[0-9]{0,2}\/[0-9]{0,4}/",$mDate,$date);
        $this->nom = $mNom;
        $this->prenom = $mPrenom;
        $this->setMdp($mMdp);
        if (checkdate($month[1],$date[1],$year[1])) {
            $this->birthDate =  $mDate;
        } else { 
            throw new Exception("birth date not good !");
        }
    }

    function infoUser() {
        echo $this->nom . '</br>' ;
        echo $this->prenom . '</br>';
        echo $this->birthDate . '</br>';
        echo $this->$mail. '</br>';
        echo $this->dateLast. '</br>';
    }

    function setLastDate() {
        $this->dateLast = date('m.d.y H:i:s') ;
    }
    
    function getName() {
        return $this->nom;
    }

    function getSurname() {
        return $this->prenom;
    }

    function getDateLast() {
        return $this->dateLast;
    }

}