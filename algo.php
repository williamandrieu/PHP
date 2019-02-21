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
        echo "<p>".Form::input("oldDateNb","Old date","number")."</p>";
        echo "<p>".Form::input("oldDate","","submit")."</p>";
       ?>
     </form>
     <form action="#" method="post">
       <?php
        echo "<p>".Form::input("primeNb","Nombre premier","number")."</p>";
        echo "<p>".Form::input("prime","","submit")."</p>";
       ?>
     </form>
     <form action="#" method="post">
       <?php
        echo "<p>".Form::input("hexaNb","Nombre en hexa","number")."</p>";
        echo "<p>".Form::input("hexa","","submit")."</p>";
       ?>
     </form>
     <form action="#" method="post">
       <?php
        echo "<p>".Form::input("binNb","Nombre en binaire","number")."</p>";
        echo "<p>".Form::input("bin","","submit")."</p>";
       ?>
     </form>
     <form action="#" method="post">
       <?php
        echo "<p>".Form::input("factoNb","Factoriel","number")."</p>";
        echo "<p>".Form::input("facto","","submit")."</p>";
       ?>
     </form>
     <form action="#" method="post">
       <?php
        echo "<p>".Form::input("romainNb","Nombre romain","number")."</p>";
        echo "<p>".Form::input("romain","","submit")."</p>";
       ?>
     </form>
     <form action="#" method="post">
       <?php
        echo "<p>".Form::input("smallestNb","Plus petit nombre","text")."</p>";
        echo "<p>".Form::input("smallest","","submit")."</p>";
       ?>
     </form>
     <form action="#" method="post">
       <?php
        echo "<p>".Form::input("triNameStr","Tri des Nom","text")."</p>";
        echo "<p>".Form::input("triName","","submit")."</p>";
       ?>
     </form>
     <form action="#" method="post">
       <?php
        echo "<p>".Form::input("emailStr","email","email")."</p>";
        echo "<p>".Form::input("email","","submit")."</p>";
       ?>
     </form>
     <form action="#" method="post">
       <?php
        echo "<p>".Form::input("ddnStr","Date de naissance","text")."</p>";
        echo "<p>".Form::input("ddn","","submit")."</p>";
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
          $date = substr(Exercices::oldDate(intval($_POST['oldDateNb'])), 0,-5);
          echo "<div class='exercices'>".Exercices::name("Old date");
          echo "<p>l'évenement a eu lieu le <strong>".$date."</strong></p></div>";
        }
        if(isset($_POST['prime'])){
          echo "<div class='exercices'>".Exercices::name("Nombre premier");
          echo "<p>Jusqu'a <strong>".intval($_POST['primeNb'])."</strong> les nombres premiers sont : <strong>".Exercices::primeNumber(intval($_POST['primeNb']))."</strong></p></div>";
        }
        if(isset($_POST['hexa'])){
          echo "<div class='exercices'>".Exercices::name("Nombre en hexa");
          echo "<p>La valeur <strong>".intval($_POST['hexaNb'])."</strong> en décimal correspond à la valeur <strong>".Exercices::intToHexa(intval($_POST['hexaNb']))."</strong> en Hexa</p></div>";
        }
        if(isset($_POST['bin'])){
          echo "<div class='exercices'>".Exercices::name("Nombre en binaire");
          echo  "<p>Le nombre <strong>".intval($_POST['binNb'])."</strong> en décimal vaut <strong>".Exercices::intToBin(intval($_POST['binNb']))."</strong> en binaire</p></div>";
        }
        if(isset($_POST['facto'])){
          echo "<div class='exercices'>".Exercices::name("Factorielle");
          echo "<p>La factorielle de <strong>".intval($_POST['factoNb'])."</strong> est égale à <strong>".Exercices::getFact($_POST['factoNb'])."</strong> </p></div>";;
        }
        if(isset($_POST['romain'])){
          echo "<div class='exercices'>".Exercices::name("Nombre romain");
          echo "<p>La valeur de <strong>".intval($_POST['romainNb'])."</strong> en chiffre romain est <strong>".Exercices::roman(intval($_POST['romainNb']))."</strong></p></div>";
        }
        if(isset($_POST['smallest'])){
          echo "<div class='exercices'>".Exercices::name("Plus petit nombre");
          echo "<p>".Exercices::smallest($_POST['smallestNb'])."</p></div>";
        }
        if(isset($_POST['triName'])){
          echo "<div class='exercices'>".Exercices::name("Tri des nom");
          echo "<p>".Exercices::sortName($_POST['triNameStr'])."</p></div>";
        }
        if(isset($_POST['email'])){
          echo "<div class='exercices'>".Exercices::name("Verification email");
          if(Exercices::emailVerif($_POST['emailStr'])){
            echo "<p>l'addresse mail <strong>".$_POST['emailStr']."</strong> est valide</p></div>";
          }else{
            echo "<p>l'addresse mail <strong>".$_POST['emailStr']."</strong> n'est pas valide</p></div>";
          }
        }
        if(isset($_POST['ddn'])){
          echo "<div class='exercices'>".Exercices::name("Verification date");
          if(Exercices::dateVerif($_POST['ddnStr'])){
            echo "<p>la date <strong>".$_POST['ddnStr']."</strong> est valide</p></div>";
          }else{
            echo "<p>la date <strong>".$_POST['ddnStr']."</strong> n'est pas valide elle dois être au format <strong>jj/mm/aa</strong></p></div>";
          }
          
        }
       ?>
</div>
</div>
</div>
</div>
</body>
<?php require('footer.php'); ?>