<?php
if (isset($_POST['pass'])){
  $pass = $_POST['pass'];
  $clef_de_salage = "@David";
  $pass = md5($pass.$clef_de_salage);

}
// $reponse = $base->prepare("SELECT * FROM users");
// if ($reponse->execute()) {
//   while( $donnees = $reponse->fetch()){
//     $pass = $donnees['pass'];
//     $id = $donnees['id'];
//     $base->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
//     $sql = "UPDATE `users` SET `pass`=`$pass` WHERE id=$id";
//     var_dump($sql);
//     if ($base->exec($sql) === TRUE) {
//         echo "Record updated successfully";
//     } else {
//         echo "Error updating record: " . $base->error;
//     }
//   }
// }
?>
<form class="" action="hasheur.php" method="post">
  <input type="text" name="pass" value="">
  <input type="submit" name="" value="Hash!">
  <span>
    <?php
    if (isset($_POST['pass'])){
      echo $pass;
    }
     ?>
  </span>

</form>
