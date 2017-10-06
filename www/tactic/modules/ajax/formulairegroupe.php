
 <!-- Modal Structure -->
 <div id="modalGroupe" class="z-depth-2" style="display:none">
   <div class="modal-content">
     <input id="groupeNiveauParentGroupe" type="hidden" name="" value="">
     <input id="groupeIDGroupe" type="hidden" name="" value="">
     <input id="groupeNiveauGroupe" type="hidden" name="" value="">
     <!-- Contact -->
     <fieldset class="row">
       <legend class="center">Groupe</legend>
       <div class="col l3 m6 s12">
         <label for="groupe_nom">Nom</label>
         <input id="groupe_nom" name="groupe_nom" type="text" class="validate" value="" required >
       </div>
       <div class="col l3 m6 s12">
         <label for="groupeDate_activation">Date d'activation</label>
         <input id="groupeDate_activation" name="groupeDate_activation" type="date" class="validate" value="" required >
       </div>
       <?php
       $date = date("Y-m-d");
        ?>
       <script>
         document.getElementById("groupeDate_activation").defaultValue = "";
       </script>
       <div class="col l3 m6 s12">
         <label for="groupeDate_desactivation">Date de désactivation</label>
         <input id="groupeDate_desactivation" name="groupeDate_desactivation" type="date" class="validate" value="" required >
       </div>
       <div class="col l3 m6 s12">
         <div class="switch">
            <label>
              Désactivé
              <input id="statutGroupe" type="checkbox" checked>
              <span class="lever"></span>
              Activé
            </label>
          </div>
       </div>
       <div class="col l12 m12 s12">
         <label for="groupeDescription">Description</label>
         <textarea required id="groupeDescription" name="groupeDescription" class="materialize-textarea"></textarea>
       </div>
       <button class="waves-effect waves-light btn light-blue lighten-3" id="btnGroupeParentTab" type="button" name="button">Choisir un nouveau groupe parent</button>
     </fieldset>
     <!-- Contact -->
     <fieldset class="row">
       <legend class="center">Contact</legend>
       <div class="col l4 m6 s12">
         <label for="icon_prefix">Civilité</label>
         <input id="groupeContact_civilite" list="civilites" name="groupeContact_civilite" type="text" class="validate autocomplete" value="" required >
         <datalist id="civilites">
           <option value="Monsieur">
           <option value="Madame">
           <option value="Mademoiselle">
         </datalist>
       </div>
       <div class="col l4 m6 s12">
         <label for="icon_prefix">Nom</label>
         <input id="groupeContact_nom" name="nom" type="text" class="validate" value="" required >
       </div>
       <div class="col l4 m6 s12">
         <label for="icon_prefix">Prénom</label>
         <input id="groupeContact_prenom" name="prenom" type="text" class="validate" value="" required >
       </div>
       <div class="col l4 m6 s12">
         <label for="icon_prefix">Téléphone 1</label>
         <input id="groupeContact_telephone1" name="telephone" type="tel" class="validate" value="" required>
       </div>
       <div class="col l4 m6 s12">
         <label for="icon_prefix">Téléphone 2</label>
         <input id="groupeContact_telephone2" name="telephone_portable" type="tel" class="validate" value="" required>
       </div>
       <div class="col l4 m6 s12">
         <label for="icon_prefix">Mail</label>
         <input id="groupeContact_mail" name="mail" type="email" class="validate" value="" required>
       </div>
     </fieldset>
     <!-- Adresse -->

     <fieldset class="row">
       <legend class="center">Adresse</legend>
       <div class="col l2 m6 s12">
         <label for="icon_prefix">Numéro rue</label>
         <input id="groupeContact_numero_rue" name="numero_rue" type="text" class="validate" value="" required>
       </div>
       <div class="col l2 m6 s12">
         <label for="icon_prefix">Type voie</label>
         <input id="groupeContact_type_voie" name="type_voie" type="text" class="validate" value="" required>
       </div>
       <div class="col l8 m6 s12">
         <label for="icon_prefix">Adresse</label>
         <input id="groupeContact_adresse" name="adresse" type="text" class="validate" value="" required>
       </div>
       <div class="col l6 m6 s12">
         <label for="icon_prefix">Complément adresse</label>
         <input id="groupeContact_complement_adresse" name="complement_adresse" type="text" class="validate" value="">
       </div>
       <div class="col l2 m6 s12">
         <label for="icon_prefix">Code postal</label>
         <input id="groupeContact_code_postal" name="code_postal" type="number" class="validate" value="" required>
       </div>
       <div class="col l2 m6 s12">
         <label for="icon_prefix">Ville</label>
         <input id="groupeContact_ville" name="ville" type="text" class="validate" value="" required>
       </div>
       <div class="col l2 m6 s12">
         <label for="icon_prefix">Pays</label>
         <input id="groupeContact_pays" name="pays" type="text" class="validate" value="" required>
       </div>
     </fieldset>

   </div>

   <div class="">
     <a style="margin: 10px;" id="AnnuleFormGroupe" href="#!" class="waves-effect waves-light btn grey lighten-1 right-align">Annuler</a>
     <a style="margin: 10px;" id="validerFormGroupeEdit" href="#!" class="waves-effect waves-light btn green accent-4 right-align">Editer groupe</a>
     <a style="margin: 10px;" id="validerFormGroupeCreate" href="#!" class="waves-effect waves-light btn green accent-4 right-align">Valider groupe</a>
   </div>
 </div>



