<?php
include_once 'config.php';
$reponse = $base->prepare("SELECT * FROM users");
if ($reponse->execute()) {
  while( $donnees = $reponse->fetch()){
    echo $donnees['nom']."<br>";
    echo $donnees['pass']."<br>";
    $pass = $donnees['pass'];
    $id = $donnees['id'];

    $sql = "UPDATE users SET pass='$pass' WHERE id=$id";
    var_dump($sql);
      if ($base->query($sql) === TRUE) {
          echo "Record updated successfully";
      } else {
          echo "Error updating record: " . $base->error;
      }


  }
}

 ?>
