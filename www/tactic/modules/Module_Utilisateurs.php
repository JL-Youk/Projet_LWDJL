<div id="Module_Utilisateur" style="display:none">
  <div class="nav-content sous_menu_admin">
    <ul class="tabs">
      <li class="tab"><a class="active" href="#utilisateurs_comptes">Compte</a></li>
      <li class="tab"><a href="#utilisateurs_desactivation">désactivation<span class="info_nb_bo" id="info_desactivation_nb"></span></a></li>
      <li class="tab"><a href="#utilisateurs_profil">Profil</a></li>
      <li class="tab"><a href="#utilisateurs_groupe">Groupe</a></li>
      <li class="tab"><a href="#utilisateurs_validation">validation<span class="info_nb_bo" id="info_ayantdroit_nb"></span></a></li>
    </ul>
  </div>
  <!-- Module utilisateur_comptes -->
  <div class="row" id="utilisateurs_comptes">

<div class="row right-align">
  <a href="#"><button id="btn_add_user" class="btn-floating btn-large waves-effect waves-light blue btn_utilisateur_admin" type="button" name="button"><i id="btnadduser" class="material-icons">person_add</i></button>Créer un compte</a>
  <a href="#modalImport"><button id="btn_importmass" class="btn-floating btn-large waves-effect waves-light blue btn_utilisateur_admin" type="button" name="button"><i class="material-icons">file_upload</i></button>Importer</a>
  <a  ><button id="btn_exportmass" class="btn-floating btn-large waves-effect waves-light blue btn_utilisateur_admin" type="button" name="button"><i class="material-icons">get_app</i></button>Exporter</a>
</div>
<div class="col l12 m12 s12" id="creerprofil" style="display:none">
  <div class="Param_Module sous_module z-depth-1">
    <?php
    include_once 'ajax/newusers.php';
     ?>
  </div>
</div>
<div id="alertExportCsv">

</div>
<div class="col l12 m12 s12">
  <div class="Param_Module sous_module z-depth-1">
    <div class="param_info">Gestion utilisateurs</div>
    <div id="divListeUtilisateurs">
      <?php
      // Liste des utilisateurs / comptes
      include_once 'modules/ajax/users.php';
      ?>
    </div>
  </div>
</div>
</div>
<!-- Modules utilisateurs_profil -->
<div class="row" id="utilisateurs_profil">
  <div class="col l12 m12 s12">
    <h5>Profils</h5>
    <div class="col l12 m12 s12">
      <ul class="collapsible" data-collapsible="accordion">
    <li>
      <div id="accordion_profil_users_btn" class="collapsible-header"><i class="material-icons">person</i>Utilisateurs</div>
      <div class="collapsible-body">
        <span id="accordion_profil_users">

      </span>
    </div>
    </li>
    <li>
      <div id="accordion_profil_admin_btn" class="collapsible-header"><i class="material-icons">person</i>Admins</div>
      <div class="collapsible-body">
        <span id="accordion_profil_admin">

        </span>
      </div>
    </li>
    <li>
      <div id="accordion_profil_superadmin_btn" class="collapsible-header"><i class="material-icons">person</i>Super admins</div>
      <div class="collapsible-body">
        <span id="accordion_profil_superadmin">

        </span>
      </div>
    </li>
    </ul>
  </div>
</div>
</div>
<script type="text/javascript">

  $('#accordion_profil_users_btn').click(function(event) {
    $('#accordion_profil_users').load('modules/ajax/users.php?searchOu=droits&searchQuoi=user').fadeIn("slow");
  });
  $('#accordion_profil_admin_btn').click(function(event) {
    $('#accordion_profil_admin').load('modules/ajax/users.php?searchOu=droits&searchQuoi=admin').fadeIn("slow");
  });
  $('#accordion_profil_superadmin_btn').click(function(event) {
    $('#accordion_profil_superadmin').load('modules/ajax/users.php?searchOu=droits&searchQuoi=super_admins').fadeIn("slow");
  });
</script>
<!-- Module utilisateur_ensemble -->
<div class="row"  id="utilisateurs_groupe">
  <div class="row right-align">
    <a href="#modalImport_groupe"><button id="btn_importmass_groupe" class="btn-floating btn-large waves-effect waves-light blue btn_utilisateur_admin" type="button" name="button"><i class="material-icons">file_upload</i></button>Importer</a>
    <a  ><button id="btn_exportmass_groupe" class="btn-floating btn-large waves-effect waves-light blue btn_utilisateur_admin" type="button" name="button"><i class="material-icons">get_app</i></button>Exporter</a>
  </div>
  <div class="row" >
    <a onclick="genererGroupe(0, 0, 0)" href="#" style="display: block;">
      <button id="btn_add_ensemble" class="btn-floating btn-large waves-effect waves-light blue btn_utilisateur_admin" type="button" name="button"><i class="material-icons">create_new_folder</i></button>Ajouter un nouveau groupe
    </a>
  </div>
  <div class="col m12 s12" >
    <?php
    include 'modules/ajax/formulairegroupe.php';
    ?>
    <div id="formulaire_groupe">
      <?php
      include 'modules/ajax/actuFormulaireGroupe.php';
      ?>
    </div>
  </div>
  <div class="col m12 s12" id="liste_groupe">
    <?php
    include 'modules/ajax/groupe.php';
    ?>
  </div>