<!-- Modal Structure -->
<div id="modal_tab_group" class="modal modal-fixed-footer">
  <div class="modal-content">
    <h4>Tableau des groupes</h4>
    <p>Pour déplacer le groupe vers un nouveau groupe parent, selectionner sa destination dans la liste ci-dessous, si vous voulez deplacer votre groupe a la racine, <a onclick='selectParentGroupe(0, 0)' href="#"> cliquez ici</a></p>
    <table>
         <thead>
           <tr>
               <th>Groupe niveau 1</th>
               <th>Groupe niveau 2</th>
               <th>Groupe niveau 3</th>
               <th>Groupe niveau 4</th>
           </tr>
         </thead>
         <tbody>
           <tr>
             <td>
               <ul>
                 <?php
                 $requete_donnees_groupe_1 = $base->query("SELECT id, nom, statut FROM tactic_groupes WHERE niveau LIKE '1' ");
                 $requete_donnees_groupe_1->setFetchMode(PDO::FETCH_OBJ);
                 while( $groupe_1_liste = $requete_donnees_groupe_1->fetch())
                 {
                   echo "<li onclick='selectParentGroupe(1, ".$groupe_1_liste->id.")'>".$groupe_1_liste->nom."</li>";
                 }
                  ?>
               </ul>
             </td>
             <td>
               <ul>
                 <?php
                 $requete_donnees_groupe_2 = $base->query("SELECT id, nom, statut FROM tactic_groupes WHERE niveau LIKE '2' ");
                 $requete_donnees_groupe_2->setFetchMode(PDO::FETCH_OBJ);
                 while( $groupe_2_liste = $requete_donnees_groupe_2->fetch())
                 {
                   echo "<li onclick='selectParentGroupe(2, ".$groupe_2_liste->id.")'>".$groupe_2_liste->nom."</li>";
                 }
                  ?>
               </ul>
             </td>
             <td>
               <ul>
                 <?php
                 $requete_donnees_groupe_3 = $base->query("SELECT id, nom, statut FROM tactic_groupes WHERE niveau LIKE '3' ");
                 $requete_donnees_groupe_3->setFetchMode(PDO::FETCH_OBJ);
                 while( $groupe_3_liste = $requete_donnees_groupe_3->fetch())
                 {
                   echo "<li onclick='selectParentGroupe(3, ".$groupe_3_liste->id.")'>".$groupe_3_liste->nom."</li>";
                 }
                  ?>
               </ul>
             </td>
             <td>
               <ul>
                 <?php
                 $requete_donnees_groupe_4 = $base->query("SELECT id, nom, statut FROM tactic_groupes WHERE niveau LIKE '4' ");
                 $requete_donnees_groupe_4->setFetchMode(PDO::FETCH_OBJ);
                 while( $groupe_4_liste = $requete_donnees_groupe_4->fetch())
                 {
                   echo "<li onclick='selectParentGroupe(4, ".$groupe_4_liste->id.")'>".$groupe_4_liste->nom."</li>";
                 }
                  ?>
               </ul>
             </td>
           </tr>
         </tbody>
       </table>
  </div>
  <div class="modal-footer">
    <a href="#!" class="modal-action modal-close waves-effect waves-green btn-flat ">Retour</a>
  </div>
</div>

<script type="text/javascript">
$(document).ready(function(){
  // the "href" attribute of the modal trigger must specify the modal ID that wants to be triggered
  $('.modal').modal();
  $('#btnGroupeParentTab').click(function(event) {
    $('#modal_tab_group').modal('open');
  });
});

function selectParentGroupe(niveauGroupeParent, idGroupe) {
  $('#modal_tab_group').modal('close');
  $('#groupeIDGroupe').val(idGroupe);
  $('#groupeNiveauGroupe').val(niveauGroupeParent);
}

</script>
