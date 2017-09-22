<?php
$BDD = 'localhost';
$USER = 'root';
$MDP = 'root';
$TABLE_Utilisateurs = 'projet_pentest';


// DEBUG
ini_set('display_errors','on');
error_reporting(E_ALL);
// DEBUG FIN
session_start();
date_default_timezone_set('Europe/Paris');
$urlSite = $_SERVER['HTTP_HOST'];
// Connexion à la BDD en PDO
$db = @mysql_connect($BDD, $USER, $MDP);
mysql_select_db($TABLE_Utilisateurs,$db);
?>
