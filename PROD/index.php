<?php
include_once 'header.php';
 ?>
 <div class="section white">
   <?php
   if (isset($_SESSION['nom'])){
     if ($_SESSION['nom'] == "Bader") {
       ?>
       <div class="row container">
         <h2 class="center">BRAVO</h2>
         <div class="col s12">
           <img class="responsive-img" src="images/profsalsaflag_bite.jpg" alt="prof de salsa">
         </div>
       </div>
       <?php
     }
     else {
       # code...
     }
   }
    ?>
   <div class="row container">
     <h2 class="header">La Societé</h2>
     <div class="col s6">
       <p class="grey-text text-darken-3 lighten-3">
         Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
       </p>
       <p class="grey-text text-darken-3 lighten-3">
         Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
       </p>
     </div>
     <div class="col s6">
       <img class="responsive-img" src="images/sixdave/ordinateur-quantique.jpg" alt="">
     </div>
   </div>
 </div>
 <div class="parallax-container">
   <div class="parallax"><img src="images/sixdave/3075.jpg"></div>
 </div>
<div class="section white">
  <div class="row container">
    <div class="col s12">
      <h2 class="header">Historique</h2>
      <p class="grey-text text-darken-3 lighten-3">
Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.      </p>
      <p>
        Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.
      </p>
    </div>
    <div class="col s12 center">
      <img class="responsive-img" src="images/sixdave/baies-brassage-sm.jpg" alt="">
    </div>
  </div>
</div>
<div class="parallax-container">
 <div class="parallax"><img src="images/sixdave/audit-informatique-1.jpg"></div>
</div>
<?php
include_once 'footer.php';
 ?>