</div>



<script type="text/javascript">



   function creationGroupe(
     NiveauParentGroupe,
     IDGroupe,
     NiveauGroupe,
     Nom,
     groupeDate_activation,
     groupeDate_desactivation,
     groupeDescription,
     contact_civilite,
     contact_nom,
     contact_prenom,
     contact_telephone1,
     contact_telephone2,
     contact_mail,
     adresse_numero_rue,
     adresse_type_voie,
     adresse_nomvoie,
     adresse_complement_adresse,
     adresse_code_postal,
     adresse_ville,
     adresse_pays,
     statutGroupe
    ) {

       $.post("action/createGroupe.php", {
               NiveauParentGroupe: NiveauParentGroupe,
               IDGroupe: IDGroupe,
               NiveauGroupe: NiveauGroupe,
               Nom: Nom,
               groupeDate_activation: groupeDate_activation,
               groupeDate_desactivation: groupeDate_desactivation,
               groupeDescription: groupeDescription,
               contact_civilite: contact_civilite,
               contact_nom: contact_nom,
               contact_prenom: contact_prenom,
               contact_telephone1: contact_telephone1,
               contact_telephone2: contact_telephone2,
               contact_mail: contact_mail,
               adresse_numero_rue: adresse_numero_rue,
               adresse_type_voie: adresse_type_voie,
               adresse_nomvoie: adresse_nomvoie,
               adresse_complement_adresse: adresse_complement_adresse,
               adresse_code_postal: adresse_code_postal,
               adresse_ville: adresse_ville,
               adresse_pays: adresse_pays,
               statutGroupe: statutGroupe
           },
           function(data) {
               Materialize.toast(data, 4000);
               actualiserGroupe();
           }
       );
   }
   function editGroupeAjax(
     NiveauParentGroupe,
     IDGroupe,
     NiveauGroupe,
     groupeIDParentGroupe,
     groupeNouveauIDParentGroupe,
     Nom,
     groupeDate_activation,
     groupeDate_desactivation,
     groupeDescription,
     contact_civilite,
     contact_nom,
     contact_prenom,
     contact_telephone1,
     contact_telephone2,
     contact_mail,
     adresse_numero_rue,
     adresse_type_voie,
     adresse_nomvoie,
     adresse_complement_adresse,
     adresse_code_postal,
     adresse_ville,
     adresse_pays,
     statutGroupe
    ) {

       $.post("action/editGroupe.php", {
              NiveauParentGroupe: NiveauParentGroupe,
               IDGroupe: IDGroupe,
               NiveauGroupe: NiveauGroupe,
               groupeIDParentGroupe : groupeIDParentGroupe,
               groupeNouveauIDParentGroupe : groupeNouveauIDParentGroupe,
               Nom: Nom,
               groupeDate_activation: groupeDate_activation,
               groupeDate_desactivation: groupeDate_desactivation,
               groupeDescription: groupeDescription,
               contact_civilite: contact_civilite,
               contact_nom: contact_nom,
               contact_prenom: contact_prenom,
               contact_telephone1: contact_telephone1,
               contact_telephone2: contact_telephone2,
               contact_mail: contact_mail,
               adresse_numero_rue: adresse_numero_rue,
               adresse_type_voie: adresse_type_voie,
               adresse_nomvoie: adresse_nomvoie,
               adresse_complement_adresse: adresse_complement_adresse,
               adresse_code_postal: adresse_code_postal,
               adresse_ville: adresse_ville,
               adresse_pays: adresse_pays,
               statutGroupe: statutGroupe
           },
           function(data) {
               Materialize.toast(data, 4000);
               actualiserGroupe();
           }
       );
   }
   // fonction pour générer un groupe avec toute les infos
   function effacer() {
  $(':input','#modalGroupe')
   .not(':button, :submit, :reset, :hidden')
   .val('')
   .removeAttr('checked')
   .removeAttr('selected');
}
   function genererGroupe(NiveauParentGroupe, IDGroupe, NiveauGroupe) {
     effacer();
     $('#formulaire_groupe').hide();
     $("#groupeNiveauParentGroupe").val(NiveauParentGroupe);
     $("#groupeIDGroupe").val(IDGroupe);
     $("#groupeNiveauGroupe").val(NiveauGroupe);
     $( "#modalGroupe" ).fadeOut( "fast", function() {});
     $( "#validerFormGroupeEdit" ).fadeOut( "slow", function() {});
     $( "#validerFormGroupeCreate" ).fadeIn( "slow", function() {});
      $( "#modalGroupe" ).fadeIn( "slow", function() {});
      premierEnvoi = true;
      // variable 'premierEnvoi' == pour eviter un multiple envoi (a cause des ouvertures et fermeture du modal)
      $( "#validerFormGroupeCreate" ).click(function() {
         Nom = $("#groupe_nom").val();
         //  coordonné du groupe debut
         NiveauParentGroupe = $("#groupeNiveauParentGroupe").val();
         IDGroupe = $("#groupeIDGroupe").val();
         NiveauGroupe = $("#groupeNiveauGroupe").val();
        //  coordonné du groupe fin
         groupeDate_activation = $("#groupeDate_activation").val();
         groupeDate_desactivation = $("#groupeDate_desactivation").val();
         groupeDescription = $("#groupeDescription").val();
         contact_civilite = $("#groupeContact_civilite").val();
         contact_nom = $("#groupeContact_nom").val();
         contact_prenom = $("#groupeContact_prenom").val();
         contact_telephone1 = $("#groupeContact_telephone1").val();
         contact_telephone2 = $("#groupeContact_telephone2").val();
         contact_mail = $("#groupeContact_mail").val();
         adresse_numero_rue = $("#groupeContact_numero_rue").val();
         adresse_type_voie = $("#groupeContact_type_voie").val();
         adresse_nomvoie = $("#groupeContact_adresse").val();
         adresse_complement_adresse = $("#groupeContact_complement_adresse").val();
         adresse_code_postal = $("#groupeContact_code_postal").val();
         adresse_ville = $("#groupeContact_ville").val();
         adresse_pays = $("#groupeContact_pays").val();
         statutGroupe = $('#statutGroupe').is(':checked');
        //  onvide les inputs
         $(':input','#modalGroupe')
          .not(':button, :submit, :reset, :hidden')
          .val('')
          .removeAttr('checked')
          .removeAttr('selected');
         $( "#modalGroupe" ).fadeOut( "slow", function() {});
         if(premierEnvoi)
         {
           premierEnvoi = false;
           creationGroupe(
             NiveauParentGroupe,
             IDGroupe,
             NiveauGroupe,
             Nom,
             groupeDate_activation,
             groupeDate_desactivation,
             groupeDescription,
             contact_civilite,
             contact_nom,
             contact_prenom,
             contact_telephone1,
             contact_telephone2,
             contact_mail,
             adresse_numero_rue,
             adresse_type_voie,
             adresse_nomvoie,
             adresse_complement_adresse,
             adresse_code_postal,
             adresse_ville,
             adresse_pays,
             statutGroupe
           );
         }
      });
   }
    $( "#AnnuleFormGroupe" ).click(function() {
      $( "#modalGroupe" ).fadeOut( "slow", function() {});
    });

   function supprimerGroupe(NiveauParentGroupe, IDGroupe, NiveauGroupe) {
    console.log('supression');
    console.log(NiveauParentGroupe);
    console.log(IDGroupe);
    console.log(NiveauGroupe);
     NiveauParentGroupe = NiveauParentGroupe;
     IDGroupe = IDGroupe;
     NiveauGroupe = NiveauGroupe;
       swal({
               title: "Êtes-vous sûr ?",
               text: "Le groupe sera supprimé",
               type: "warning",
               showCancelButton: true,
               confirmButtonColor: "#DD6B55",
               confirmButtonText: "Oui, supprimer",
               cancelButtonText: "Annuler",
               closeOnConfirm: true
           },
           function() {
               $.post("action/deleteGroupe.php", {
                       NiveauParentGroupe: NiveauParentGroupe,
                       IDGroupe: IDGroupe,
                       NiveauGroupe: NiveauGroupe
                   },
                   function(data) {
                       Materialize.toast(data, 4000);
                       actualiserGroupe();
                   }
               );
           });
   }
   function editGroupe(NiveauParentGroupe, IDGroupe, NiveauGroupe) {
    //  actualiser le formulaire
    $('#formulaire_groupe').load('modules/ajax/actuFormulaireGroupe.php?NiveauParentGroupe='+NiveauParentGroupe+'&IDGroupe='+IDGroupe+'&NiveauGroupe='+NiveauGroupe).fadeIn("slow");

    // fin actualisation formulaire
    $("#groupeNiveauParentGroupe").val(NiveauParentGroupe);
    $("#groupeIDGroupe").val(IDGroupe);
    $("#groupeNiveauGroupe").val(NiveauGroupe);
    $( "#modalGroupe" ).fadeOut( "slow", function() {});
    $( "#validerFormGroupeCreate" ).fadeOut( "slow", function() {});
    $( "#validerFormGroupeEdit" ).fadeIn( "slow", function() {});
    $( "#modalGroupe" ).fadeIn( "slow", function() {});
    premierEnvoi = true;
    // variable 'premierEnvoi' == pour eviter un multiple envoi (a cause des ouvertures et fermeture du modal)
    $( "#validerFormGroupeEdit" ).click(function() {
     //  Cordnnée groupe debut
      NiveauParentGroupe = $("#groupeNiveauParentGroupe").val();
      IDGroupe = $("#groupeIDGroupe").val();
      NiveauGroupe = $("#groupeNiveauGroupe").val();
      groupeIDParentGroupe = $("#groupeIDParentGroupe").val();
      groupeNouveauIDParentGroupe = $("#groupeNouveauIDParentGroupe").val();
     //  Cordnnée groupe fin
       Nom = $("#groupe_nom").val();
       groupeDate_activation = $("#groupeDate_activation").val();
       groupeDate_desactivation = $("#groupeDate_desactivation").val();
       groupeDescription = $("#groupeDescription").val();
       contact_civilite = $("#groupeContact_civilite").val();
       contact_nom = $("#groupeContact_nom").val();
       contact_prenom = $("#groupeContact_prenom").val();
       contact_telephone1 = $("#groupeContact_telephone1").val();
       contact_telephone2 = $("#groupeContact_telephone2").val();
       contact_mail = $("#groupeContact_mail").val();
       adresse_numero_rue = $("#groupeContact_numero_rue").val();
       adresse_type_voie = $("#groupeContact_type_voie").val();
       adresse_nomvoie = $("#groupeContact_adresse").val();
       adresse_complement_adresse = $("#groupeContact_complement_adresse").val();
       adresse_code_postal = $("#groupeContact_code_postal").val();
       adresse_ville = $("#groupeContact_ville").val();
       adresse_pays = $("#groupeContact_pays").val();
      //  statutGroupe = $('#statutGroupe').attr('checked');
       statutGroupe = $('#statutGroupe').is(':checked');

       // on vide les inputs
       $(':input','#modalGroupe')
        .not(':button, :submit, :reset, :hidden')
        .val('')
        .removeAttr('checked')
        .removeAttr('selected');
       $( "#modalGroupe" ).fadeOut( "slow", function() {});
       if(premierEnvoi)
       {
         premierEnvoi = false;
         editGroupeAjax(
           NiveauParentGroupe,
           IDGroupe,
           NiveauGroupe,
           groupeIDParentGroupe,
           groupeNouveauIDParentGroupe,
           Nom,
           groupeDate_activation,
           groupeDate_desactivation,
           groupeDescription,
           contact_civilite,
           contact_nom,
           contact_prenom,
           contact_telephone1,
           contact_telephone2,
           contact_mail,
           adresse_numero_rue,
           adresse_type_voie,
           adresse_nomvoie,
           adresse_complement_adresse,
           adresse_code_postal,
           adresse_ville,
           adresse_pays,
           statutGroupe
         );
       }
    });
   }
   function afficherDetail(NiveauParentGroupe, IDGroupe, NiveauGroupe) {
     $('#modalGroupe').hide();
     $('.iconColorGroupe').one('click', function(){
       $('.iconColorGroupe').css("color","#039be5");
       $('.iconColorGroupe').css("font-size","25px");
       $( this ).css("color","#4cc4ff");
       $( this ).css("font-size","35px");
     });
     rechercheOu = "entite";
     rechercheQuoi = NiveauGroupe + "@"+ IDGroupe;
     $('#formulaire_groupe').load('modules/ajax/users.php?searchOu='+rechercheOu+'&searchQuoi='+rechercheQuoi).fadeIn("slow");
   }



