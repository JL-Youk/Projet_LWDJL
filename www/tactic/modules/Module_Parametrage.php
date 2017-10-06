<div id="Module_Parametrage" style="display:none">
  <div class="nav-content sous_menu_admin">
    <ul class="tabs">
      <li class="tab"><a class="active" href="#parametrage_charte_graphique">Charte graphique</a></li>
      <li class="tab"><a href="#parametrage_page_accueil">Boutique</a></li>
      <li class="tab"><a class="active" href="#parametrage_general">Général</a></li>
    </ul>
  </div>
  <div class="row">
    <!-- debut general -->
    <div class="row" id="parametrage_general">
      <h5>Mails</h5>
      <form class="" action="action/updateMails.php" method="post">
        <div class="col l6 m12 s12">
          <div class="input-field col m12 s12">
            <input name="param_mail_info" type="text" class="validate" value="<?php echo $parametre_mail_info ?>">
            <label for="icon_prefix">Adresse d'expédition des informations pour les utilisateurs</label>
          </div>
        </div>
        <div class="col l6 m12 s12">
          <div class="input-field col m12 s12">
            <input name="param_mail_newsletters" type="text" class="validate" value="<?php echo $parametre_mail_newsletter ?>">
            <label for="icon_prefix">Adresse d'expédition de la news letter</label>
          </div>
        </div>
        <div class="col l6 m12 s12">
          <div class="input-field col m12 s12">
            <input name="param_mail_contact" type="text" class="validate" value="<?php echo $parametre_mail_contact ?>">
            <label for="icon_prefix">Adresse de contact</label>
          </div>
        </div>
        <div class="fixed-action-btn" id="ButtonEditMails">
          <button class="btn waves-effect waves-light"type="submit" name="action">Editer
            <i class="material-icons right">send</i>
          </button>
        </div>
      </form>

    </div>
    <!-- fin general -->

    <!-- Modules -->
    <div class="row" id="parametrage_charte_graphique">
      <form class="" enctype="multipart/form-data" action="action/uploadImgParametrage.php" method="post">
        <div class="row">
          <h4>Couleur du thème</h4>
          <h5>Theme actuel : <span class="<?php echo $parametre_theme ?>-text text-lighten-2" id="themeactu"><?php echo $parametre_theme ?></span></h5>
          <div class="col l4 m6 s12 grey lighten-4">
            <div class="container">
              <div class="row white z-depth-1">
                <div id="headerDemo" class="col s12 <?php echo $parametre_theme ?> lighten-1" style="height: 15px;">
                </div>
                <div id="headerDemo2" class="col s12 <?php echo $parametre_theme ?> lighten-2">
                  <h4 class="white-text">titre1</h4>
                </div>
                <div class="col s12">
                  <h5 id="titre2Demo" class="<?php echo $parametre_theme ?>-text text-lighten-2">titre2</h5>
                </div>
                <div class="col s12 grey-text text-darken-4">
                  Exemple de texte
                </br>
              </br>
              <a id="btnDemo" class="btn-floating btn-large waves-effect waves-light right <?php echo $parametre_theme ?>">
                <i class="material-icons">add</i>
              </a>
            </div>
            <div class="col s12 grey darken-3">
              <h5 class="grey-text text-lighten-3">footer1</h5>
            </div>
            <div id="footerLigneDemo" class="col s12 <?php echo $parametre_theme ?> lighten-1" style="height: 2px;">
            </div>
            <div class="col s12 grey darken-4">
              <h5 class="grey-text text-lighten-4">footer2</h5>
            </div>
          </div>
        </div>
      </div>
      <div class="col l8 m6 s12">
        <div class="col l3 m6 s6">
          <div class="selectColorAdmin" style="border: 2px solid #000;">
            <div onclick="selectColor('black')" class="selectcolordiv">
              <label class="black-text" for="test8">thème <br> noir</label>
            </div>
          </div>
        </div>
        <div class="col l3 m6 s6">
          <div class="selectColorAdmin" style="border: 2px solid #F44336;">
            <div onclick="selectColor('red')" class="selectcolordiv">
              <label class="red-text" for="test3">thème <br> rouge</label>
            </div>
          </div>
        </div>
        <div class="col l3 m6 s6">
          <div class="selectColorAdmin" style="border: 2px solid #ff9800;">
            <div onclick="selectColor('orange')" class="selectcolordiv">
              <label class="orange-text" for="test6">thème <br> orange</label>
            </div>
          </div>
        </div>
        <div class="col l3 m6 s6">
          <div class="selectColorAdmin" style="border: 2px solid #ffc107;">
            <div onclick="selectColor('amber')" class="selectcolordiv">
              <label class="amber-text" for="test8">thème <br> or</label>
            </div>
          </div>
        </div>
        <div class="col l3 m6 s6">
          <div class="selectColorAdmin" style="border: 2px solid #4CAF50;">
            <div onclick="selectColor('green')" class="selectcolordiv">
              <label class="green-text" for="test7">thème <br> vert</label>
            </div>
          </div>
        </div>
        <div class="col l3 m6 s6">
          <div class="selectColorAdmin" style="border: 2px solid #009688;">
            <div onclick="selectColor('teal')" class="selectcolordiv">
              <label class="teal-text" for="test5">thème <br> turquoise</label>
            </div>
          </div>
        </div>
        <div class="col l3 m6 s6">
          <div class="selectColorAdmin" style="border: 2px solid #e91e63;">
            <div onclick="selectColor('pink')" class="selectcolordiv">
              <label class="pink-text" for="test2">thème <br> rose</label>
            </div>
          </div>
        </div>
        <div class="col l3 m6 s6">
          <div class="selectColorAdmin" style="border: 2px solid #9c27b0 ">
            <div onclick="selectColor('purple')" class="selectcolordiv">
              <label class="purple-text" for="test1">thème <br> violet</label>
            </div>
          </div>
        </div>
        <div class="col l3 m6 s6">
          <div class="selectColorAdmin" style="border: 2px solid #795548;">
            <div onclick="selectColor('brown')" class="selectcolordiv">
              <label class="brown-text" for="test8">thème <br> marron</label>
            </div>
          </div>
        </div>
        <div class="col l3 m6 s6">
          <div class="selectColorAdmin" style="border: 2px solid #2196F3;">
            <div onclick="selectColor('blue')" class="selectcolordiv">
              <label class="blue-text" for="test4">thème <br> bleue</label>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <h4>Images site web</h4>
      <!-- flavicon -->
      <div class="col l4 m6 s12">
        <div class="Param_Module sous_module z-depth-1">
          <div class="param_info">Favicon actuel :</div>
          <div class="ZoneEdit">
            <img class="param_logo responsive-img" src="./images/flavicon/<?php echo $parametre_favicon ?>" alt="" />
            <div class="file-field input-field">
              <div class="btn">
                <span>Flavicon</span>
                <input name="flavicon" type="file">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Fin flavicon -->
      <!-- LOGO -->
      <div class="col l4 m6 s12">
        <div class="Param_Module sous_module z-depth-1">
          <div class="param_info">Logo actuel :</div>
          <div class="ZoneEdit">
            <img class="param_logo responsive-img" src="./images/logo/<?php echo $parametre_logo ?>" alt="" />
            <div class="file-field input-field">
              <div class="btn">
                <span>Logo</span>
                <input name="logo" type="file">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- Fin logo -->
      <!-- Fond d'ecran -->
      <div class="col l4 m6 s12">
        <div class="Param_Module sous_module z-depth-1">
          <div class="param_info">fond d'écran actuel :</div>
          <div class="ZoneEdit">
            <img class="param_logo responsive-img" src="./images/background/<?php echo $parametre_background ?>" alt="" />
            <div class="file-field input-field">
              <div class="btn">
                <span>Fond d'ecran</span>
                <input name="background" type="file">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="fixed-action-btn">
      <button class="btn waves-effect waves-light" type="submit" name="action">Mettre a jour
        <i class="material-icons right">send</i>
      </button>
    </div>
  </form>
  <!-- Fin fond d'ecran -->
