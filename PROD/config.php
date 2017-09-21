<?php
// DEBUG
ini_set('display_errors','on');
error_reporting(E_ALL);
// DEBUG FIN
session_start();
date_default_timezone_set('Europe/Paris');
$urlSite = $_SERVER['HTTP_HOST'];
try
{
  $base = new PDO('mysql:host=localhost;dbname=projet_pentest;charset=utf8', 'root', 'root');
}
catch (Exception $e)
{
  die('Erreur : ' . $e->getMessage());
}
?>
