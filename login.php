<?php
include_once 'header.php';
if (isset($_SESSION['nom'])){
  session_destroy();
}
// Finalement, on détruit la session.
 ?>
  <div class="container">
    <div class="section">
      <div class="row">
        <h4>Connexion</h4>
      </div>
      <div class="row">
        <form class="" action="index.php" method="post">
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