function actualiserGroupe() {
  //$('#utilisateurs_groupe').load('modules/ajax/groupe.php').fadeIn("slow");
  $('#liste_groupe').load('modules/ajax/groupe.php').fadeIn("slow");
}

</script>


<!-- Module utilisateur_validation -->
<div class="row" id="utilisateurs_validation">
  <div class="col l12 m12 s12">
    <h5>En attente de validation</h5>
  </div>
  <div class="col l12 m12 s12">
    <table class="striped" id="liste_ayant_droit">
      <thead>
        <tr>
          <th>Civilité</th>
          <th>Nom</th>
          <th>Prénom</th>
          <th>Date de naissance</th>
          <th>Type</th>
          <th>Pièce jointe</th>
          <th>Statut</th>
          <th>Commentaire</th>
          <th>Valider</th>
          <th>Supprimer</th>
        </tr>
      </thead>
      <tbody>
        <?php
        $compteAyantdroit = 0;
        $requete_donnees_ayant_droit = $base->query("SELECT * FROM tactic_documents WHERE valide LIKE 0");
        $requete_donnees_ayant_droit->setFetchMode(PDO::FETCH_OBJ);
        while( $donnees_ayant_droit = $requete_donnees_ayant_droit->fetch())
        {
          $compteAyantdroit ++;
          ?>
          <tr id="<?php echo $donnees_ayant_droit->id."ayantDroit"; ?>">
            <td><?php echo $donnees_ayant_droit->civilite; ?></td>
            <td><?php echo $donnees_ayant_droit->nom; ?></td>
            <td><?php echo $donnees_ayant_droit->prenom; ?></td>
            <td><?php echo $donnees_ayant_droit->date_naissance; ?></td>
            <td><?php echo $donnees_ayant_droit->type; ?></td>
            <td><a class="grey-text text-darken-3" href="uploads/pdf/<?php echo $donnees_ayant_droit->src; ?>" target="_blank" ><i class="material-icons">picture_as_pdf</i></a></td>
            <td><?php echo $donnees_ayant_droit->statut; ?></td>
            <td class="tooltipped " data-position="top" data-delay="50" data-tooltip="<?php echo $donnees_ayant_droit->commentaire ?>" data-tooltip-id="3795f63d-86a9-0850-6c57-b319ce30059f"><?php
            if (strlen($donnees_ayant_droit->commentaire) > 30) {
              echo substr($donnees_ayant_droit->commentaire, 0, 28)."...";
            }
            else {
              echo $donnees_ayant_droit->commentaire;
            }
            ?></td>
            <td>
              <a style="cursor:pointer" onclick="valideAyant_droit(<?php echo $donnees_ayant_droit->id; ?>, <?php echo $donnees_ayant_droit->lien_id_usr; ?>)"><i class="material-icons green-text text-lighten-3">done</i></a>
            </td>
            <td>
              <a style="cursor:pointer" onclick="refuseAyant_droit(<?php echo $donnees_ayant_droit->id; ?>, <?php echo $donnees_ayant_droit->lien_id_usr; ?>)"><i class="material-icons red-text text-lighten-3">do_not_disturb</i></a>
            </td>
          </tr>
          <?php
        }
        if ($compteAyantdroit == 0) {
          echo "Aucun Ayant droit en attente de validation.";
        }
        ?>
      </tbody>
    </table>
  </div>
