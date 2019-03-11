<?php 
$db = new PDO('mysql:host=localhost;dbname=dbadmin','root','');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$request = $db->prepare('SELECT id FROM admin WHERE login = :login AND mdp = :mdp');
$request->execute(array('login'=>$_POST['login'],'mdp'=>$_POST['mdp']));
$result = $request->fetch();


if ($result != null ) {
    header('location: ../html/prive.php');
} 
else 
{
    echo 'PAS BON  mauvais mdp ou login';
}

?>