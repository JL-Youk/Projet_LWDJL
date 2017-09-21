<?php
include_once 'header.php';
 ?>
 <?php
 $recherche = "";
 if(isset($_GET['recherche']))
 {
   $recherche = htmlspecialchars($_GET['recherche'], ENT_QUOTES);
   $recherche = "WHERE nom LIKE '".$recherche."'";
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
      $requete_donnees_annuaire = $base->query("SELECT * FROM users ".$recherche);
      $requete_donnees_annuaire->setFetchMode(PDO::FETCH_OBJ);
      $nbrecherche = 0;
      while( $donnees_annuaire = $requete_donnees_annuaire->fetch() )
      {
        $nbrecherche ++;
        ?>
        <tr>
          <td><?php echo $donnees_annuaire->nom ?></td>
          <td><?php echo $donnees_annuaire->mail ?></td>
          <?php
          if(isset($_SESSION['nom']))
          {
            ?><td><?php echo $donnees_annuaire->type ?></td><?php
          }
          ?>
        </tr>
        <?php
      }
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
