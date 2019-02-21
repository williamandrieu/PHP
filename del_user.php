<?php include('header.php');?>
<body>
 <div id="all">
  <div id="content">
   <div class="box">
    <div class="textbox">
     <p class="boxName">Supprimer contact :</p>
     <form action="del_user.php" method="post">
      <?php 
      $bdd = new BDD("semaine_PHP");
      if($bdd->getBdd() != null){
        $user = $bdd->getInfo("utilisateur",["prenom","nom","id"]);
      echo "<p>".Form::select("user","Prenom",$user)."</p>";
      }else{
        echo "<p>".Form::select("user","Prenom",[])."</p>";
      }
      echo "<p>".Form::input("delUser","","submit")."</p>";
      ?>
    </form>
    <?php  
    if(isset($_POST['delUser'])){
      if($bdd->getBdd() != null){
        if(isset($_POST["user"])){
          $user = intval($_POST["user"]);
          $bdd->delInTable("utilisateur",$user);
          header("Refresh:0");
        }else{
          echo '<script>alert("Aucun contact dans la base de donnée")</script>';
        }
      }
    }
    ?>
  </div>
</div>
<div class="box">
    <div class="textbox">
     <p class="boxName">Mes contacts :</p>
     <?php
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