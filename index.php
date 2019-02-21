<?php include('header.php');
include('src/Exercices.php');
?>
<body>
  <div id="all">
  <div id="content">
   <div class="box">
    <div class="textbox">
     <p class="boxName">Exercices :</p>
     <br>
     <form action="#" method="post">
       <?php
        echo Form::input("oldDate","Old date","number");
        echo Form::input("oldDate","","submit");
       ?>
     </form>
     <form action="#" method="post">
       <?php
        echo Form::input("primeNb","Nombre premier","number");
        echo Form::input("prime","","submit");
       ?>
     </form>
     <form action="#" method="post">
       <?php
        echo Form::input("hexaNb","Nombre en hexa","number");
        echo Form::input("hexa","","submit");
       ?>
     </form>
     <form action="#" method="post">
       <?php
        echo Form::input("binNb","Nombre en binaire","number");
        echo Form::input("bin","","submit");
       ?>
     </form>
   </div>
 </div>
 <div class="box">
  <div class="textbox">
   <p class="boxName">Resultats :</p>
   <br>
   <?php
        if(isset($_POST['oldDate'])){
          $date = substr(Exercices::oldDate(intval($_POST['oldDate'])), 0,-5);
          echo Exercices::name("Old date");
          echo "<p>l'évenement a eu lieu le <strong>".$date."</strong></p></div>";
        }
        if(isset($_POST['prime'])){
          echo Exercices::name("Nombre premier");
          echo "<p>".$_POST['primeNb']."</p>";
        }
        if(isset($_POST['hexa'])){
          echo Exercices::name("Nombre en hexa");
          echo "<p>La valeur <strong>".intval($_POST['hexaNb'])."</strong> en décimal correspond à la valeur <strong>".Exercices::intToHexa(intval($_POST['hexaNb']))."</strong> en Hexa</p>";
        }
        if(isset($_POST['bin'])){
          echo Exercices::name("Nombre en binaire");
          echo  "<p>Le nombre <strong>".intval($_POST['binNb'])."</strong> en décimal vaut <strong>".Exercices::intToBin(intval($_POST['binNb']))."</strong> en binaire";
        }
       ?>
</div>
</div>
</div>
</div>
</body>
<?php require('footer.php'); ?>