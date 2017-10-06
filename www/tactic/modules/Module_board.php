<?php
$stat_compte_valide = 0;
$stat_compte_attente = 0;
$stat_compte_never = 0;
$stat_compte_total = 0;
$stat_nb_offre = 0;
$stat_nb_categories = 0;
$stat_nb_users_desac = 0;
$stat_nb_groupes_desac = 0;
$stat_nb_total_groupe = 0;
$stat_nb_vues_offre = 0;
$stat_nb_vues_categories = 0;
$stat_nb_visite = 0;
$stat_nb_visite_day = 0;
$liste_user_never_login = "";
$liste_user_attente = "";
$tableaux_data_vues = "";
$tableaux_data_vues_categorie = "";
$last24h = (strtotime(date("d-m-Y H:i")) - 86400);
while( $donnees_utilisateurs_stat = $requete_donnees_utilisateurs_stat->fetch() )
{
  if ($donnees_utilisateurs_stat->compte_valide == "2") {
    $stat_compte_valide ++;
  }
  elseif ($donnees_utilisateurs_stat->compte_valide == "1") {
    $stat_compte_attente ++;
  }
  elseif ($donnees_utilisateurs_stat->compte_valide == "0") {
    $stat_compte_never ++;
  }
  else {
    # code...
  }
  if ($donnees_utilisateurs_stat->statut == "actif") {
  }
  else {
    $stat_nb_users_desac ++;
  }
  $stat_compte_total ++;
}
while ( $donnees_groupes = $requete_donnees_groupes->fetch() ) {
  if ( $donnees_groupes->statut == 'actif') {
  }
  else {
    $stat_nb_groupes_desac ++;
  }
  $stat_nb_total_groupe ++;
}


//calcule des pourcentages de statistique
$pourcentage_valide = round($stat_compte_valide * 100 / $stat_compte_total, 0);
$pourcentage_attente = round($stat_compte_attente * 100 / $stat_compte_total, 0);
$pourcentage_never = round($stat_compte_never * 100 / $stat_compte_total, 0);

while( $donnees_offre_liste_stat = $requete_donnees_offre_liste_stat->fetch() )
{
  $stat_nb_offre ++;
  $stat_nb_vues_offre = $stat_nb_vues_offre + $donnees_offre_liste_stat->vues;
  $tableaux_data_vues = $tableaux_data_vues." {'nom': '".$donnees_offre_liste_stat->nom."', 'vues': ".$donnees_offre_liste_stat->vues.", 'vuespourcentage': 660},";
}

while( $donnees_categories_liste_stat = $requete_donnees_categories_liste_stat->fetch() )
{
  $stat_nb_categories ++;
  $stat_nb_vues_categories = $stat_nb_vues_categories + $donnees_categories_liste_stat->vues;
  $tableaux_data_vues_categorie = $tableaux_data_vues_categorie." {'nom': '".$donnees_categories_liste_stat->nom."', 'vues': ".$donnees_categories_liste_stat->vues.", 'vuespourcentage': 660},";
}

while( $donnees_Stat = $requete_donnees_Stat->fetch() )
{
  $stat_nb_visite ++;
  if(($donnees_Stat->date_vue) > ($last24h)){
    $stat_nb_visite_day ++;
  }
}
 ?>

<script src="lib/amcharts.js"></script>
<script src="lib/pie.js"></script>
<script src="lib/export.min.js"></script>
<link rel="stylesheet" href="lib/export.css" type="text/css" media="all" />
<script src="lib/themes/light.js"></script>
<div id="Module_board">
  <!--<div class="nav-content sous_menu_admin ">
    <ul class="tabs">
      <li class="tab"><a href="#gestion_board">Board</a></li>
    </ul>
  </div>-->
  <!-- Modules -->
  <div class="row">
    <div class="col l6 m12 s12">
      <h5>Statistiques</h5>
      <!-- <div id="chartdiv"></div> -->
      <div id="graph"></div>
    </div>
    <div class="col l6 m12 s12">
      <h5>Information génerale</h5>
      <p>Total d'utilisateurs : <span class="stat_chiffre"><?php echo $stat_compte_total ?></span></p>
      <p>Total de visites : <span class="stat_chiffre"><?php echo $stat_nb_visite ?></span></p>
      <p>Total de visites les dernières 24 heures : <span class="stat_chiffre"><?php echo $stat_nb_visite_day ?></span></p>
      <p>Total d'offres : <span class="stat_chiffre"><?php echo $stat_nb_offre ?></span></p>
      <p>Total de categories : <span class="stat_chiffre"><?php echo $stat_nb_categories ?></span></p>
      <p>Total d'utilisateurs désactivés : <span class="stat_chiffre"><?php echo $stat_nb_users_desac ?></span></p>
      <p>Total de groupes : <span class="stat_chiffre"><?php echo $stat_nb_total_groupe ?></span></p>
      <p>Total de groupes désactivés : <span class="stat_chiffre"><?php echo $stat_nb_groupes_desac ?></span></p>
    <?php
    if ($stat_compte_attente != 0) {
      ?>
      <a href="#data_wait_validation">
        <h5 class="red-text text-darken-1"><i class="material-icons">info_outline</i>Utilisateur en attende de validation: <span class="stat_chiffre"><?php echo $stat_compte_attente ?></span></h5>
      </a>
      <?php
    }
    else {
      echo "<h5 class='green-text text-accent-4'><i class='material-icons'>done</i>Aucun utilisateur en attente de validation</h5>";
    }
     ?>
     <?php
     if ($stat_compte_never != 0) {
       ?>
       <a href="#data_never_connect">
         <h5 class="blue-text text-darken-1"><i class="material-icons">info_outline</i>Utilisateur jamais connecté: <span class="stat_chiffre"><?php echo $stat_compte_never ?></span></h5>
       </a>
      <?php
     }
     else {
       echo "<h5 class='green-text text-accent-4'><i class='material-icons'>done</i>Aucun utilisateur jamais connecté</h5>";
     }
      ?>
    </div>
  </div>
  <div class="row">
    <div class="col l12 m12 s12">
      <h5>Détails des vues sur les offres (total : <?php echo "<span class='stat_chiffre'>".$stat_nb_vues_offre."</span>"; ?>)</h5>
      <div id="graphique_offre"></div>
    </div>
  </div>
  <div class="row">
    <div class="col l12 m12 s12">
      <h5>Détails des vues sur les categories (total : <?php echo "<span class='stat_chiffre'>".$stat_nb_vues_categories."</span>"; ?>)</h5>
      <div id="graphique_categories"></div>
    </div>
  </div>
</div>
<script type="text/javascript">
Morris.Donut({
  element: 'graph',
  data: [
    {value: <?php echo $pourcentage_valide; ?>, label: 'Utilisateur valide'},
    {value: <?php echo $pourcentage_attente; ?>, label: 'Utilisateur en attente'},
    {value: <?php echo $pourcentage_never; ?>, label: 'Utilisateur jamais connecté'}
  ],
  formatter: function (x) { return x + "%"}
}).on('click', function(i, row){
  console.log(i, row);
});
var day_data = [
  <?php echo $tableaux_data_vues ?>
];
Morris.Bar({
  element: 'graphique_offre',
  data: day_data,
  xkey: 'nom',
  ykeys: ['vues'],
  labels: ['vues'],
  xLabelAngle: 60
});
var day_data = [
  <?php echo $tableaux_data_vues_categorie ?>
];
Morris.Bar({
  element: 'graphique_categories',
  data: day_data,
  xkey: 'nom',
  ykeys: ['vues'],
  labels: ['vues'],
  xLabelAngle: 60
});
</script>
