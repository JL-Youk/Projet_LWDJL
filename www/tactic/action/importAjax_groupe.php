<pre>
<?php
if (is_file('../../include/config.php'))
{
    require_once('../../include/config.php');
}
elseif (is_file('../include/config.php')) {
  require_once('../include/config.php');
}
// tempt max de la page
//  3000000 = 5000 min
ini_set('max_execution_time', 3000000);
if (isset($_SESSION['droits'])){
  if(($_SESSION['droits'] == "super_admins") || ($_SESSION['droits'] == "admin"))
  {
    // ON VIDE LA TABLE
    $vidertable = "TRUNCATE tactic_groupes";
    $base->exec($vidertable);
    // ON VIDE LA TABLE FIN
    $tab = $_POST["tab"];
    foreach ($tab as $value) {
      var_dump($value);
      $base->exec($value);
    }
  }
}

?>