</div>
<!-- Module utilisateur_validation -->
<div class="row" id="utilisateurs_desactivation">
  <div class="col l12 m12 s12">
    <h5>Liste des utilisateurs à désactiver</h5>
  </div>
  <div class="col l12 m12 s12" id="liste_users_desactiver">

  </div>
</div>

<?php
// On compte le nombre d'utilisateur à desactiver
$compteDesactivation = 0;
$requete_donnees_ayant_droit = $base->query("SELECT id FROM users WHERE desactiver LIKE 'oui'");
$requete_donnees_ayant_droit->setFetchMode(PDO::FETCH_OBJ);
while( $donnees_ayant_droit = $requete_donnees_ayant_droit->fetch())
{
  $compteDesactivation ++;
}

 ?>
<script type="text/javascript">
$(document).ready(function(){
  $('#liste_users_desactiver').load('modules/ajax/users.php?searchOu=desactiver&searchQuoi=oui').fadeIn("slow");

  var desactivation_nb = '<?php echo $compteDesactivation ?>';
  if (desactivation_nb == 0) {
    $("#info_desactivation_nb").slideUp("0");
  }
  else {
    $("#info_desactivation_nb").text(desactivation_nb);
  }
});

</script>
<!-- Modal Import de masse groupe-->
<div id="modalImport_groupe" class="modal bottom-sheet">
  <form class="col s12" action="importmasse_groupe.php" method="post" enctype="multipart/form-data">
    <div class="modal-content">
      <h4 class="param_info">Création multiple de groupe</h4>
      <form action="importmasse.php" method="post" enctype="multipart/form-data">
        <div class="file-field input-field">
          <div class="btn">
            <span>File</span>
            <input name="fichierCsv" type="file" multiple>
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text" placeholder="Fichier au format CSV">
          </div>
        </div>
        <div class="row right-align">
          <input class="waves-effect waves-light btn red" type="submit" name="" value="Création multiple">
        </div>
        <div class="col s12">
          <a title="Télecharger le modele type" href="../include/document_Type.csv"><i class="material-icons">insert_drive_file</i>télécharger le modèle type</a>
        </div>
      </form>
    </div>
  </form>
