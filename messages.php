<?php include('header.php');?>
<body>
 <div id="all">
  <div id="content">
   <div class="box">
    <div class="textbox">
     <p class="boxName">Compte : </p>
     <form action="#" method="post">
      <?php 
      $bdd = new BDD("semaine_PHP");
      if($bdd->getBdd() != null){
        $user = $bdd->getInfo("utilisateur",["prenom","nom","id"]);
        echo "<p>".Form::select("user","Utilisateur",$user)."</p>";
      }else{
        echo "<p>".Form::select("user","Utilisateur",[])."</p>";
      }
      echo "<p>".Form::input("search","","submit")."</p>";
      ?>
    </form>
    <?php
    if(isset($_POST['search'])){
      if(isset($_POST['user'])){
        $id = array_reverse($bdd->getInfoBy("message",["id","id"],"id_receveur",$_POST['user']));
        echo '<form action="#" method="post">';
        echo "<p>".Form::select("idMsg","Id message",$id)."</p>";
        echo "<p>".Form::input("open","","submit")."</p>";
        echo "</form>";
      }else{
        echo '<script>alert("Aucun contact dans la base de donnée")</script>';
      }
    }
        
    ?>
  </div>
</div>
<?php
if(isset($_POST['open'])){
  echo '<div class="box"><div class="textbox"><p class="boxName">View : </p>';
  $msg =  $bdd->getInfoBy("message",["message"],"id",$_POST['idMsg'])[0][0];
  echo '<textarea readonly="true" id="area" autofocus="true" name="textArea">'.$msg.'</textarea>';
  echo  "</div></div>";
}
if(isset($_POST['search'])){
  if(isset($_POST['user'])){
    echo '<div class="box"><div class="textbox"><p class="boxName">Message le plus récent : </p>';
    echo '<div id="tab"><table>';
    $bdd = new BDD("semaine_php");
    $search = ["id","id_expediteur","id_receveur","date","confidentiel","prioritaire"];
    $tab = array_reverse($bdd->getInfoBy("message",$search,"id_receveur",$_POST['user']));
    echo TableGenerator::colName($search);
    if(count($tab) != 0){
      echo TableGenerator::trInTable([$tab[0]]);
    }
    echo '</table></div>';
    echo  "</div>";

    echo '<p class="boxName">Message plus ancient : </p>';
    echo '<div id="tab"><table>';
    echo TableGenerator::colName($search);
    $tab = array_slice($tab, 1);
    if(count($tab) > 0){
      echo TableGenerator::trInTable($tab);
    }
    echo '</table></div>';
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