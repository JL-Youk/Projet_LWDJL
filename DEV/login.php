<?php
// clef de Sel ecrit en dure =>
$clef_de_salage = "@David";
// clef de Sel ecrit en dure =>
include_once 'header.php';
 ?>
 <?php
 if (isset($message_info)){
   echo $message_info;
 }
 ?>
  <div class="container">
    <div class="section">
      <div class="row">
        <h4>Connexion</h4>
      </div>
      <div class="row">
        <form class="" action="login.php" method="post">
          <input type="text" name="nom" value="" placeholder="Ton login">
          <input type="password" name="pass" value="" placeholder="Ton mot de passe">
          <button class="waves-effect waves-light btn-large right" type="submit">Connexion</button>
        </form>
      </div>
    </div>
  </div>
<?php
include_once 'footer.php';
 ?>