</div>

<!-- Modal Import de masse utilisateurs-->
<div id="modalImport" class="modal bottom-sheet">
  <form class="col s12" action="importmasse.php" method="post" enctype="multipart/form-data">
    <div class="modal-content">
      <h4 class="param_info">Création multiple d'utilisateurs</h4>
      <form action="importmasse.php" method="post" enctype="multipart/form-data">
        <div class="file-field input-field">
          <div class="btn">
            <span>File</span>
            <input name="fichierCsv" type="file" multiple>
          </div>
          <div class="file-path-wrapper">
            <input class="file-path validate" type="text" placeholder="Fichier au format CSV">
          </div>
        </div>
        <div class="row right-align">
          <input class="waves-effect waves-light btn red" type="submit" name="" value="Création multiple">
        </div>
        <div class="col s12">
          <a title="Télecharger le modele type" href="../include/document_Type.csv"><i class="material-icons">insert_drive_file</i>télécharger le modèle type</a>
        </div>
      </form>
    </div>
  </form>
</div>
<!-- Modal Création utilisateur -->
<div id="modalAddUser" class="modal bottom-sheet">
  <div class="modal-content">
    <h4 class="param_info">Créer un utilisateur</h4>
    <div class="row">
      <form class="col s12" action="/" id="SubmitUsersForm">
        <div class="row">
          <!-- DROITS -->
          <fieldset class="">
            <legend class="center">Droits</legend>
            <div class="input-field col l3 m6 s12">
              <select id="droits_select">
                <option value="" disabled selected>Droits</option>
                <option value="user">User</option>
                <option value="admin">Admin</option>
                <?php
                // on regarde si l'utilisateur est uper_admins, si c'est le cas, il peut créer d'autre usper_admins
                if ($_SESSION['droits'] == "super_admins") {
                  ?>
                  <option value="super_admins">Super_admins</option>
                  <?php
                }
                ?>
              </select>
            </div>
          </fieldset>
        </div>
        <!-- CONTACT -->
        <div class="row">
          <fieldset class="">
            <legend class="center">Contact</legend>
            <div class="input-field col l3 m6 s12">
              <select id="Civilité_select">
                <option value="" disabled selected>Civilité</option>
                <option value="Monsieur">Monsieur</option>
                <option value="Madame">Madame</option>
                <option value="Mademoiselle">Mademoiselle</option>
              </select>
            </div>
            <div class="input-field col l3 m6 s12">
              <input id="nom_select" type="text" class="validate">
              <label for="icon_prefix">Nom</label>
            </div>
            <div class="input-field col l3 m6 s12">
              <input id="prenom_select" type="text" class="validate">
              <label for="icon_prefix">Prénom</label>
            </div>
            <div class="input-field col l3 m6 s12">
              <input id="matricule_select" type="text" class="validate">
              <label for="icon_prefix">Matricule</label>
            </div>
            <div class="input-field col l3 m6 s12">
              <select id="entite_select" name="entite">
                <option value="" selected disabled >Groupe</option>
                <?php
                $requete_donnees_parametres_libelle_droit_utilisateur = $base->query("SELECT * FROM tactic_groupes");
                $requete_donnees_parametres_libelle_droit_utilisateur->setFetchMode(PDO::FETCH_OBJ);
                while( $donnees_parametres_libelle_droit_utilisateur = $requete_donnees_parametres_libelle_droit_utilisateur->fetch() )
                {
                  ?>
                  <option value="<?php echo $donnees_parametres_libelle_droit_utilisateur->nom ?>"><?php echo $donnees_parametres_libelle_droit_utilisateur->nom ?></option>
                  <?php
                }
                ?>
              </select>
            </div>
            <div class="input-field col l3 m6 s12">
              <input id="telephone_select" name="telephone" type="tel" class="validate" value="" >
              <label for="icon_prefix">Téléphone 1</label>
            </div>
            <div class="input-field col l3 m6 s12">
              <input id="telephone_portable_select" name="telephone_portable" type="tel" class="validate" value="" >
              <label for="icon_prefix">Téléphone 2</label>
            </div>
            <div class="input-field col l3 m6 s12">
              <input id="mail_select" name="mail" type="email" class="validate" value="" >
              <label for="icon_prefix">Mail</label>
            </div>
            <div class="col l3 m6 s12">
              <label for="icon_prefix">Anciennete</label>
              <input id="anciennete_select" name="anciennete" type="date" class="validate" value="" >
            </div>
            <div class="input-field col l3 m6 s12">
              <input id="type_contract_select" name="type_contract" type="text" class="validate" value="" >
              <label for="icon_prefix">Type contrat</label>
            </div>
          </fieldset>
          <!-- ADRESSE -->
          <fieldset class="row">
            <legend class="center">Adresse</legend>
            <div class="input-field col l2 m6 s12">
              <input id="numero_rue_select" name="numero_rue" type="text" class="validate" value="" >
              <label for="icon_prefix">Numero rue</label>
            </div>
            <div class="input-field col l2 m6 s12">
              <input id="type_voie_select" name="type_voie" type="text" class="validate" value="" >
              <label for="icon_prefix">Type voie</label>
            </div>
            <div class="input-field col l8 m6 s12">
              <input id="adresse_select" name="adresse" type="text" class="validate" value="" >
              <label for="icon_prefix">Adresse</label>
            </div>
            <div class="input-field col l6 m6 s12">
              <input id="complement_adresse_select" name="complement_adresse" type="text" class="validate" value="">
              <label for="icon_prefix">Complement adresse</label>
            </div>
            <div class="input-field col l2 m6 s12">
              <input id="code_postal_select" name="code_postal" type="number" class="validate" value="" >
              <label for="icon_prefix">Code postal</label>
            </div>
            <div class="input-field col l2 m6 s12">
              <input id="ville_select" name="ville" type="text" class="validate" value="" >
              <label for="icon_prefix">Ville</label>
            </div>
            <div class="input-field col l2 m6 s12">
              <input id="pays_select" name="pays" type="text" class="validate" value="" >
              <label for="icon_prefix">Pays</label>
            </div>
          </fieldset>
        </div>
        <div class="row right-align">
          <div class="input-field col offset-m6 m6 s12">
            <a id="btn_ajax_create_user" class="waves-effect waves-light btn red"><i class="material-icons right">add</i>Créer</a>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Modal création ensemble -->
