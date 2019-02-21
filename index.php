<?php include('header.php');
?>
<body>
  <div id="all">
  <div id="content">
   <div class="box">
    <div class="textbox">
     <p class="boxName">Bienvenue</p>
     <p>Ce site appartient au groupe : <strong>William</strong>, <strong>Mathis</strong> et <strong>Maxime</strong>.</p>
     <?php 
     $finish = [["#1408"],["#1409"],["#1410"],["#1411"],["#1412"],["#1413"],["#1414"],["#1415"],["#1416"],["#1417"],["#1421"],["#1422"],["#1423"]
     ,["#1424"],["#1425"],["#1426"]];
     echo '<p> Nous avons réalisé '.count($finish).' story sur 16.</p>'; ?>
     
     <p>Story terminer : </p>
     <div id="tabsmall">
       <table>
       <?php 
        echo TableGenerator::colName(["id"]); 
        echo TableGenerator::trInTable($finish);  
       ?>
      </table>
     </div>
     <p>Story a faire : </p>
     <div id="tabsmall">
       <table>
       <?php 
       $toDo = [[]];
        echo TableGenerator::colName(["id"]); 
        echo TableGenerator::trInTable($toDo);  
       ?>
      </table>
     </div>
     
</div>
</div>
</div>
</div>
</body>
<?php require('footer.php'); ?>