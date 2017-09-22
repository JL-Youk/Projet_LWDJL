<?php
include_once 'config.php';
$clef_de_salage = "@David";
$reponse = $base->prepare("SELECT * FROM users");
if ($reponse->execute()) {
  while( $donnees = $reponse->fetch()){
    $pass = $donnees['pass'];
    $id = $donnees['id'];
    $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $sql = "UPDATE `users` SET `pass`=`$pass` WHERE id=$id";
    var_dump($sql);
    if ($base->exec($sql) === TRUE) {
        echo "Record updated successfully";
    } else {
        echo "Error updating record: " . $base->error;
    }
  }
}
?>
