<!DOCTYPE html>
<html lang="fr">
<?php
include_once 'config.php';

if (isset($_POST['nom'])){
  if (isset($_POST['pass'])){
    $nom = htmlspecialchars($_POST['nom'], ENT_QUOTES);
    $pass = htmlspecialchars($_POST['pass'], ENT_QUOTES);
    $reponse = $base->prepare("SELECT nom, pass FROM users WHERE nom='$nom' AND pass = '$pass'");
    if ($reponse->execute()) {
      $message_info = "login incorrect, ou compte inactif";
			while( $donnees = $reponse->fetch()){
        $message_info = "Bonjour ".$nom;
      }
    }
  }
}
 ?>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>Starter Template - Materialize</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav class="light-blue lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="index.php" class="brand-logo">Logo</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="login.php">
          <?php
           if (isset($nom)){
             echo $nom;
           }
           else {
             echo "login";
           }
           ?>
           </a></li>
        <li><a href="annuaire.php">Annuaire</a></li>
      </ul>

      <ul id="nav-mobile" class="side-nav">
        <li><a href="login.php">
          <?php
           if (isset($nom)){
             echo $nom;
           }
           else {
             echo "login";
           }
           ?>
           </a></li>
        <li><a href="annuaire.php">Annuaire</a></li>
      </ul>
      <a href="#" data-activates="nav-mobile" class="button-collapse"><i class="material-icons">menu</i></a>
    </div>
  </nav>
