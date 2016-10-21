<?php 	session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">


<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
</head>
<body>
	<?php 
	//je verifie l'existance de mes POST pour eviter toute erreur.
if(isset($_POST['email']) && isset($_POST['password'])){
	$_SESSION['mail'] = htmlspecialchars($_POST['email']);
	$_SESSION['pass'] = md5($_POST['password']);
	//je me connect a la base de donné
	if($_POST['checkbox'] == 'on'){
		$check = true;
	}else{
		$check = false;
	}
	try{
		$dbh = new PDO('mysql:host=localhost;dbname=Simplon;charset=utf8', 'root', 'M+D=cdna4');
	}catch(Exception $e){
		die('Erreur: ' . $e->getMessage());
	}
	//je récupere aussi les POST dans des varialbe aussi au cas ou j'en est besoin.
	$email = htmlspecialchars($_POST['email']);
	$password = md5(htmlspecialchars($_POST['password']));
	echo $check;
	//recup qui va me permetre de vérifier plus tard si les donnée existe déjà et éviter la polution de ma table.
	$recup = $dbh->prepare('SELECT * FROM formulaire WHERE email = ?');
	$recup->execute(array($_SESSION['mail']));
	$donne = $recup->fetch();
	//verif
	if($_POST['email'] != $donne['email'] && $_POST['password'] != $donne['password']){
		//envoie des nouvelle donnée dans ma table
		$envoie= $dbh->prepare('INSERT INTO formulaire (email, password, condition_accepte, date_inscription) VALUES (:mail, :pass, :checks, NOW())');
		$envoie->execute(array(
			'mail' => $email,
			'pass' => $password,
			'checks' => $check
			));
		header('location: index.php');
	}else{
		//redirection en cas d'existance des donnée
		header('location: indexbis.php');
	}
	//redirection apres execution de l'envoie de donnée
	

}else{
	//redirection vers l'accueil en cas d'erreur  et destruction de la session crée juste au dessus.
	session_destroy();
	echo 'Une erreur c\'est prodruite.</br><a class="btn btn-default" href="index.php">Retour</a>';
	
}
 ?>
</body>
</html>
