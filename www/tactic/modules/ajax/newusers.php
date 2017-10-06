<div id="divNewUser" class="">
        <h2 class="header blue-text text-lighten-1"><i style="font-size:50px" class="material-icons">mode_edit</i>Création de profil</h2>
        <div class="row white z-depth-1 int_container">
          <div class="col s12">
            <form id="submit_form" class="" action="action/createUsers.php" method="post">
               <!-- Contact -->
              <fieldset class="row">
                <legend class="center">Contact</legend>
                <div class="input-field col l4 m6 s12">
                  <select id="civilite" name="civilite">
                    <option value="" selected disabled >Civilité *</option>
                    <option value="Monsieur">Monsieur</option>
                    <option value="Madame">Madame</option>
                    <option value="Mademoiselle">Mademoiselle</option>
                  </select>
                </div>
                <div class="input-field col l4 m6 s12">
                  <input id="nom" name="nom" type="text" class="validate" value="" required>
                  <label for="icon_prefix">Nom *</label>
                </div>
                <div class="input-field col l4 m6 s12">
                  <input id="prenom" name="prenom" type="text" class="validate" value="" required>
                  <label for="icon_prefix">Prénom *</label>
                </div>
                <div class="input-field col l4 m6 s12">
                  <input id="telephone" name="telephone" type="tel" class="validate" value="" >
                  <label for="icon_prefix">Téléphone 1</label>
                </div>
                <div class="input-field col l4 m6 s12">
                  <input id="telephone_portable" name="telephone_portable" type="tel" class="validate" value="" >
                  <label for="icon_prefix">Téléphone 2</label>
                </div>
                <div class="input-field col l4 m6 s12">
                  <input id="mail" name="mail" type="email" class="validate" value="" >
                  <label for="icon_prefix">Mail</label>
                </div>
              </fieldset>
              <!-- Adresse -->
              <fieldset class="row">
                <legend class="center">Adresse</legend>
                <div class="input-field col l2 m6 s12">
                  <input id="numero_rue" name="numero_rue" type="text" class="validate" value="" >
                  <label for="icon_prefix">Numéro rue</label>
                </div>
                <div class="input-field col l2 m6 s12">
                  <input id="type_voie" name="type_voie" type="text" class="validate" value="" >
                  <label for="icon_prefix">Type voie</label>
                </div>
                <div class="input-field col l8 m6 s12">
                  <input id="adresse" name="adresse" type="text" class="validate" value="" >
                  <label for="icon_prefix">Adresse</label>
                </div>
                <div class="input-field col l6 m6 s12">
                  <input id="complement_adresse" name="complement_adresse" type="text" class="validate" value="">
                  <label for="icon_prefix">Complément adresse</label>
                </div>
                <div class="input-field col l2 m6 s12">
                  <input id="code_postal" name="code_postal" type="number" class="validate" value="" >
                  <label for="icon_prefix">Code postal</label>
                </div>
                <div class="input-field col l2 m6 s12">
                  <input id="ville" name="ville" type="text" class="validate" value="" >
                  <label for="icon_prefix">Ville</label>
                </div>
                <div class="input-field col l2 m6 s12">
                  <input id="pays" name="pays" type="text" class="validate" value="" >
                  <label for="icon_prefix">Pays</label>
                </div>
              </fieldset>
              <!-- adresse de livraions -->
              <div class="">
                <div id="checkboxAdresse">
                  <input type="checkbox" id="adresseIdentique" />
                  <label for="adresseIdentique">L'adresse de livraison est identique à l'adresse de facturation</label>
                </div>
                <div id="inputAdresse">
                  <fieldset class="row">
                    <legend class="center">Adresse de livraison</legend>
                    <div class="input-field col l2 m6 s12">
                      <input id="numero_rue_livraison" name="numero_rue_livraison" type="text" class="validate" value="" >
                      <label for="icon_prefix">Numéro rue</label>
                    </div>
                    <div class="input-field col l2 m6 s12">
                      <input id="type_voie_livraison" name="type_voie_livraison" type="text" class="validate" value="" >
                      <label for="icon_prefix">Type voie</label>
                    </div>
                    <div class="input-field col l8 m6 s12">
                      <input id="adresse_livraison" name="adresse_livraison" type="text" class="validate" value="" >
                      <label for="icon_prefix">Adresse</label>
                    </div>
                    <div class="input-field col l6 m6 s12">
                      <input id="complement_adresse_livraison" name="complement_adresse_livraison" type="text" class="validate" value="">
                      <label for="icon_prefix">Complément adresse</label>
                    </div>
                    <div class="input-field col l2 m6 s12">
                      <input id="code_postal_livraison" name="code_postal_livraison" type="number" class="validate" value="" >
                      <label for="icon_prefix">Code postal</label>
                    </div>
                    <div class="input-field col l2 m6 s12">
                      <input id="ville_livraison" name="ville_livraison" type="text" class="validate" value="" >
                      <label for="icon_prefix">Ville</label>
                    </div>
                    <div class="input-field col l2 m6 s12">
                      <input id="pays_livraison" name="pays_livraison" type="text" class="validate" value="" >
                      <label for="icon_prefix">Pays</label>
                    </div>
                  </fieldset>
                </div>
              </div>
              <!-- Information professionelles -->
              <fieldset class="row">
                <!-- entité -->
                <legend class="center">Informations professionelles</legend>
                <div class="input-field col l3 m6 s12">
                  <select id="entite" name="entite">
                    <option value="" selected disabled > Groupe * </option>
                    <?php
                    $requete_donnees_parametres_groupe_1 = $base->query("SELECT * FROM tactic_groupes WHERE niveau LIKE 1 ");
                    $requete_donnees_parametres_groupe_1->setFetchMode(PDO::FETCH_OBJ);
                    while( $donnees_parametres_groupe_1 = $requete_donnees_parametres_groupe_1->fetch() )
                    {
                      ?>
                      <option class="grey" value="1#<?php echo $donnees_parametres_groupe_1->id ?>$<?php echo $donnees_parametres_groupe_1->nom ?>"><?php echo $donnees_parametres_groupe_1->nom ?></option>
                        <!-- debut groupe de 2eme  -->
                        <?php
                        $requete_donnees_parametres_groupe_2 = $base->query("SELECT * FROM tactic_groupes WHERE id_parent LIKE  $donnees_parametres_groupe_1->id AND niveau LIKE 2");
                        $requete_donnees_parametres_groupe_2->setFetchMode(PDO::FETCH_OBJ);
                        while( $donnees_parametres_groupe_2 = $requete_donnees_parametres_groupe_2->fetch() )
                        {
                          ?>
                          <option value=" 2#<?php echo $donnees_parametres_groupe_2->id ?>$<?php echo $donnees_parametres_groupe_2->nom ?>">&nbsp;-->&nbsp;<?php echo $donnees_parametres_groupe_2->nom ?></option>
                          <!-- debut groupe de 3eme  -->
                          <?php
                          $requete_donnees_parametres_groupe_3 = $base->query("SELECT * FROM tactic_groupes WHERE id_parent LIKE  $donnees_parametres_groupe_2->id AND niveau LIKE 3");
                          $requete_donnees_parametres_groupe_3->setFetchMode(PDO::FETCH_OBJ);
                          while( $donnees_parametres_groupe_3 = $requete_donnees_parametres_groupe_3->fetch() )
                          {
                            ?>
                            <option value=" 3#<?php echo $donnees_parametres_groupe_3->id ?>$<?php echo $donnees_parametres_groupe_3->nom ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->&nbsp;<?php echo $donnees_parametres_groupe_3->nom ?></option>
                            <!-- debut groupe de 4eme  -->
                            <?php
                            $requete_donnees_parametres_groupe_4 = $base->query("SELECT * FROM tactic_groupes WHERE id_parent LIKE  $donnees_parametres_groupe_3->id AND niveau LIKE 4");
                            $requete_donnees_parametres_groupe_4->setFetchMode(PDO::FETCH_OBJ);
                            while( $donnees_parametres_groupe_4 = $requete_donnees_parametres_groupe_4->fetch() )
                            {
                              ?>
                              <option value=" 4#<?php echo $donnees_parametres_groupe_4->id ?>$<?php echo $donnees_parametres_groupe_4->nom ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->&nbsp;<?php echo $donnees_parametres_groupe_4->nom ?></option>
                              <!-- debut groupe de 5eme  -->
                              <?php
                              $requete_donnees_parametres_groupe_5 = $base->query("SELECT * FROM tactic_groupes WHERE id_parent LIKE  $donnees_parametres_groupe_4->id AND niveau LIKE 5");
                              $requete_donnees_parametres_groupe_5->setFetchMode(PDO::FETCH_OBJ);
                              while( $donnees_parametres_groupe_5 = $requete_donnees_parametres_groupe_5->fetch() )
                              {
                                ?>
                                <option value=" 5#<?php echo $donnees_parametres_groupe_5->id ?>$<?php echo $donnees_parametres_groupe_5->nom ?>">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;-->&nbsp;<?php echo $donnees_parametres_groupe_5->nom ?></option>

                                <?php
                              }
                              ?>
                              <!-- fin groupe de 5eme  -->
                              <?php
                            }
                            ?>
                            <!-- fin groupe de 4eme  -->
                            <?php
                          }
                          ?>
                          <!-- fin groupe de 3eme  -->
                          <?php
                        }
                        ?>
                        <!-- fin groupe de 2eme  -->
                        <?php
                    }
                    ?>


                    ?>
                  </select>
                </div>
                <div class="input-field col l3 m6 s12">
                  <input id="type_contract" name="type_contract" type="text" class="validate" value="" required>
                  <label for="icon_prefix">Type contrat *</label>
                </div>
                <div class="input-field col l3 m6 s12">
                  <input id="matricule" name="matricule" type="text" class="validate" value="" required>
                  <label for="icon_prefix">Matricule *</label>
                </div>
                <div class="col l3 m6 s12">
                  <label for="icon_prefix">Ancienneté *</label>
                  <input id="anciennete" name="anciennete" type="date" class="validate" value="" required>
                </div>
              </fieldset>
              <!-- Accèes plateforme -->
              <fieldset class="row">
                <!-- entité -->
                <legend class="center">Accès plateforme</legend>
                <div class="col l3 m6 s12">
                  <label for="icon_prefix">Identifiant *</label>
                  <input id="identifiant" name="identifiant" type="text" class="validate" value="" required>
                </div>
                <div class="col l3 m6 s12">
                  <label for="icon_prefix">Mot de passe *</label>
                  <input id="pass" name="pass" type="password" class="validate" value="" required>
                </div>
                <div class="col l3 m6 s12">
                  <label for="icon_prefix">Confirmer le mot de passe *</label>
                  <input id="pass2" name="pass2" type="password" class="validate" value="" required>
                </div>
                <div class="input-field col l3 m6 s12">
                  <select id="droits" name="droits">
                    <option value="" disabled selected>Droits *</option>
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
              * : Informations obligatoires
              <div class="input-field col s12 right-align">
                <a href="#">
                  <button id="AnnulerToggleNewUser" class="waves-effect waves-light btn grey" type="button" name="submit_offre" style="margin: 8px">Annuler</button>
                </a>
                <button id="input_user_maj" class="waves-effect waves-light btn green accent-4" type="button" name="submit_offre" style="margin: 8px">Créer</button>
              </div>
            </form>
          </div>
        </div>
      </div>

