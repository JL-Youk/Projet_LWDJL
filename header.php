<!DOCTYPE html>
<html lang="fr">
<?php
include_once 'config.php';
// clef de Sel ecrit en dure =>
$clef_de_salage = "@David";
// clef de Sel ecrit en dure =>

$connected = "";
if (isset($_POST['nom'])){
  if (isset($_POST['pass'])){

    $mystring = $_POST['nom'].$_POST['pass'];
    $findme = "'";
    $pos = strpos($mystring, $findme);

    if ($pos === false) {
      $nom = htmlspecialchars($_POST['nom'], ENT_QUOTES);
      $pass = htmlspecialchars($_POST['pass'], ENT_QUOTES);

      var_dump($pass);
      $pass = md5($pass.$clef_de_salage);
      var_dump($pass);

      $reponse = $base->prepare("SELECT * FROM users WHERE nom='$nom' AND pass = '$pass'");
      if ($reponse->execute()) {
        $message_info = "<div id='message' class='mesage z-depth-1 red white-text'>Login incorrect</div>";
        while( $donnees = $reponse->fetch()){
          $message_info = "<div id='message' class='mesage z-depth-1 green white-text'>Bienvenue ".$donnees['nom']."</div>";
          $_SESSION['nom'] = $donnees['nom'];
          $_SESSION['id'] = $donnees['id'];
        }
      }
    }
    else {
      $message_info = "<div id='message' class='mesage z-depth-1 pink white-text'><img src='images/563-full.png' alt='risitas forceur'> Bien ton injection ?<img src='images/563-full.png' alt='risitas forceur'> </div>";
    }

  }
}
if (isset($_SESSION['nom'])){
  $connected = "<li class='blue-text'>Connecter en tant ".$_SESSION['nom']."</li>";
}
 ?>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Risitas & Co</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/sweetalert.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav class="grey darken-4" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="index.php" class="brand-logo">LOGO</a>
      <ul class="right hide-on-med-and-down">
        <?php echo $connected; ?>
        <li><a href="annuaire.php">Annuaire</a></li>
        <li><a href="login.php">Login</a></li>
      </ul>
      <ul id="nav-mobile" class="side-nav">
        <?php echo $connected; ?>
        <li><a href="annuaire.php">Annuaire</a></li>
        <li><a href="login.php">Login</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
