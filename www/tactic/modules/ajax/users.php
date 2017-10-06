<?php
if (is_file('../../include/config.php'))
{
    require_once('../../include/config.php');
}
elseif (is_file('../include/config.php')) {
  require_once('../include/config.php');
}
// id pour DataTableable - générer un Id aléatoire en fonction de la date.
$idTabUsers = mt_rand(1,10000);


if (isset($_GET['searchOu']))
{
  if ($_GET['searchOu'] != "") {
    $searchOu= htmlspecialchars($_GET['searchOu'], ENT_QUOTES);
    $searchQuoi = htmlspecialchars($_GET['searchQuoi'], ENT_QUOTES);
    $search = "WHERE ".$searchOu." LIKE '".$searchQuoi."'";
  }
  else {
    $search = "";
  }
}
else {
  $search = "";
}
$requete_donnees_utilisateurs = $base->query("SELECT * FROM users $search");
$requete_donnees_utilisateurs->setFetchMode(PDO::FETCH_OBJ);
?>
<form id="formMultipleActionUsers" class="" action="action/updateMultipleUsers.php" method="post">
<table class="mdl-data-table striped" id="liste_utilisateurs_tab<?php echo $idTabUsers; ?>" cellspacing="0" width="100%">
<thead>
  <tr>
    <th style="cursor:pointer" onclick="appelleAjax('ID')" data-field="id"><i class="material-icons" style="font-size: 15px;">swap_vert</i>Choix</th>
    <th style="cursor:pointer" onclick="appelleAjax('entite')" data-field="Ensemble"><i class="material-icons" style="font-size: 15px;">sort_by_alpha</i>Groupe</th>
    <th style="cursor:pointer" onclick="appelleAjax('nom')" data-field="Nom"><i class="material-icons" style="font-size: 15px;">sort_by_alpha</i>Nom</th>
    <th style="cursor:pointer" onclick="appelleAjax('prenom')" data-field="Prénom"><i class="material-icons" style="font-size: 15px;">sort_by_alpha</i>Prénom</th>
    <th style="cursor:pointer" onclick="appelleAjax('civilite')" data-field="Civilité"><i class="material-icons" style="font-size: 15px;">sort_by_alpha</i>Civilité</th>
    <th style="cursor:pointer" onclick="appelleAjax('matricule')" data-field="Matricule"><i class="material-icons" style="font-size: 15px;">sort_by_alpha</i>Matricule</th>
    <th style="cursor:pointer" onclick="appelleAjax('lastimport')" data-field="Création"><i class="material-icons" style="font-size: 15px;">sort_by_alpha</i>Création</th>
    <th style="cursor:pointer" onclick="appelleAjax('statut')" data-field="Statut"><i class="material-icons" style="font-size: 15px;">sort_by_alpha</i>Statut</th>
    <th data-field="Action">Action</th>
  </tr>
