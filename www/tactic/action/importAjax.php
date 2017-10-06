<pre>
<?php
if (is_file('../../include/config.php'))
{
    require_once('../../include/config.php');
}
elseif (is_file('../include/config.php')) {
  require_once('../include/config.php');
}
if (isset($_SESSION['droits'])){
  if(($_SESSION['droits'] == "super_admins") || ($_SESSION['droits'] == "admin"))
  {
    $tab = $_POST["tab"];
    foreach ($tab as $value) {
      var_dump($value);
      $base->exec($value);
    }
  }
}

?>
