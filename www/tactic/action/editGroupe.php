<?php
include_once '../include/config.php';

if (isset($_SESSION['droits'])){
  if(($_SESSION['droits'] == "super_admins") || ($_SESSION['droits'] == "admin"))
  {
    $NiveauParentGroupe = $_POST["NiveauParentGroupe"];
    $IDGroupe = $_POST["IDGroupe"];
    $NiveauGroupe = $_POST["NiveauGroupe"];
    $varDeplacement = "";

    if (isset($_POST['groupeIDParentGroupe'])){
      $groupeIDParentGroupe = $_POST["groupeIDParentGroupe"];
      if (($groupeIDParentGroupe == "") || ($groupeIDParentGroupe == null)) {
      }
      else {
        $IDParentGroupe = $groupeIDParentGroupe;
        $varDeplacement = "id_parent = '".$IDParentGroupe."',";
      }
    }
    if (isset($_POST['groupeNouveauIDParentGroupe'])){
      $groupeNouveauIDParentGroupe = $_POST["groupeNouveauIDParentGroupe"];
      if (($groupeNouveauIDParentGroupe == "") || ($groupeNouveauIDParentGroupe == null)) {
      }
      else {
        $NiveauGroupe = $groupeNouveauIDParentGroupe + 1;
      }
    }


    $Nom = $_POST["Nom"];
    $groupeDate_activation = htmlspecialchars($_POST["groupeDate_activation"], ENT_QUOTES);
    $groupeDate_desactivation = htmlspecialchars($_POST["groupeDate_desactivation"], ENT_QUOTES);
    $groupeDescription = htmlspecialchars($_POST["groupeDescription"], ENT_QUOTES);
    $contact_civilite = htmlspecialchars($_POST["contact_civilite"], ENT_QUOTES);
    $contact_nom = htmlspecialchars($_POST["contact_nom"], ENT_QUOTES);
    $contact_prenom = htmlspecialchars($_POST["contact_prenom"], ENT_QUOTES);
    $contact_telephone1 = htmlspecialchars($_POST["contact_telephone1"], ENT_QUOTES);
    $contact_telephone2 = htmlspecialchars($_POST["contact_telephone2"], ENT_QUOTES);
    $contact_mail = htmlspecialchars($_POST["contact_mail"], ENT_QUOTES);
    $adresse_numero_rue = htmlspecialchars($_POST["adresse_numero_rue"], ENT_QUOTES);
    $adresse_type_voie = htmlspecialchars($_POST["adresse_type_voie"], ENT_QUOTES);
    $adresse_nomvoie = htmlspecialchars($_POST["adresse_nomvoie"], ENT_QUOTES);
    $adresse_complement_adresse = htmlspecialchars($_POST["adresse_complement_adresse"], ENT_QUOTES);
    $adresse_code_postal = htmlspecialchars($_POST["adresse_code_postal"], ENT_QUOTES);
    $adresse_ville = htmlspecialchars($_POST["adresse_ville"], ENT_QUOTES);
    $adresse_pays = htmlspecialchars($_POST["adresse_pays"], ENT_QUOTES);
    $statutGroupe = htmlspecialchars($_POST["statutGroupe"], ENT_QUOTES);
    if ($statutGroupe == 'true') {
      $statutGroupe = 'actif';
    }
    else {
      $statutGroupe = 'inactif';
    }
    $table = "tactic_groupes";
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE `$table` SET
    nom = '$Nom',
    $varDeplacement
    niveau = '$NiveauGroupe',
    date_activation = '$groupeDate_activation',
    date_desactivation = '$groupeDate_desactivation',
    description = '$groupeDescription',
    contact_civilite = '$contact_civilite',
    contact_nom = '$contact_nom',
    contact_prenom = '$contact_prenom',
    contact_telephone1 = '$contact_telephone1',
    contact_telephone2 = '$contact_telephone2',
    contact_mail = '$contact_mail',
    adresse_numero = '$adresse_numero_rue',
    adresse_typevoie = '$adresse_type_voie',
    adresse_nomvoie = '$adresse_nomvoie',
    adresse_complement = '$adresse_complement_adresse',
    adresse_codepostal = '$adresse_code_postal',
    adresse_ville = '$adresse_ville',
    adresse_pays = '$adresse_pays',
    statut = '$statutGroupe'
    WHERE id = '$IDGroupe'";
    $base->exec($sql);
    echo "Groupe mise à jour correctement";
  }
}
 ?>
