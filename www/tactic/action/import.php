<div class="container">
 <h4 id="progressbarText" >Importation en cours : <span id="nbusersimport"></span> utilisateurs</h4>
  <div id="progressbar" class="progress">
     <div class="indeterminate"></div>
 </div>
 <h3>Prévisualisation de l'importation:</h3>
<?php
// debut du chrono
$timestamp_debut = microtime(true);
$tabQuery = array();
$k = 0;
// tempt max de la page
//  3000000 = 5000 min
ini_set('max_execution_time', 3000000);

if (isset($_SESSION['droits']))
{
  if(($_SESSION['droits'] == "super_admins") || ($_SESSION['droits'] == "admin"))
  {
    // debut image
    $chemin = "uploads/csv/";
    $nameCsv = "fichierCsv";
    $dateimport = strtotime(date("d-m-Y H:i:s"));

    // Upload banniere
    $content_dir = $chemin; // dossier où sera déplacé le fichier
    if (isset($_FILES[$nameCsv]))
    {
      $tmp_file = $_FILES[$nameCsv]['tmp_name'];
      if( !is_uploaded_file($tmp_file) )
      {
        echo "<h4 class='red-text text-darken-1'>Le fichier est introuvable</h4>";
      }
      else
      {
        // on vérifie maintenant l'extension
        $path = $_FILES[$nameCsv]['name'];
        $ext = pathinfo($path, PATHINFO_EXTENSION);
        if($ext == "csv" || $ext == "CSV")
        {
          // on copie le fichier dans le dossier de destination
          $name_file = $dateimport.".".$ext;
          if( !move_uploaded_file($tmp_file, $content_dir . $name_file) )
          {
            echo "<h4 class='red-text text-darken-1'>Impossible de copier le fichier dans ".$content_dir."</h4>";
          }
          else {
            // le fichier a bien etait uploadé
            $ligne = 0; // compteur de ligne
            $fic = fopen($chemin.$name_file, "a+");
            $enregistrementCreer = 0;
            $enregistrementADesact = 0;
            $enregistrementErreur = 0;
            $enregistrementTotal = 0;
            ?>
            <div class="row">
              <h5 class="blue-text text-darken-1 s12">Résultat de l'importation :</h5>
              <span id="user_crees" class="blue-text text-darken-1 col l2 m6 s12"></span>
              <span id="user_desact" class="blue-text text-darken-1 col l2 m6 s12"></span>
              <span id="user_erreur" class="blue-text text-darken-1 col l2 m6 s12"></span>
              <span id="user_total" class="blue-text text-darken-1 col l2 m6 s12"></span>
              <span id="temps_total" class="blue-text text-darken-1 col l4 m12 s12"></span>
            </div>
            <h5 class="blue-text text-darken-1 s12"><i class="material-icons">info_outline</i>Détail de l'importation :</h5>
            <div class="collection">
              <?php
              $palier = 0;
              while($tab=fgetcsv($fic,1024,';'))
              {
                $tab = array_map("utf8_encode", $tab);
                $champs = count($tab);//nombre de champ dans la ligne en question
                $ligne ++;
                $palier ++;
                //affichage de chaque champ de la ligne en question
                if ($ligne != "1") {
                  for($i=0; $i<$champs; $i ++)
                  {
                    switch ($i) {
                      case '0':
                      $Groupe = htmlspecialchars($tab[$i], ENT_QUOTES);
                      break;
                      case '1':
                      $Identifiant = htmlspecialchars($tab[$i], ENT_QUOTES);
                      break;
                      case '2':
                      $Matricule = htmlspecialchars($tab[$i], ENT_QUOTES);
                      break;
                      case '3':
                      $Civilite = htmlspecialchars($tab[$i], ENT_QUOTES);
                      break;
                      case '4':
                      $Nom = htmlspecialchars($tab[$i], ENT_QUOTES);
                      break;
                      case '5':
                      $Prenom = htmlspecialchars($tab[$i], ENT_QUOTES);
                      break;
                      case '6':
                      $Type_Contrat = htmlspecialchars($tab[$i], ENT_QUOTES);
                      break;
                      case '7':
                      if (isset($tab[$i]))
                      {
                        if (($tab[$i] != null) or ($tab[$i] != "")) {
                          $mot_de_passe = htmlspecialchars($tab[$i], ENT_QUOTES);
                          $mot_de_passe = password_hash($mot_de_passe, PASSWORD_DEFAULT);
                        }
                      }
                      break;
                      case '8':
                      $date_entree = htmlspecialchars($tab[$i], ENT_QUOTES);
                      break;
                      case '9';
                      $anciennete = htmlspecialchars($tab[$i], ENT_QUOTES);
                      break;
                      case '10';
                      $telephone = htmlspecialchars($tab[$i], ENT_QUOTES);
                      break;
                      case '11';
                      $telephone_portable = htmlspecialchars($tab[$i], ENT_QUOTES);
                      break;
                      case '12';
                      $mail = htmlspecialchars($tab[$i], ENT_QUOTES);
                      break;
                      case '13';
                      $ville = htmlspecialchars($tab[$i], ENT_QUOTES);
                      break;
                      case '14';
                      $ville_livraison = htmlspecialchars($tab[$i], ENT_QUOTES);
                      break;
                      case '15';
                      $pays = htmlspecialchars($tab[$i], ENT_QUOTES);
                      break;
                      case '16';
                      $pays_livraison = htmlspecialchars($tab[$i], ENT_QUOTES);
                      break;
                      case '17';
                      $adresse = htmlspecialchars($tab[$i], ENT_QUOTES);
                      break;
                      case '18';
                      $adresse_livraison = htmlspecialchars($tab[$i], ENT_QUOTES);
                      break;
                      case '19';
                      $complement_adresse = htmlspecialchars($tab[$i], ENT_QUOTES);
                      break;
                      case '20';
                      $complement_adresse_livraison = htmlspecialchars($tab[$i], ENT_QUOTES);
                      break;
                      case '21';
                      $numero_rue = htmlspecialchars($tab[$i], ENT_QUOTES);
                      break;
                      case '22';
                      $numero_rue_livraison = htmlspecialchars($tab[$i], ENT_QUOTES);
                      break;
                      case '23';
                      $type_voie = htmlspecialchars($tab[$i], ENT_QUOTES);
                      break;
                      case '24';
                      $type_voie_livraison = htmlspecialchars($tab[$i], ENT_QUOTES);
                      break;
                      case '25';
                      $code_postal = htmlspecialchars($tab[$i], ENT_QUOTES);
                      break;
                      case '26';
                      $code_postal_livraison = htmlspecialchars($tab[$i], ENT_QUOTES);
                      break;
                      case '27';
                      $droits = htmlspecialchars($tab[$i], ENT_QUOTES);
                      break;
                    }
                  }

                  $dateentrée = strtotime(date("d-m-Y H:i:s"));
                  $droit = "user";

                  // on regarde si l'utilisateur est deja present dans la BDD
                  $stmt = $base->prepare("SELECT ID, nom, prenom FROM users WHERE nom = ? AND prenom = ? AND matricule = ?");
                  if ($stmt->execute(array($Nom, $Prenom, $Matricule))) {
                    $unique = true;
                    // si un utilisateur existe deja, on met a jour sa collonne lastupdate
                    while ($donnees_categorie_type = $stmt->fetch()) {
                      $unique = false;
                      $updatelastupdate = "UPDATE users SET
                      lastimport = $dateimport

                      WHERE nom = '$Nom' AND matricule = '$Matricule'";
                      $base->exec($updatelastupdate);
                      $enregistrementTotal ++;
                      echo "<a target='_blank' href='user.php?id=".$donnees_categorie_type['ID']."' class='collection-item blue-text'>L'utilisateur ".$donnees_categorie_type['nom']." ".$donnees_categorie_type['prenom']." est deja enregistré</a>";
                    }
                  }
                  if ($palier == 25) {
                    $timestamp_fin = microtime(true);
                    $difference_ms = $timestamp_fin - $timestamp_debut;
                    $palier = 0;
                    ?>
                    <script type="text/javascript">
                      $("#nbusersimport").text("<?php echo $ligne ?>");
                    </script>
                    <?php
                  }

// on le créer si n'existe pas
                  if ($unique) {
                    echo "<a class='collection-item green-text'>Nouvelle utilisateur : ".$Nom." ".$Prenom."</a>";
                    $enregistrementCreer ++;
                    $enregistrementTotal ++;
                    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                    $sql = "INSERT INTO users (civilite,matricule,identifiant,groupe_name,nom,prenom,type_contrat,date_entree,anciennete,telephone,telephone_portable,mail,ville,ville_livraison,pays,pays_livraison,adresse,adresse_livraison,complement_adresse,complement_adresse_livraison,numero_rue,numero_rue_livraison,type_voie,type_voie_livraison,code_postal,code_postal_livraison,droits, lastimport, pass)
                    VALUES ('$Civilite','$Matricule','$Identifiant','$Groupe',
                      '$Nom','$Prenom','$Type_Contrat','$date_entree','$anciennete',
                      '$telephone','$telephone_portable','$mail','$ville','$ville_livraison',
                      '$pays','$pays_livraison','$adresse','$adresse_livraison',
                      '$complement_adresse','$complement_adresse_livraison','$numero_rue',
                      '$numero_rue_livraison','$type_voie','$type_voie_livraison',
                      '$code_postal','$code_postal_livraison','$droits','$dateimport','$mot_de_passe')";
                    $tabQuery[$k] = $sql;
                    $k ++;
                    // $base->exec($sql);
                  }
                }
              }
              var_dump($tabQuery);
              ?>
            </div>
            <?php
              // On cherche les utilisateurs qui n'ont pas etait importer
              $stmt = $base->prepare("SELECT ID, nom, prenom, matricule, identifiant, civilite FROM users WHERE lastimport != ?");
              if ($stmt->execute(array($dateimport))) {
                ?>
              </br>
              <div class="row white int_container z-depth-1">
                <div id="data_wait_validation" class="col s12">
                  <h5 class="red-text text-darken-1"><i class="material-icons">info_outline</i>Liste des utilisateurs non présents dans l'import</h5>
                  <table class="display dataTable" cellspacing="0" width="100%" role="grid" aria-describedby="data-table-row-grouping_info" style="width: 100%;">
                    <thead>
                      <tr role="row"><th class="sorting" tabindex="0" aria-controls="data-table-row-grouping" rowspan="1" colspan="1" style="width: 143px;">Civilité</th><th class="sorting" tabindex="0" aria-controls="data-table-row-grouping" rowspan="1" colspan="1" style="width: 220px;">Nom</th><th class="sorting" tabindex="0" aria-controls="data-table-row-grouping" rowspan="1" colspan="1" style="width: 41px;">Prenom</th><th class="sorting" tabindex="0" aria-controls="data-table-row-grouping" rowspan="1" colspan="1" style="width: 90px;">Matricule</th><th class="sorting" tabindex="0" aria-controls="data-table-row-grouping" rowspan="1" colspan="1"style="width: 80px;">Details</th></tr>
                    </thead>
                    <tfoot>
                      <tr>
                        <th rowspan="1" colspan="1">Civilité</th>
                        <th rowspan="1" colspan="1">Nom</th>
                        <th rowspan="1" colspan="1">Prenom</th>
                        <th rowspan="1" colspan="1">Matricule</th>
                        <th rowspan="1" colspan="1">Détails</th>
                      </tr>
                    </tfoot>
                    <tbody>
                      <?php
                      while ($donnees_users_averif = $stmt->fetch()) {
                        $enregistrementADesact ++;
                        $enregistrementTotal ++;
                        ?>
                        <tr role="row" class="odd">
                          <td><?php echo $donnees_users_averif['civilite']; ?></td>
                          <td><?php echo $donnees_users_averif['nom']; ?></td>
                          <td><?php echo $donnees_users_averif['prenom']; ?></td>
                          <td><?php echo $donnees_users_averif['matricule']; ?></td>
                          <td><a target='_blank' href='user.php?id=<?php echo $donnees_users_averif['ID']; ?>'>informations</a></td>
                        </tr>
                        <?php
                      }
                      ?>
                    </tbody>
                  </table>
                </div>
              </div>
              <?php
            }
          }
        }
        else {
          echo "<h4 class='red-text text-darken-1'>Le fichier n'est pas un csv</h4>";
        }
      }
    }
  }
}
?>
<div class="fixed-action-btn" id="btnConfirmImport">
  <button class="btn waves-effect waves-light" >Confirmer l'import
    <i class="material-icons right">done</i>
  </button>
</div>




<?php
// fin du chrono
$timestamp_fin = microtime(true);
$difference_ms = $timestamp_fin - $timestamp_debut;
$difference_ms = number_format($difference_ms, 3, ',', ' ');
?>
</div>
<script type="text/javascript">
  $("#user_crees").text("<?php echo $enregistrementCreer." utilisateurs crées" ?>");
  $("#user_desact").text("<?php echo $enregistrementADesact." utilisateurs à désactiver" ?>");
  $("#user_erreur").text("<?php echo $enregistrementErreur." utilisateurs en erreur" ?>");
  $("#user_total").text("<?php echo $enregistrementTotal." utilisateurs au total" ?>");
  $("#temps_total").text("<?php echo $difference_ms." Seconde pour importer les données" ?>");
  $("#progressbar").slideUp(0);
  $("#progressbarText").slideUp(0);


  $('#btnConfirmImport').click(function() {
    var test = <?php echo json_encode($tabQuery) ?>;
    $.ajax({
          type: 'POST',
          url: 'action/importAjax.php',
          data: { "tab": test },
          cache: false,
          success: function(result) {
            window.location.replace("backOffice.php");

          },
      });
  });

</script>
