<?php
   if (is_file('../../include/config.php'))
   {
       require_once('../../include/config.php');
   }
   elseif (is_file('../include/config.php')) {
     require_once('../include/config.php');
   }

  function limiter_chaine($nom)
   {
     $max = 18;
      if (strlen($nom) >= $max) {
      $nom = substr($nom, 0, $max);
      $nom = $nom."...";
      }
     return $nom;
   }
   ?>
<div class="col l12 m12 s12">
   <div class="tree well" id="treewell">
      <!--<h5>Groupes</h5>-->
      <!-- Bonton d'admin de création de groupe1 -->
      <!-- 1er groupe -->
      <?php
         $requete_donnees_groupe_1 = $base->query("SELECT id, nom, statut FROM tactic_groupes WHERE niveau LIKE '1' ");
         $requete_donnees_groupe_1->setFetchMode(PDO::FETCH_OBJ);

         $nbDropdown = 0; // variable pour incrémenter les id dropdown
         while( $groupe_1_liste = $requete_donnees_groupe_1->fetch())
         {
            $nbDropdown++;
           ?>
      <ul>
         <li class="parent_li" style="margin: 15px 10px 10px 10px;">
            <span class="icon-minus-sign tooltipped" data-position="top" data-delay="50" data-tooltip="<?php echo $groupe_1_liste->nom ?>">
            <i class="icon-folder-open">
            <?php
            if ($groupe_1_liste->statut == 'actif') {
              ?>
              <i class="material-icons grey-text text-darken-4">folder</i>
              <?php

            }
            else {
              ?>

              <i class="material-icons">block</i>
              <?php
            }

             echo limiter_chaine($groupe_1_liste->nom);
             ?>
            </i>
            </span>
        <!-- Bouton action niv 1 -->
            <!-- Dropdown Trigger -->
  <a class='dropdown-button btn' href='#' data-activates='dropdown<?php echo $nbDropdown ?>'><i class="material-icons">settings</i></a>

  <!-- Dropdown Structure -->
  <ul id='dropdown<?php echo $nbDropdown ?>' class='dropdown-content'>
    <li><a href="#!" onclick="afficherDetail(0, <?php echo $groupe_1_liste->id; ?>, 1)">Visualiser</a></li>
    <li><a href="#!" onclick="genererGroupe(0, <?php echo $groupe_1_liste->id; ?>, 1)">Ajouter</a></li>
    <li><a href="#!" onclick="editGroupe(0, <?php echo $groupe_1_liste->id; ?>, 1)">Editer</a></li>
    <li><a href="#!" onclick="supprimerGroupe(0, <?php echo $groupe_1_liste->id; ?>, 1)">Supprimer</a></li>
  </ul>

            <!-- ICONS à supprimer
            <i onclick="afficherDetail(0, <?php // echo $groupe_1_liste->id; ?>, 1)" class="iconGroupe material-icons iconColorGroupe">folder_shared</i>
            <i onclick="genererGroupe(0, <?php // echo $groupe_1_liste->id; ?>, 1)" class="iconGroupe material-icons">group_add</i>
            <i onclick="editGroupe(0, <?php // echo $groupe_1_liste->id; ?>, 1)" class="iconGroupe material-icons">edit</i>
            FIN ICONS à supprimer -->

            <!-- 2eme groupe -->
            <?php
               $requete_donnees_groupe_2 = $base->query("SELECT id, nom, statut FROM tactic_groupes WHERE niveau LIKE '2' AND id_parent LIKE '$groupe_1_liste->id'");
               $requete_donnees_groupe_2->setFetchMode(PDO::FETCH_OBJ);
               $enfant_groupe1 = false;
               while( $groupe_2_liste = $requete_donnees_groupe_2->fetch())
               {
                 $nbDropdown++;
                 $enfant_groupe1 = true;
                 ?>
            <ul>
               <li class="parent_li">
                  <img src="images/icons/lel.png" alt="">
                  <span class="icon-plus-sign tooltipped" data-position="top" data-delay="50" data-tooltip="<?php echo $groupe_2_liste->nom ?>">
                  <i class="icon-folder-open">

                  <?php
                  if ($groupe_2_liste->statut == 'actif') {
                    ?>
                    <i class="material-icons grey-text text-darken-3">folder</i>
                    <?php
                  }
                  else {
                    ?>
                    <i class="material-icons">block</i>
                    <?php
                  }
                    echo limiter_chaine($groupe_2_liste->nom);
                    ?>
                  </i>
                  </span>

                  <!-- Bouton action niv 2 -->
            <!-- Dropdown Trigger -->
  <a class='dropdown-button btn' href='#' data-activates='dropdown<?php echo $nbDropdown ?>'><i class="material-icons">settings</i></a>

  <!-- Dropdown Structure -->
  <ul id='dropdown<?php echo $nbDropdown ?>' class='dropdown-content'>
    <li><a href="#!" onclick="afficherDetail(1, <?php echo $groupe_2_liste->id; ?>, 2)">Visualiser</a></li>
    <li><a href="#!" onclick="genererGroupe(1, <?php echo $groupe_2_liste->id; ?>, 2)">Ajouter</a></li>
    <li><a href="#!" onclick="editGroupe(1, <?php echo $groupe_2_liste->id; ?>, 2)">Editer</a></li>
    <li><a href="#!" onclick="supprimerGroupe(1, <?php echo $groupe_2_liste->id; ?>, 2)">Supprimer</a></li>
  </ul>

                  <!-- ICONS à supprimer
                  <i onclick="afficherDetail(1, <?php // echo $groupe_2_liste->id; ?>, 2)" class="iconGroupe material-icons iconColorGroupe">folder_shared</i>
                  <i onclick="genererGroupe(1, <?php // echo $groupe_2_liste->id; ?>, 2)" class="iconGroupe material-icons">group_add</i>
                  <i onclick="editGroupe(1, <?php // echo $groupe_2_liste->id; ?>, 2)" class="iconGroupe material-icons">edit</i>
                  FIN ICONS à supprimer -->

                  <!-- 3eme groupe -->
                  <?php
                     $requete_donnees_groupe_3 = $base->query("SELECT id, nom, statut FROM tactic_groupes WHERE niveau LIKE '3' AND id_parent LIKE '$groupe_2_liste->id'");
                     $requete_donnees_groupe_3->setFetchMode(PDO::FETCH_OBJ);
                     $enfant_groupe2 = false;
                     while( $groupe_3_liste = $requete_donnees_groupe_3->fetch())
                     {
                       $nbDropdown++;
                       $enfant_groupe2 = true;
                       ?>
                  <ul>
                     <li class="parent_li" style="display:none">
                        <img src="images/icons/lel.png" alt="">
                        <span class="icon-plus-sign tooltipped" data-position="top" data-delay="50" data-tooltip="<?php echo $groupe_3_liste->nom ?>">
                        <i class="icon-plus-open">
                        <?php
                        if ($groupe_3_liste->statut == 'actif') {
                          ?>
                          <i class="material-icons grey-text text-darken-2">folder</i>
                          <?php
                        }
                        else {
                          ?>
                          <i class="material-icons">block</i>
                          <?php
                        }
                          echo limiter_chaine($groupe_3_liste->nom);
                         ?>
                        </i>
                        </span>

<!-- Bouton action niv 3 -->
            <!-- Dropdown Trigger -->
  <a class='dropdown-button btn' href='#' data-activates='dropdown<?php echo $nbDropdown ?>'><i class="material-icons">settings</i></a>

  <!-- Dropdown Structure -->
  <ul id='dropdown<?php echo $nbDropdown ?>' class='dropdown-content'>
    <li><a href="#!" onclick="afficherDetail(2, <?php echo $groupe_3_liste->id; ?>, 3)">Visualiser</a></li>
    <li><a href="#!" onclick="genererGroupe(2, <?php echo $groupe_3_liste->id; ?>, 3)">Ajouter</a></li>
    <li><a href="#!" onclick="editGroupe(2, <?php echo $groupe_3_liste->id; ?>, 3)">Editer</a></li>
    <li><a href="#!" onclick="supprimerGroupe(2, <?php echo $groupe_3_liste->id; ?>, 3)">Supprimer</a></li>
  </ul>

                        <!-- ICONS à supprimer
                        <i onclick="afficherDetail(2, <?php // echo $groupe_3_liste->id; ?>, 3)" class="iconGroupe material-icons iconColorGroupe">folder_shared</i>
                        <i onclick="genererGroupe(2, <?php // echo $groupe_3_liste->id; ?>, 3)" class="iconGroupe material-icons">group_add</i>
                        <i onclick="editGroupe(2, <?php // echo $groupe_3_liste->id; ?>, 3)" class="iconGroupe material-icons">edit</i>
                        FIN ICONS à supprimer -->

                        <!-- 4eme groupe -->
                        <?php
                           $requete_donnees_groupe_4 = $base->query("SELECT id, nom, statut FROM tactic_groupes WHERE niveau LIKE '4' AND  id_parent LIKE '$groupe_3_liste->id'");
                           $requete_donnees_groupe_4->setFetchMode(PDO::FETCH_OBJ);
                           $enfant_groupe3 = false;
                           while( $groupe_4_liste = $requete_donnees_groupe_4->fetch())
                           {
                             $nbDropdown++;
                             $enfant_groupe3 = true;

                             ?>
                        <ul>
                           <li class="parent_li" style="display:none">
                              <img src="images/icons/lel.png" alt="">
                              <span class="icon-plus-sign tooltipped" data-position="top" data-delay="50" data-tooltip="<?php echo $groupe_4_liste->nom ?>">
                              <i class="icon-folder-open">
                              <?php
                              if ($groupe_4_liste->statut == 'actif') {
                                ?>
                                <i class="material-icons grey-text text-darken-1">folder</i>
                                <?php
                              }
                              else {
                                ?>
                                <i class="material-icons">block</i>
                                <?php
                              }
                               echo limiter_chaine($groupe_4_liste->nom);
                              ?>
                              </i>
                              </span>

                              <!-- Bouton action niv 4 -->
            <!-- Dropdown Trigger -->
  <a class='dropdown-button btn' href='#' data-activates='dropdown<?php echo $nbDropdown ?>'><i class="material-icons">settings</i></a>

  <!-- Dropdown Structure -->
  <ul id='dropdown<?php echo $nbDropdown ?>' class='dropdown-content'>
    <li><a href="#!" onclick="afficherDetail(3, <?php echo $groupe_4_liste->id; ?>, 4)">Visualiser</a></li>
    <li><a href="#!" onclick="genererGroupe(3, <?php echo $groupe_4_liste->id; ?>, 4)">Ajouter</a></li>
    <li><a href="#!" onclick="editGroupe(3, <?php echo $groupe_4_liste->id; ?>, 4)">Editer</a></li>
    <li><a href="#!" onclick="supprimerGroupe(3, <?php echo $groupe_4_liste->id; ?>, 4)">Supprimer</a></li>
  </ul>

                              <!-- ICONS à supprimer
                              <i onclick="afficherDetail(3, <?php // echo $groupe_4_liste->id; ?>, 4)" class="iconGroupe material-icons iconColorGroupe">folder_shared</i>
                              <i onclick="genererGroupe(3, <?php // echo $groupe_4_liste->id; ?>, 4)" class="iconGroupe material-icons">group_add</i>
                              <i onclick="editGroupe(3, <?php // echo $groupe_4_liste->id; ?>, 4)" class="iconGroupe material-icons">edit</i>
                              FIN ICONS à supprimer -->

                              <!-- 5eme groupe -->
                              <?php
                                 $requete_donnees_groupe_5 = $base->query("SELECT id, nom, statut FROM tactic_groupes WHERE niveau LIKE '5' AND  id_parent LIKE '$groupe_4_liste->id'");
                                 $requete_donnees_groupe_5->setFetchMode(PDO::FETCH_OBJ);
                                 $enfant_groupe4 = false;
                                 while( $groupe_5_liste = $requete_donnees_groupe_5->fetch())
                                 {
                                   $nbDropdown++;
                                   $enfant_groupe4 = true;

                                   ?>
                              <ul>
                                 <li class="parent_li" style="display:none">
                                    <img src="images/icons/lel.png" alt="">
                                    <span class="icon-plus-sign tooltipped" data-position="top" data-delay="50" data-tooltip="<?php echo $groupe_5_liste->nom ?>">
                                    <i class="icon-folder-open">
                                    <?php
                                    if ($groupe_5_liste->statut == 'actif') {
                                      ?>
                                      <i class="material-icons grey-text">folder</i>
                                      <?php
                                    }
                                    else {
                                      ?>
                                      <i class="material-icons">block</i>
                                      <?php
                                    }
                                     echo limiter_chaine($groupe_5_liste->nom);
                                     ?>
                                    </i>
                                    </span>

                                    <!-- Bouton action niv 5 -->
                                    <!-- Dropdown Trigger -->
                                    <a class='dropdown-button btn' href='#' data-activates='dropdown<?php echo $nbDropdown ?>'><i class="material-icons">settings</i></a>

                                    <!-- Dropdown Structure -->
                                    <ul id='dropdown<?php echo $nbDropdown ?>' class='dropdown-content'>
                                      <li><a href="#!" onclick="afficherDetail(4, <?php echo $groupe_5_liste->id; ?>, 5)">Visualiser</a></li>
                                      <li><a href="#!" onclick="editGroupe(4, <?php echo $groupe_5_liste->id; ?>, 5)">Editer</a></li>
                                      <li><a href="#!" onclick="supprimerGroupe(4, <?php echo $groupe_5_liste->id; ?>, 5)">Supprimer</a></li>
                                    </ul>

                                    <!-- ICONS à supprimer
                                    <i onclick="afficherDetail(4, <?php // echo $groupe_5_liste->id; ?>, 5)" class="iconGroupe material-icons iconColorGroupe">folder_shared</i>
                                    <i onclick="editGroupe(4, <?php // echo $groupe_5_liste->id; ?>, 5)" class="iconGroupe material-icons">edit</i>
                                    <i onclick="supprimerGroupe(4, <?php // echo $groupe_5_liste->id; ?>, 5)" class="iconGroupe material-icons">clear</i>
                                    FIN ICONS à supprimer -->

                                    <!-- 2eme groupe -->
                                 </li>
                              </ul>
                              <?php
                                 }
                                 if (!$enfant_groupe4) {
                                   ?>
                              <!-- <i onclick="supprimerGroupe(3, <?php // echo $groupe_4_liste->id; ?>, 4)" class="iconGroupe material-icons">clear</i> -->
                              <!-- <ul> -->
                              <?php
                                 }
                                 else {
                                   ?>
                           </li>
                           <?php
                              }
                              ?>
                        </ul>
                        <?php
                           }
                           if (!$enfant_groupe3) {
                             ?>
                        <!-- <i onclick="supprimerGroupe(2, <?php // echo $groupe_3_liste->id; ?>, 3)" class="iconGroupe material-icons">clear</i> -->
                        <!-- <ul> -->
                        <?php
                           }
                           else {
                             ?>
                     </li>
                     <?php
                        }
                        ?>
                  </ul>
                  <?php
                     }
                     if (!$enfant_groupe2) {
                       ?>
                  <!-- <i onclick="supprimerGroupe(1, <?php // echo $groupe_2_liste->id; ?>, 2)" class="iconGroupe material-icons">clear</i> -->
                  <!-- <ul> -->
                  <?php
                     }
                     else {
                       ?>
               </li>
               <?php
                  }
                  ?>
            </ul>
            <?php
               }
               if (!$enfant_groupe1) {
                 ?>
            <!-- <i onclick="supprimerGroupe(0, <?php // echo $groupe_1_liste->id; ?>, 1)" class="iconGroupe material-icons">clear</i> -->
            <!-- <ul> -->
            <?php
               }
               else {
                 ?>
         </li>
         <?php
            }
            ?>
      </ul>
      <?php
         }
         ?>

   </div>
   <i class="material-icons">block</i> = Groupe désactivé.
</div>
<script type="text/javascript">
$('.dropdown-button').dropdown({
   inDuration: 300,
   outDuration: 225,
   constrainWidth: false, // Does not change width of dropdown to that of the activator
   hover: false, // Activate on hover
   gutter: 0, // Spacing from edge
   belowOrigin: false, // Displays dropdown below the button
   alignment: 'left', // Displays dropdown with edge aligned to the left of button
   stopPropagation: false // Stops event propagation
 }
);

$('.tree li.parent_li > span').on('click', function(e) {
      var children = $(this).parent('li.parent_li').find(' > ul > li');
      if (children.is(":visible")) {
          children.hide('fast');
          $(this).attr('title', 'Expand this branch').addClass('icon-plus-sign').removeClass('icon-minus-sign');
      } else {
          children.show('fast');
          $(this).attr('title', 'Collapse this branch').addClass('icon-minus-sign').removeClass('icon-plus-sign');
      }
      e.stopPropagation();
  });
</script>