<div id="modalAddEnsemble" class="modal bottom-sheet">
  <div class="modal-content">
    <h4 class="param_info">Création d'un nouveau groupe</h4>
    <form>
      <div class="input-field col m6 s12">
        <input id="value_libelle_libelle" type="text" class="validate">
        <label for="icon_prefix">Nom</label>
      </div>
      <div class="input-field col m6 s12">
        <input id="value_libelle_adresse" type="text" class="validate">
        <label for="icon_prefix">Adresse</label>
      </div>
      <div class="row right-align">
        <div class="input-field col offset-m6 m6 s12">
          <a id="btn_ajax_create_ensemble" class="waves-effect waves-light btn red" type="submit" name="">Créer</a>
        </div>
      </div>
    </form>
  </div>
</div>
<!-- Modal update mdp -->
<div id="modalAddMdp" class="modal bottom-sheet">
  <div class="modal-content">
    <h4 class="param_info">Réinitialisation du mot de passe</h4>
    <form  id="submit_form_mdp" class="" action="action/update_mdp.php" method="post">
      <input type="hidden" name="id" id="idForPass" value="">
      <div class="input-field col m12 s12">
        <input id="password1" name="password1" type="password" class="validate" value="" required>
        <label for="icon_prefix">Nouveau mot de passe</label>
      </div>
      <div class="input-field col m12 s12">
        <input id="password2" name="password2" type="password" class="validate" value="" required>
        <label for="icon_prefix">Confirmer le nouveau mot de passe</label>
      </div>
      <div class="input-field col s12 right-align">
        <input id="input_mdp_edit" class="waves-effect waves-light btn red" type="button" value="Valider" name="submit_offre" style="margin: 8px">
      </div>
    </form>
  </div>