</div>

<div class="row" id="parametrage_page_accueil">
  <form class="" enctype="multipart/form-data" action="action/UpdateInformations.php" method="post">
    <div class="row">
      <h4>Texte site web</h4>
      <div class="col l6 m12 s12">
        <div class="input-field col m12 s12">
          <input name="titre_param_select" id="titre_param_select" type="text" class="validate" value="<?php echo $parametre_titre ?>">
          <label for="icon_prefix">Titre</label>
        </div>
      </div>
      <div class="col l6 m12 s12">
        <div class="input-field col m12 s12">
          <input name="accueil_param_select" id="accueil_param_select" type="text" class="validate" value="<?php echo $parametre_T1 ?>">
          <label for="icon_prefix">Message d'accueil</label>
        </div>
      </div>
      <div class="col l6 m12 s12">
        <div class="input-field col m12 s12">
          <input name="accueil2_param_select" id="accueil2_param_select" type="text" class="validate" value="<?php echo $parametre_T2 ?>">
          <label for="icon_prefix">Second message d'accueil</label>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col l6 m12 s12">
        <div class="switch" style="padding-left: 5px;padding-bottom: 5px;">
          <label>
            Desactiver la banniere
            <input name="activBanner" <?php if($parametre_activBanner == '1') {echo"checked";}else{} ?>  type="checkbox">
            <span class="lever"></span>
            Afficher la banniere
          </label>
        </div>
        <div class="Param_Module sous_module z-depth-1">
          <div class="param_info">Banniere d'accueil</div>
          <div class="ZoneEdit">
            <img class="param_logo responsive-img" src="./images/banner/<?php echo $parametre_banner ?>" alt="" />
            <div class="file-field input-field">
              <div class="btn">
                <span>Banniere</span>
                <input name="banner" type="file">
              </div>
              <div class="file-path-wrapper">
                <input class="file-path validate" type="text">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>

    <div class="row">
      <h4>Footer site web</h4>
      <div class="col s12 m12 l6">
        <div class="input-field col m12 s12">
          <textarea style="min-height:120px" name="Fcol1" id="Fcol1" type="text" class="validate"><?php echo $parametre_footercol1_contenu ?></textarea>
          <label for="icon_prefix">Footer colonne 1</label>
        </div>
      </div>
      <div class="col s12 m12 l6">
        <div class="input-field col m12 s12">
          <textarea style="min-height:120px" name="Fcol2" id="Fcol2" type="text" class="validate"><?php echo $parametre_footercol2_contenu ?></textarea>
          <label for="icon_prefix">Footer colonne 2</label>
        </div>
      </div>
    </div>
    <div class="fixed-action-btn" id="ButtonEditTextes">
      <button class="btn waves-effect waves-light" type="submit" name="action" >Mettre à jour
        <i class="material-icons right">send</i>
      </button>
    </div>
  </form>
