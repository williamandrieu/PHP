<?php include('header.php');?>
<body>
 <div id="all">
  <div id="content">
   <div class="box">
    <div class="textbox">
     <p class="boxName">Supprimer contact :</p>
     <br>
     <form action="del_user.php" method="post">
      <?php 
      $bdd = new BDD("semaine_PHP");
      if($bdd->getBdd() != null){
        $userName = $bdd->concatInfo($bdd->getInfo("utilisateur",["prenom","nom"])," ");
        $idUser = $bdd->concatInfo($bdd->getInfo("utilisateur",["id"])," ");
        $user = $bdd->merge($userName,$idUser);
      echo Form::select("user","Prenom",$user)."<br>";
      }else{
        echo Form::select("user","Prenom",[])."<br>";
      }
      echo Form::input("delUser","","submit");
      ?>
    </form>
    <?php  
    if(isset($_POST['delUser'])){
      if($bdd->getBdd() != null){
        $user = intval($_POST["user"]);
        $bdd->delInTable("utilisateur",$user);
        header("Refresh:0");
      }
    }
    ?>
  </div>
</div>
<div class="box">
    <div class="textbox">
     <p class="boxName">Mes contacts :</p>
     <br>
     <div id="tab">
      <table>
     <?php
     $bdd = new BDD("semaine_php");
     $search = ["id","nom","prenom","ddn","sexe","mail","code_postale"];
     $tab = $bdd->getInfo("utilisateur",$search);
     echo TableGenerator::colName($search);
     echo TableGenerator::trInTable($tab);
     ?>
     </table>
     </div>
   </div>
</div>
</div>
</div>
</body>
<?php require('footer.php'); ?>