<script type="text/javascript">
$("#input_user_maj").click(function() {
  swal({
  title: "Un nouvel utilisateur va etre créer",
  text: "cliquer sur ok pour continuer",
  type: "info",
  showCancelButton: true,
  closeOnConfirm: false,
  cancelButtonText: "Annuler",
  showLoaderOnConfirm: true,
  },
  function(){
    civilite = $("#civilite").val();
    nom = $("#nom").val();
    prenom = $("#prenom").val();
    telephone = $("#telephone").val();
    telephone_portable = $("#telephone_portable").val();
    mail = $("#mail").val();
    numero_rue = $("#numero_rue").val();
    numero_rue_livraison = $("#numero_rue_livraison").val();
    type_voie = $("#type_voie").val();
    type_voie_livraison = $("#type_voie_livraison").val();
    adresse = $("#adresse").val();
    adresse_livraison = $("#adresse_livraison").val();
    complement_adresse = $("#complement_adresse").val();
    complement_adresse_livraison = $("#complement_adresse_livraison").val();
    code_postal = $("#code_postal").val();
    code_postal_livraison = $("#code_postal_livraison").val();
    ville = $("#ville").val();
    ville_livraison = $("#ville_livraison").val();
    pays = $("#pays").val();
    pays_livraison = $("#pays_livraison").val();
    entite = $("#entite").val(); // changer entite par groupe?
    type_contract = $("#type_contract").val();
    matricule = $("#matricule").val();
    identifiant = $("#identifiant").val();
    anciennete = $("#anciennete").val();
    droits = $("#droits").val();
    pass = $("#pass").val();
    pass2 = $("#pass2").val();
    if ((pass != "") && (pass2 != "")){
      if(pass == pass2){
        if ((civilite != "") && (nom != "") && (prenom != "") && (entite != "") && (type_contract != "") && (matricule != "") && (anciennete != "") && (droits != "")  && (pass != "")) {
          setTimeout(function(){
            swal("Requête prête");
            $("#submit_form").submit();
          }, 2000);
        }
        else {
          setTimeout(function(){
            swal("Des informations sont manquantes");
          }, 4000);
        }
      }
      else {
        setTimeout(function(){
          swal("Le mot de passe et la confirmation ne sont pas identiques !");
        }, 4000);
      }
    }
    else {
      setTimeout(function(){
        swal("Des informations sont manquantes");
      }, 4000);
    }
  });
});
$("#numero_rue,#type_voie,#adresse,#complement_adresse,#code_postal,#ville,#pays").keyup(function() {
  if( $('#adresseIdentique').is(':checked') ){
    $('#adresseIdentique').prop('checked', false);
    $("#inputAdresse").slideDown("slow");
  }
});
$("#adresseIdentique").click(function() {
    if( $('#adresseIdentique').is(':checked') ){
      $("#inputAdresse").slideUp("slow");
      $("#numero_rue_livraison").val($("#numero_rue").val());
      $("#type_voie_livraison").val($("#type_voie").val());
      $("#adresse_livraison").val($("#adresse").val());
      $("#complement_adresse_livraison").val($("#complement_adresse").val());
      $("#code_postal_livraison").val($("#code_postal").val());
      $("#ville_livraison").val($("#ville").val());
      $("#pays_livraison").val($("#pays").val());
    }
    else {
      $("#inputAdresse").slideDown("slow");
    }
});
</script>
