<?php
require_once('include/config.php');
require_once('include/querryFront.php');
include_once 'header.php';

if(!isset($_SESSION['mail'])) {
  include_once 'include/login.php';
}
else {
  ?>
</head>
<body>
  <?php
  include_once'menu_backOffice.php';
  if (isset($_SESSION['droits'])){
    if(($_SESSION['droits'] == "super_admins") || ($_SESSION['droits'] == "admin")){
      include_once 'action/import_groupe.php';
      ?>
      <script type="text/javascript">
        $('#menu_administration').click(function(){
          window.location="backOffice.php";
        });
      </script>
      <?php
    }
  }
  else {
    include_once 'index.php';
  }
  include_once 'footer_backoffice.php';
}
?>
