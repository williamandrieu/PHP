<?php include('header.php');?>
<body>
 <div id="all">
  <div id="content">
   <div class="box">
    <div class="textbox">
     <p class="boxName">Créer lettre :</p>
     <form action="#" method="post">
      <p>Message : </p>
      <textarea id="test" autofocus="true" name="textArea"></textarea>
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
          $prioritaire = 0;
          $confidentiel = 0;
          if(isset($_POST['prioritaire'])){
            $prioritaire = 1;
          }
          if(isset($_POST['confidentiel'])){
            $confidentiel = 1;
          }
          $colName = ["id_expediteur","id_receveur","message","date","confidentiel","prioritaire"];
          $colValue = [$_POST['expe'],$_POST['dest'],$_POST['textArea'],"CURRENT_DATE",$confidentiel,$prioritaire];
          $bdd->createInTable("message",$colName,$colValue);
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