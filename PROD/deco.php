<?php
include_once 'header.php';
if (isset($_SESSION['nom'])){
  session_destroy();
}
?>
<div class="row">
    <h2 class="center">Deconnection effectué avec succès</h2>
</div>
<?php
include 'footer.php';

 ?>
