<?php
include_once 'header.php';
 ?>
 <?php
 $recherche = "";
 if(isset($_GET['recherche']))
 {
   $recherche = "WHERE nom LIKE '".$_GET['recherche']."'";
 }
  ?>
  <div class="container">
    <div class="row">
      <h4>Notre annuaire</h4>
      <?php
      if(isset($_SESSION['nom']))
      {
        ?>
        <form class="" action="annuaire.php" method="get">
          <label for="">Recherche rapide</label>
          <input type="text" name="recherche" placeholder="Votre recherche">

          <a href="annuaire.php"><button type="button">Retour</button></a>
          <button type="submit">Recherche</button>
        </form>
        <?php
      }
       ?>
    </div>
    <div class="row">
      <div class="collection">
        <table class="striped">
       <thead>
         <tr>
             <th>Nom</th>
             <th>Mail</th>
             <?php
             if(isset($_SESSION['nom']))
             {
               ?><th>Role</th><?php
             }
              ?>
         </tr>
       </thead>
       <tbody>
      <?php
      // REQUETE PARAMETRES8
      $requete_donnees_annuaire = "SELECT * FROM users ".$recherche;
      $requete_donnees_annuaire = mysql_query($requete_donnees_annuaire) or die('Erreur SQL !<br>'.$requete_donnees_annuaire.'<br>'.mysql_error());
      $nbrecherche = 0;
      while($data = mysql_fetch_assoc($requete_donnees_annuaire))
      {
        $nbrecherche ++;
        ?>
        <tr>
          <td><?php echo $data['nom'] ?></td>
          <td><?php echo $data['mail'] ?></td>
          <?php
          if(isset($_SESSION['nom']))
          {
            ?><td><?php echo $data['type'] ?></td><?php
          }
          ?>
        </tr>
        <?php
      }
      mysql_close();
      if ($nbrecherche == 0) {
        echo "<div id='message' class='mesage z-depth-1 pink white-text'><img src='images/479-full.png' alt='risitas forceur'>Aucun resultat<img src='images/479-full.png' alt='risitas forceur'> </div>";
      }
       ?>
         </tbody>
       </table>
      </div>
    </div>
  </div>
<?php
include_once 'footer.php';
 ?>
