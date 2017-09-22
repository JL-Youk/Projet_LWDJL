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
    $nom = $_POST['nom'];
    $pass = $_POST['pass'];

    $pass = md5($pass.$clef_de_salage);

    $sql = "SELECT * FROM users WHERE nom='$nom' AND pass='$pass'";

    $req = mysql_query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
    $message_info = "<div id='message' class='mesage z-depth-1 red white-text'>Login incorrect</div>";
    while($data = mysql_fetch_assoc($req))
    {
      $message_info = "<div id='message' class='mesage z-depth-1 green white-text'>Bienvenue ".$data['nom']."</div>";
      $_SESSION['nom'] = $data['nom'];
      $_SESSION['id'] = $data['id'];
    }
    mysql_close();
  }
}
if (isset($_SESSION['nom'])){
  $connected = "<li style='text-decoration-line: underline;' class='white-text'>Connecter en tant ".$_SESSION['nom']."</li><li><a href='deco.php'>Deconnexion</a></li>";
}
 ?>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>[DEV] SIX.DAVE</title>

  <!-- CSS  -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/sweetalert.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body class="grey lighten-2">
  <nav class="deep-orange accent-4" role="navigation">
    <div class="nav-wrapper container"><a style='font-size: 4rem;' id="logo-container" href="index.php" class="brand-logo white-text">[DEV] SIX.DAVE V.2</a>
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
