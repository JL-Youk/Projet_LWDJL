<?php
// on recupere l'ID de l'utilisateur pour le filtré dans la requete sql
$currentID = $_SESSION['id'];
// requete SQL select
// SELECT USERS
;
// SELECT USERS_stat
$requete_donnees_utilisateurs_stat = $base->query("SELECT ID, nom, prenom, entite, statut, matricule, civilite, compte_valide FROM users");
$requete_donnees_utilisateurs_stat->setFetchMode(PDO::FETCH_OBJ);

// SELECT liste offre
$requete_donnees_offre_liste = $base->query("SELECT id, nom, date_creation, categorie, date_fin, vues FROM offres ");
$requete_donnees_offre_liste->setFetchMode(PDO::FETCH_OBJ);

// SELECT liste offre_stat
$requete_donnees_offre_liste_stat = $base->query("SELECT id, nom, vues FROM offres ");
$requete_donnees_offre_liste_stat->setFetchMode(PDO::FETCH_OBJ);

// SELECT liste offre_stat
$requete_donnees_categories_liste_stat = $base->query("SELECT id, nom, vues FROM categories ");
$requete_donnees_categories_liste_stat->setFetchMode(PDO::FETCH_OBJ);

// SELECT categorieS
$requete_donnees_categories = $base->query("SELECT id, nom, image, contenu, date_create, vues FROM categories ");
$requete_donnees_categories->setFetchMode(PDO::FETCH_OBJ);

// SELECT documents pdf
$requete_donnees_documents_pdf = $base->query("SELECT * FROM tactic_documents WHERE type LIKE 'pdf'");
$requete_donnees_documents_pdf->setFetchMode(PDO::FETCH_OBJ);

// SELECT PARAMETRE
$requete_donnees_parametres = $base->query("SELECT * FROM parametres");
$requete_donnees_parametres->setFetchMode(PDO::FETCH_OBJ);

// SELECT stat
$requete_donnees_Stat = $base->query("SELECT date_vue FROM tactic_stats");
$requete_donnees_Stat->setFetchMode(PDO::FETCH_OBJ);

// SELECT groupe
$requete_donnees_groupes = $base->query("SELECT id, nom, statut FROM tactic_groupes");
$requete_donnees_groupes->setFetchMode(PDO::FETCH_OBJ);


while( $donnees_parametres = $requete_donnees_parametres->fetch() )
{
  switch ($donnees_parametres->parametre) {
    case "favicon":
        $parametre_favicon = $donnees_parametres->nom;
        break;
    case "logo":
        $parametre_logo = $donnees_parametres->nom;
        break;
    case "background":
        $parametre_background = $donnees_parametres->nom;
        break;
    case "banniere":
        $parametre_banniere = $donnees_parametres->nom;
        break;
    case "faq":
        $parametre_faq = $donnees_parametres->contenu;
        break;
    case "Titre":
        $parametre_titre = $donnees_parametres->contenu;
        break;
    case "T1":
        $parametre_T1 = $donnees_parametres->contenu;
        break;
    case "T2":
        $parametre_T2 = $donnees_parametres->contenu;
        break;
    case "col1":
        $parametre_col1_nom = $donnees_parametres->nom;
        $parametre_col1_contenu = $donnees_parametres->contenu;
        break;
    case "col2":
        $parametre_col2_nom = $donnees_parametres->nom;
        $parametre_col2_contenu = $donnees_parametres->contenu;
        break;
    case "col3":
        $parametre_col3_nom = $donnees_parametres->nom;
        $parametre_col3_contenu = $donnees_parametres->contenu;
        break;
    case "footercol1":
        $parametre_footercol1_contenu = $donnees_parametres->contenu;
        break;
    case "footercol2":
        $parametre_footercol2_contenu = $donnees_parametres->contenu;
        break;
    case "footercol3":
        $parametre_footercol3_contenu = $donnees_parametres->contenu;
        break;
    case "mail_info":
        $parametre_mail_info = $donnees_parametres->contenu;
        break;
    case "mail_newsletter":
        $parametre_mail_newsletter = $donnees_parametres->contenu;
        break;
    case "mail_contact":
        $parametre_mail_contact = $donnees_parametres->contenu;
        break;
    case "theme":
        $parametre_theme = $donnees_parametres->contenu;
        break;
    case "about":
        $parametre_about_contenu = $donnees_parametres->contenu;
        break;
    case "nom_ce":
        $parametre_nom_ce = $donnees_parametres->nom;
        break;
    case "banner":
        $parametre_banner = $donnees_parametres->nom;
        break;
    case "mail_reinitialisation":
        $parametre_objet_reinitialisationMdp = $donnees_parametres->nom;
        $parametre_reinitialisationMdp = $donnees_parametres->contenu;
        break;
    default:
      }
}
 ?>
