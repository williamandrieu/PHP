<?php include('header.php');?>
<body>
 <div id="all">
  <div id="content">
   <div class="box">
    <div class="textbox">
     <p class="boxName">Créer lettre :</p>
     <form action="#" method="post">
      <p>Message : </p>
      <textarea id="area" autofocus="true" name="textArea"></textarea>
      <?php 
      $bdd = new BDD("semaine_PHP");
      if($bdd->getBdd() != null){
        $user = $bdd->getInfo("utilisateur",["prenom","nom","id"]);
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
        if(isset($_POST['dest']) && isset($_POST['expe'])){
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
            $date = date("y.m.d");
            $colName = ["id_expediteur","id_receveur","message","date","confidentiel","prioritaire"];
            $colValue = [$_POST['expe'],$_POST['dest'],$_POST['textArea'],$date,$confidentiel,$prioritaire];
            $bdd->createInTable("message",$colName,$colValue);
            $nameDest = $bdd->getInfoBy("utilisateur",["prenom","nom"],"id",$_POST['dest']);
            echo '<script>alert("Le message a bien été envoyer à '.$nameDest[0][0]." ".$nameDest[0][1].'")</script>';
          }
        }else{
        echo '<script>alert("Aucun contact dans la base de donnée")</script>';
        }
      }
      ?>
  </div>
</div>
      <?php
        if(isset($_POST['createLetter'])){
          if(isset($_POST['dest']) && isset($_POST['expe'])){
            if($_POST['dest'] != $_POST['expe']){
              echo '<div class="box"><div class="textbox"><p class="boxName">Preview : </p>';
              echo "<p> id de l'expediteur : ".$_POST['expe']."</p>";
              echo "<p> id du destinataire : ".$_POST['dest']."</p>";
              echo '<textarea readonly="true" id="smallArea" autofocus="true" name="textArea">'.$_POST['textArea'].'</textarea>';
              if($prioritaire == 1){
                echo "<p> La lettre est prioritaire</p>";
              }
              if($confidentiel == 1)
                echo "<p> La lettre est confidentiel</p>";
              }
            }
          }
        ?>
</div>
</div>
</div>
</body>
<?php require('footer.php'); ?>