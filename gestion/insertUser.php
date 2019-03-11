<?php
//session_start() ;
$db = new PDO('mysql:host=localhost;dbname=dbadmin','root','');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$request = $db->prepare("INSERT INTO user (id, nom, prenom, mail, mdp, date_naissance, last_connexion) VALUES ('".$_POST['id']."','".$_POST['nom']."', '".$_POST['prenom']."', '".$_POST['mail']."', '".$_POST['mdp']."', '".$_POST['birthdate']."', '".date('m.d.y H:i:s')."');");
$data = $request->execute();
header('location: ../html/prive.php');
?>