<?php  session_start();  ?>
<!DOCTYPE html>
<html>
<head>
<?php 
  //verif
  if(isset($_SESSION['mail']) && isset($_SESSION['pass'])){
   //connection a ma base de donnée
   try{
      $dbb = new PDO('mysql:host=localhost;dbname=Simplon;charset=utf8', 'root' , 'M+D=cdna4');
    }catch(Exception $e){
      die('erreur: ' . $e->getMessage());
    }
    //selection ciblé, de donnée dans ma table formulaire
      $recup = $dbb->prepare('SELECT * FROM formulaire WHERE email = ?');
      $recup->execute(array($_SESSION['mail']));
      $donnees = $recup->fetch();
  }
 ?>
	<title>Formulaire d'inscription</title>
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" type="text/css" href="style.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

<!-- Latest compiled and minified JavaScript -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>  
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

</head>
<body >


<?php
  //utilisitation d'include
  include('header.php');
      //verif
    if(isset($_SESSION['mail']) && isset($_SESSION['pass'])){
    if($_SESSION['mail'] == $donnees['email'] && $_SESSION['pass'] == $donnees['password']){
      
      //message
       echo "Compte créé ! Mail envoyé à " . $_SESSION['mail'];
      echo '</br><a href="destroy.php">deco peut être?</a>';
    }else{
      echo 'fail co'; 
      echo '</br><a href="destroy.php">deco peut être?</a>';
    }
  }else{?>
<form action="sql.php" method="POST" id="formula">
<fieldset><legend>Formulaire d'inscription !</legend>
  <div class="form-group">
    <label for="exampleInputEmail1">Email</label>
    <input type="email" class="form-control input" name="email" placeholder="Email" required>
  </div>
  <div class="form-group">
    <label for="exampleInputPassword1">Password</label>
    <input type="password" class="pass form-control input " name="password"  placeholder="Password" required="required" >
  </div>
  <div class="form-group">
    <label for="InputPassword2">Password</label>
    <input type="password" class="pass form-control input" name="password" placeholder="Password" required value="">
    <div id="alertpass"></div>
   
  </div>
  <div class="checkbox">
    <label>
      <input type="checkbox" name="checkbox" class="input" required> cocher pour accépter les condition <a href="fake.php">d'utilisation</a>.
    </label>
  </div>
  <div class="row">
  <div class="col-sm-offset-9">
  <button type="submit" class="input btn btn-default" id="button" disabled>Submit</button>
  </div>
  </div>
</form>
</fieldset>
<script type="text/javascript" src="script.js"></script>

<?php } ?>
</body>
</html>