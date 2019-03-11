<!DOCTYPE html>
    <head>
        <meta charset="utf-8" />
        <title>page prive</title>
    </head>
    <?php
// On appelle la méthode statique get() de la classe DB qui renvoit une instance du PDO.
$db = new PDO('mysql:host=localhost;dbname=dbadmin','root','');
$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$request = $db->prepare("select * from user");
$data = $request->execute();
?>
	<table>
		<caption>Liste des athlètes</caption>
		<thead>
			<tr>
				<th>Id</th>
				<th>Nom</th>
				<th>Prenom</th>
				<th>mail</th>
				<th>mdp</th>
				<th>date de naissance</th>
				<th>derniere connexion</th>
			</tr>
		</thead>
	<tbody>
<?php
// On récupère les données. Chaque ligne est sockée dans le tableau data.
    while($data = $request->fetch()) {
	    ?>
	<tr>
		<td><?php echo	$data['id']; ?></td> <!-- 'code' est une colonne de la BDD. -->
		<td><?php echo	$data['nom']; ?></td>
		<td><?php echo	$data['prenom']; ?></td>
		<td><?php echo	$data['mail']; ?></td>
		<td><?php echo	$data['mdp']; ?></td>
		<td><?php echo	$data['date_naissance']; ?></td>
		<td><?php echo	$data['last_connexion']; ?></td>
	</tr>
	<?php
    }
$request->closeCursor(); // ne pas oublier de fermer le curseur.
    ?>
    </tbody>
    </table>
</table>
    <body>
        <form method="post" action="../gestion/insertUser.php">
            <table><caption>Ajout d'un user</caption>
                <tr><td>Id: </td><td><input type="text" name="id" /></td></tr> </br>
                <tr><td>Nom : </td><td><input type="text" name="nom" /></td></tr></br>
                <tr><td>Prenom : </td><td><input name="prenom"/></tr></br> 
                <tr><td>mail : </td><td><input type="text" name="mail" /></td></tr></br>
                <tr><td>mdp : </td><td><input type="text" name="mdp" /></td></tr></br>
                <tr><td>Date de naissance : </td><td><input type="text" name="birthdate" /></td></tr></br>
                <tr><td>tout doit etre remplie</td><td><input type="submit" value="Valider" /></tr></br>
            </table>
        </form>
    </body>
</html>