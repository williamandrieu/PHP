<?php include('header.php');?>
<body>
 <div id="all">
  <div id="content">
   <div class="box">
    <div class="textbox">
     <p class="boxName">Créer lettre :</p>
     <form action="#" method="post">
      <?php 
      $bdd = new BDD("semaine_PHP");
      if($bdd->getBdd() != null){
        $userName = $bdd->concatInfo($bdd->getInfo("utilisateur",["prenom","nom"])," ");
        $idUser = $bdd->concatInfo($bdd->getInfo("utilisateur",["id"])," ");
        $user = $bdd->merge($userName,$idUser);
        echo "<p>".Form::select("dest","Destinataire",$user)."</p>";
        echo "<p>".Form::select("expe","Expéditeur",$user)."</p>";
      }else{
        echo "<p>".Form::select("dest","Destinataire",[])."</p>";
        echo "<p>".Form::select("expe","Expéditeur",[])."</p>";
      }
      echo "<p>".Form::input("prioritaire","Timbre prioritaire","checkbox")."</p>";
      echo "<p>".Form::input("confidentiel","Confidentiel","checkbox")."</p>";
      echo "<p>".Form::input("createLetter","","submit")."</p>";
      ?>
    </form>
    <?php 
      if(isset($_POST['createLetter'])){
        if($_POST['dest'] == $_POST['expe']){
          echo '<script>alert("Le destinataire et l\'éxpediteur sont identique")</script>';
        }else{
          echo "good";
        }
      }
      ?>
  </div>
</div>
</div>
</div>
</div>
</body>
<?php require('footer.php'); ?>