</div>
</div>
<script type="text/javascript">

var ayantdroit = "<?php echo $compteAyantdroit; ?>";
if (ayantdroit == 0) {
  $("#info_ayantdroit_nb").slideUp("0");
}
else {
  $("#info_ayantdroit_nb").text(ayantdroit);
}

// on rentre l'id dans le modal pour modifier le mdp
function ouverturemodalmdp(token) {
  $("#idForPass").val(token);
}

// action sur les ayantdroit
function valideAyant_droit(id, id_usr) {
  swal({
    title: "Êtes-vous sûr ?",
    text: "Cet ayant droit sera validé",
    type: "success",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Oui",
    cancelButtonText: "Annuler",
    closeOnConfirm: false
  },
  function(){
    $.post("action/valide_ayant_droit.php",
    {
      id : id,
      id_usr : id_usr
    },
    function(data) {
      swal(data, "success");
      $('#' + id + 'ayantDroit').slideUp();
    }
  );
});
}


// action sur les ayantdroit
function refuseAyant_droit(id, id_usr) {
  swal({
    title: "Êtes-vous sûr ?",
    text: "Cet ayant droit sera refusé",
    type: "input",
    showCancelButton: true,
    closeOnConfirm: false,
    animation: "slide-from-top",
    inputPlaceholder: "Votre commentaire"
  },
  function (inputValue){
    if (inputValue != "") {
      bitch(id, id_usr, inputValue);
    }
    else if (inputValue == "") {
      swal.showInputError("Un commentaire est obligatoire !")
    }
    return false;
  });
}

// function bitch
function bitch(id, id_usr, inputValue){
  $.post("action/refuser_ayant_droit.php",
  {
    id : id,
    id_usr : id_usr,
    com : inputValue
  },
  function(data) {
    swal("Deleted!", "Ayant droit refusé!" + data, "success");
    $('#' + id + 'ayantDroit').slideUp();
  })
  return true;
}
// Submit MDP
$("#input_mdp_edit").click(function(event){
  password1 = $("#password1").val();
  password2 = $("#password2").val();
  if ((password1 != "") && (password2 != "")) {
    if(password1 == password2){
      swal("Requete prête");
      $("#submit_form_mdp").submit();
    }
    else {
      swal("Le mot de passe et la confirmation ne sont pas identiques !");
    }
  }
  else {
    swal("Des informations sont manquantes");
  }
});


// Submit droit utilisateur
$("#btn_ajax_create_ensemble").click(function(event){
  value_libelle_droit_libelle = $("#value_libelle_libelle").val();
  value_libelle_droit_adresse = $("#value_libelle_adresse").val();
  if(value_libelle_droit_libelle != "" )
  {
    $.post("action/createLibelleDroit.php",
    {
      LibelleDroit : value_libelle_droit_libelle,
      LibelleAdresse : value_libelle_droit_adresse
    },
    function(data) {
      Materialize.toast(data, 4000);
      $("#value_libelle_libelle").val("");
      $("#value_libelle_adresse").val("");
    }
  );
}
else {
  Materialize.toast('Des informations sont manquante', 4000);
}
});


