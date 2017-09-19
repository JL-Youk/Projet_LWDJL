<?php
include_once 'header.php';
 ?>
  <div class="container">
    <div class="row">
      <h4>Notre annuaiare</h4>
    </div>
    <div class="row">
      <div class="collection">
      <?php
      // REQUETE PARAMETRES
      $requete_donnees_annuaire = $base->query("SELECT * FROM users");
      $requete_donnees_annuaire->setFetchMode(PDO::FETCH_OBJ);

      while( $donnees_annuaire = $requete_donnees_annuaire->fetch() )
      {
        echo "<a href='#!' class='collection-item'><span class='badge'>".$donnees_annuaire->mail."</span>".$donnees_annuaire->nom."</a>";
      }
       ?>
      </div>
    </div>
  </div>
<?php
include_once 'footer.php';
 ?>
