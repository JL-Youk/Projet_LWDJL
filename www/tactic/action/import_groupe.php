<div class="container">
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
              $id_genere = 0;
              while($tab=fgetcsv($fic,1024,';'))
              {
                var_dump($id_genere);
                $id_genere ++;
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
                      $Coordonnee = htmlspecialchars($tab[$i], ENT_QUOTES);
                      break;
                      case '1':
                      $Nom= htmlspecialchars($tab[$i], ENT_QUOTES);
                      break;
                      case '2':
                      $NomContact= htmlspecialchars($tab[$i], ENT_QUOTES);
                      break;
                      case '3':
                      $PrenomContact= htmlspecialchars($tab[$i], ENT_QUOTES);
                      break;
                      case '4':
                      $Tel1= htmlspecialchars($tab[$i], ENT_QUOTES);
                      break;
                      case '5':
                      $Tel2= htmlspecialchars($tab[$i], ENT_QUOTES);
                      break;
                      case '6':
                      $Fax= htmlspecialchars($tab[$i], ENT_QUOTES);
                      break;
                      case '7':
                      $Ville= htmlspecialchars($tab[$i], ENT_QUOTES);
                      break;
                      case '8':
                      $Cp= htmlspecialchars($tab[$i], ENT_QUOTES);
                      break;
                      case '9':
                      $Numero= htmlspecialchars($tab[$i], ENT_QUOTES);
                      break;
                      case '10':
                      $Voie= htmlspecialchars($tab[$i], ENT_QUOTES);
                      break;
                    }
                  }
                  echo $Coordonnee;
                  echo "<br>";
                  echo $Nom;
                  echo "<br>";
                  // determiner les coordonnées
                  echo "<br>";
                  $niveau = substr_count($Coordonnee, '@', 0);
                  switch ($niveau) {
                    case 1:
                      $id_groupe_1 = $id_genere;
                      $id_groupe = $id_genere;
                      $id_parent = 0;
                      $nom_groupe_niveau_1 = $Nom;
                      break;
                    case 2:
                      $id_groupe_2 = $id_genere;
                      $id_groupe = $id_genere;
                      $id_parent = $id_groupe_1;
                      $nom_groupe_niveau_2 = $Nom;
                      break;
                    case 3:
                      $id_groupe_3 = $id_genere;
                      $id_groupe = $id_genere;
                      $id_parent = $id_groupe_2;
                      $nom_groupe_niveau_3 = $Nom;
                      break;
                    case 4:
                      $id_groupe_4 = $id_genere;
                      $id_groupe = $id_genere;
                      $id_parent = $id_groupe_3;
                      $nom_groupe_niveau_4 = $Nom;
                      break;
                    case 5:
                      $id_groupe_5 = $id_genere;
                      $id_groupe = $id_genere;
                      $id_parent = $id_groupe_4;
                      $nom_groupe_niveau_5 = $Nom;
                      break;
                    default:
                      $id_groupe_1 = $id_genere;
                      $id_groupe = $id_genere;
                      $id_parent = 0;
                      $nom_groupe_niveau_1 = $Nom;
                      break;
                  }
                  $dateentrée = strtotime(date("d-m-Y H:i:s"));

                  $sql = "INSERT INTO tactic_groupes (id, id_parent, niveau, nom, contact_nom, contact_prenom, contact_telephone1, contact_telephone2, contact_fax, adresse_numero, adresse_nomvoie, adresse_codepostal, adresse_ville, date_creation) VALUES ('$id_groupe', '$id_parent', '$niveau', '$Nom','$NomContact','$PrenomContact','$Tel1','$Tel2','$Fax','$Numero','$Voie','$Cp','$Ville','$dateentrée')";
                  var_dump($sql);
                  $tabQuery[$k] = $sql;
                  $k ++;
                }
              }
              ?>
            </div>
            <?php
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
          url: 'action/importAjax_groupe.php',
          data: { "tab": test },
          cache: false,
          success: function(result) {
            window.location.replace("backOffice.php");

          },
      });
  });

</script>
