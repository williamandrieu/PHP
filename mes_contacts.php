<?php include('header.php');?>
<body>
  <div id="all">
  <div id="content">
 <div class="box">
  <div class="textbox">
   <p class="boxName">Formulaire :</p>
   <br>
   <form action="mes_contacts.php" method="post">
    <?php
    echo '<p class="need">'.Form::input("prenom","Prenom","text").'</p>';
    echo '<p class="need">'.Form::input("nom","Nom","text").'</p>';
    echo '<p class="need">'.Form::input("ddn","Date de naissance","date").'</p>';
    echo '<p>'.Form::select("sexe","Sexe",[["Homme","Homme"],["Femme","Femme"]]).'</p>';
    echo '<p class="need">'.Form::input("mail","Adresse mail","email").'</p>';
    echo '<p class="need">'.Form::input("codePostale","Code postale","text").'</p>';
    echo "<p>".Form::input("createUser","","submit") ;
    ?>
  </form>
    <?php  

    $ageMini = 13;

    if(isset($_POST['createUser'])){
      if($_POST['prenom'] != "" && $_POST['nom'] != "" && $_POST['ddn'] != ""){
        if (PostVerif::email($_POST['mail'])) {
          if (PostVerif::codePostale($_POST['codePostale'])){
            if(PostVerif::age($_POST["ddn"]) >= $ageMini){
              $bdd = new BDD("semaine_php");
              if($bdd->getBdd() != null){
                $allEmail = $bdd->getInfo("utilisateur",["mail"]);
                if(!PostVerif::emailInBdd($_POST['mail'],$allEmail)){
                  echo "<p><strong> Le compte de ".$_POST['prenom']." ".$_POST['nom']." a été créé</strong><p>";
                  $nom = $_POST["nom"];
                  $prenom = $_POST["prenom"];
                  $ddn = $_POST["ddn"];
                  $sexe = $_POST["sexe"];
                  $mail = $_POST["mail"];
                  $codePostale = $_POST["codePostale"];

                  $colName = ["nom","prenom","ddn","sexe","mail","code_postale"];
                  $colValue = [$nom,$prenom,$ddn,$sexe,$mail,$codePostale];

                  $bdd->createInTable("utilisateur",$colName,$colValue);
                }else{
                  echo '<script> alert("Cette adresse mail est deja utilisé");</script>';
                }
              }else{
                echo '<script> alert("Vous devez avoir plus de '.$ageMini.' ans pour vous inscrire");</script>';
              }
            }
          }else{
            echo '<script> alert("Ce code postale est incorrect.");</script>';
          }
        }else{
          echo '<script> alert("Cet email est incorrect.");</script>';
        }
      }else{
        echo '<style type="text/css">.need{color: red;}</style>';
      }
      
    }
    ?>
</div>
</div>
<div class="box">
    <div class="textbox">
     <p>   Mes contacts :</p>
     <br>
     
     <?php
     $bdd = new BDD("semaine_php");
     if($bdd->getBdd() != null){
       $search = ["id","nom","prenom","ddn","sexe","mail","code_postale"];
       $tab = $bdd->getInfo("utilisateur",$search);
       echo '<div id="tab"><table>';
       echo TableGenerator::colName($search);
       echo TableGenerator::trInTable($tab);
       echo "</table></div>";
      }
     ?>
   </div>
 </div>
</div>
</div>
</body>
<?php require('footer.php'); ?>