</div>
</div>
</div>
<script type="text/javascript">
CKEDITOR.replace( 'Fcol1' );
CKEDITOR.replace( 'Fcol2' );

function selectColor(color) {
  swal({
    title: "Êtes-vous sûr ?",
    text: "Le nouveau thème sera '" + color + "'",
    type: "warning",
    showCancelButton: true,
    confirmButtonColor: "#DD6B55",
    confirmButtonText: "Oui",
    cancelButtonText: "Annuler",
    closeOnConfirm: false
  },
  function(){
    $.post("action/changetheme.php",
    {
      color : color
    },
    function(data) {
      swal("Succès!", "Thème modifié avec succès.", "success");
      // Modifier le texte et la couleur de 'theme actuel'
      $('#themeactu').text(color);
      classColor = color+'-text text-lighten-2';
      $('#themeactu').removeClass().addClass(classColor);
      // Modifié la couleur de la demo
      $('#titre2Demo').removeClass().addClass(color+'-text text-lighten-2');
      $('#btnDemo').removeClass().addClass('btn-floating btn-large waves-effect waves-light right ' + color);
      $('#footerLigneDemo').removeClass().addClass('col s12 '+ color + ' lighten-1');
      $('#headerDemo').removeClass().addClass('col s12 '+ color + ' lighten-1');
      $('#headerDemo2').removeClass().addClass('col s12 '+ color + ' lighten-2');
    }
  );
});
}
</script>