// Recharge liste utilisateur ajax fin
// desactiver debut
function desactiverUser(id) {
  swal({
    title: "Êtes-vous sûr ?",
    text: "L'utilisateur sera désactivé",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Oui, désactiver",
    cancelButtonText: "Annuler",
    closeOnConfirm: false
  },
  function(){
    $.post("action/desactiverUtilisateur.php",
    {
      id : id
    },
    function(data) {
      Materialize.toast('Utilisateur désactivé avec succès', 4000);
      swal("Désactivé!", "Utilisateur désactivé avec succès", "success");
    }
  );
});
}
// desactiver fin
// activer debut
function activerUser(id) {
  swal({
    title: "Êtes-vous sûr ?",
    text: "L'utilisateur sera activé",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Oui, activer",
    cancelButtonText: "Annuler",
    closeOnConfirm: false
  },
  function(){
    $.post("action/ActiverUtilisateur.php",
    {
      id : id
    },
    function(data) {
      Materialize.toast('Utilisateur activé avec succès', 4000);
      swal("Activé!", "Utilisateur activé avec succès", "success");
    }
  );
});
}
// activer fin
function deleteLibelleDroit(id_libelle_droit) {
  swal({
    title: "Êtes-vous sûr ?",
    text: "Ce libellé de droit sera definitivement supprimé",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Oui, supprimer!",
    closeOnConfirm: false
  },
  function(){
    $.post("action/deleteLibelleDroit.php",
    {
      id : id_libelle_droit
    },
    function(data) {
      Materialize.toast('Libellé de droit supprimé avec succès', 4000);
      $( "#libelle_droit_"+id_libelle_droit).fadeOut("slow");
      swal("Supprimé!", "Le droit a été correctement supprimé.", "success");
    }
  );
});
}
// Fin submit droit utilisateur

// SUBMIT Ultilisateur
$("#btn_ajax_create_user").click(function(event){
  droits_select = $("#droits_select").val();
  civilité_select = $("#Civilité_select").val();
  nom_select = $("#nom_select").val();
  prenom_select = $("#prenom_select").val();
  matricule_select = $("#matricule_select").val();
  entite = $("#entite_select").val();
  telephone = $("#telephone_select").val();
  telephone_portable = $("#telephone_portable_select").val();
  mail = $("#mail_select").val();
  anciennete = $("#anciennete_select").val();
  type_contract = $("#type_contract_select").val();
  numero_rue = $("#numero_rue_select").val();
  type_voie = $("#type_voie_select").val();
  adresse = $("#adresse_select").val();
  complement_adresse = $("#complement_adresse_select").val();
  code_postal = $("#code_postal_select").val();
  ville = $("#ville_select").val();
  pays = $("#pays_select").val();

  if(civilité_select != null && nom_select != "" && prenom_select != "" && matricule_select != "" && droits_select != null)
  {
    $.post("action/createUsers.php",
    {
      droits : droits_select,
      civilité : civilité_select,
      nom : nom_select,
      matricule : matricule_select,
      entite : entite,
      telephone : telephone,
      telephone_portable : telephone_portable,
      mail : mail,
      anciennete : anciennete,
      type_contract : type_contract,
      numero_rue : numero_rue,
      type_voie : type_voie,
      adresse : adresse,
      complement_adresse : complement_adresse,
      code_postal : code_postal,
      ville : ville,
      prenom : prenom_select,
      pays : pays
    },
    function(data) {
      Materialize.toast(data, 4000);
      $("#droits_select").val("");
      $("#Civilité_select").val("");
      $("#nom_select").val("");
      $("#prenom_select_select").val("");
      $("#matricule_select").val("");
      $("#entite_select_select").val("");
      $("#telephone_select").val("");
      $("#telephone_portable_select").val("");
      $("#mail_select").val("");
      $("#anciennete_select").val("");
      $("#type_contract_select").val("");
      $("#numero_rue_select").val("");
      $("#type_voie_select").val("");
      $("#adresse_select").val("");
      $("#complement_adresse_select").val("");
      $("#code_postal_select").val("");
      $("#ville_select").val("");
      $("#pays_select").val("");
    }
  );
}
else {
  Materialize.toast('Des informations sont manquante', 4000);
}
});
//FIN SUBMIT
function deleteUser(id_user) {
  swal({
    title: "Êtes-vous sûr ?",
    text: "Cet utilisateur sera définitivement supprimé",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Oui, Supprimer!",
    closeOnConfirm: false
  },
  function(){
    $.post("action/deleteUsers.php",
    {
      id : id_user
    },
    function(data) {
      Materialize.toast('Utilisateur supprimé avec succès', 4000);
      $( "#ligne_user_"+id_user).fadeOut("slow");
      swal("Supprimé!", "L'utilisateur a été correctement supprimé.", "success");
    }
  );
});
}
function toggleAreaNewUser() {
  $('#creerprofil').slideToggle();
  if($('#btnadduser').text() == 'arrow_downward'){
    $('#btnadduser').text('person_add');
  }
  else {
    $('#btnadduser').text('arrow_downward');
  }
}
$('#btn_add_user').click(function() {
  toggleAreaNewUser()
});
$('#AnnulerToggleNewUser').click(function() {
  toggleAreaNewUser()
});

$('#btn_exportmass').click(function() {
  $('#alertExportCsv').load('modules/ajax/alertExportCsv.php').fadeIn("slow");
});
$('#btn_exportmass_groupe').click(function() {
  $('#alertExportCsv_groupe').load('modules/ajax/alertExportCsv.php').fadeIn("slow");
});



</script>
</div>