</thead>
<tbody>

  <?php
  $resultat = false;
  while( $donnees_utilisateurs = $requete_donnees_utilisateurs->fetch() )
  {
    $rand = rand(100, 999);
    $resultat = true;
    ?>
    <tr id="ligne_user_<?php echo $donnees_utilisateurs->ID; ?>">
      <td><?php
      echo "<input class='checkBoxUser' name='".$rand."checkBox$".$donnees_utilisateurs->ID."' type='checkbox' id='".$rand."checkBox$".$donnees_utilisateurs->ID."' />";
      echo "<label for='".$rand."checkBox$".$donnees_utilisateurs->ID."'></label>";
       ?></td>
      <td><?php echo $donnees_utilisateurs->groupe_name; ?></td>
      <td><?php echo $donnees_utilisateurs->nom; ?></td>
      <td><?php echo $donnees_utilisateurs->prenom; ?></td>
      <td><?php echo $donnees_utilisateurs->civilite; ?></td>
      <td><?php echo $donnees_utilisateurs->matricule; ?></td>
      <td><?php echo date("d-m-Y", $donnees_utilisateurs->lastimport); ?></td>
      <td><?php echo $donnees_utilisateurs->statut; ?></td>
      <td><a class='dropdown-button btn' href='#' data-activates='dropdownUser<?php echo $donnees_utilisateurs->ID; ?>'><i class="material-icons">settings</i></a></td>
      <!-- Dropdown Trigger -->
     <!-- Dropdown Structure -->
     <ul id="dropdownUser<?php echo $donnees_utilisateurs->ID ?>" class="dropdown-content">
       <li>
         <a target=_blank href="user.php?id=<?php echo $donnees_utilisateurs->ID ?>">Modifier</a>
       </li>
       <?php
       if ($_SESSION['droits'] == "super_admins") {
         ?>
         <li>
           <a onclick="ouverturemodalmdp(<?php echo $donnees_utilisateurs->ID ?>)" href="#modalAddMdp" value="1">Modifier mot de passe</a>
         </li>
         <?php
       }
       else {
         # code...
       }
        ?>
       <?php
       if ($donnees_utilisateurs->statut == "actif") {
         ?>
         <li style="cursor:pointer" onclick="desactiverUser(<?php echo $donnees_utilisateurs->ID ?>)"><a href="#">Désactiver</a></li>
         <?php
       }
       elseif ($donnees_utilisateurs->statut == "inactif") {
         ?>
         <li style="cursor:pointer" onclick="activerUser(<?php echo $donnees_utilisateurs->ID ?>)"><a href="#">Activer</a></li>
         <?php
       }
       else {
         ?>
         <li style="cursor:pointer" onclick="desactiverUser(<?php echo $donnees_utilisateurs->ID ?>)"><a href="#">Désactiver</a></li>
         <?php
       }
        ?>
       <li style="cursor:pointer" onclick="deleteUser(<?php echo $donnees_utilisateurs->ID ?>)"><a href="#">Supprimer</a></li>
     </ul>
   </tr>
    <?php

  }
  if (!$resultat) {
    echo "Aucun résultat...";

  }
  $rand = rand(10, 99);
  ?>
  <div class="actionMultipleUsers" style="display:none">
    <div id="close_info_actionMultipleUsers<?php echo $rand ?>" class="right" style="cursor:pointer">
      <i class="material-icons">clear</i>
    </div>
      Pour effectuer des actions multiples sur les utilisateurs:
    <br>
    <input style="display:none" id="FormActiver<?php echo $rand ?>" class="waves-effect waves-light btn green accent-4" type="submit" name="activer" value="Activer">
    <input style="display:none" id="FormDesactiver<?php echo $rand ?>" class="waves-effect waves-light btn yellow darken-2" type="submit" name="desactiver" value="Désactiver">
    <input style="display:none" id="FormSupprimer<?php echo $rand ?>" class="waves-effect waves-light btn red" type="submit" name="supprimer" value="Supprimer">
    <button title="Activation multiple d'utilisateurs" id="Activer<?php echo $rand ?>" class="waves-effect waves-light btn green accent-4" type="button" name="button">Activer</button>
    <button title="Desactivation multiple d'utilisateurs" id="Desactiver<?php echo $rand ?>" class="waves-effect waves-light btn yellow darken-2" type="button" name="button">Désactiver</button>
    <button title="Suppression multiple d'utilisateurs" id="Supprimer<?php echo $rand ?>" class="waves-effect waves-light btn red" type="button" name="button">Supprimer</button>
  </div>
</tbody>
</table>
</form>
<script type="text/javascript">
$('.dropdown-button').dropdown({
  inDuration: 300,
  outDqquration: 225,
  constrainWidth: false, // Does not change width of dropdown to that of the activator
  hover: false, // Activate on hover
  gutter: 0, // Spacing from edge
  belowOrigin: false, // Displays dropdown below the button
  alignment: 'left', // Displays dropdown with edge aligned to the left of button
  stopPropagation: false // Stops event propagation
  }
);
$(document).ready(function() {
    console.log(<?php echo $idTabUsers; ?>);
    $('#liste_utilisateurs_tab<?php echo $idTabUsers; ?>').DataTable( {
        columnDefs: [
            {
                targets: [ 0, 1, 2 ],
                className: 'mdl-data-table__cell--non-numeric'
            }
        ],
    } );

    $('#liste_utilisateurs_tab_filter label input').attr("placeholder", "Nom, prénom, matricule, groupe...");
    $('#liste_utilisateurs_tab_filter label input').attr("style", "font-style: italic;");

    $('.checkBoxUser').click(function(event) {
      $('.actionMultipleUsers').slideDown();
    });


} );
$('#close_info_actionMultipleUsers<?php echo $rand ?>').click(function(event) {
  $('.actionMultipleUsers').slideUp();
});

$('#Activer<?php echo $rand ?>').click(function(event) {
  swal({
    title: "Êtes-vous sûr ?",
    text: "Les utilisateurs selectionnés seront activés",
    type: "success",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Oui",
    cancelButtonText: "Annuler",
    closeOnConfirm: false
  },
  function(){
    $('#FormActiver<?php echo $rand ?>').click();
});
});
$('#Desactiver<?php echo $rand ?>').click(function(event) {
  swal({
    title: "Êtes-vous sûr ?",
    text: "Les utilisateurs selectionnés seront desactivés",
    type: "success",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Oui",
    cancelButtonText: "Annuler",
    closeOnConfirm: false
  },
  function(){
    $('#FormDesactiver<?php echo $rand ?>').click();
});
});
$('#Supprimer<?php echo $rand ?>').click(function(event) {
  swal({
    title: "Êtes-vous sûr ?",
    text: "Les utilisateurs selectionnés seront supprimés",
    type: "success",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Oui",
    cancelButtonText: "Annuler",
    closeOnConfirm: false
  },
  function(){
    $('#FormSupprimer<?php echo $rand ?>').click();
});
});

</script>
