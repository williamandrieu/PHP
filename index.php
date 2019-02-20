<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Formulaire</title>
  <link rel="stylesheet" href="css/style.css">
  <?php
  require('src/Form.php');
  require('src/BDD.php');
  require('src/Personne.php');
  $personne = new Personne("Timotei", "Mathis", "03.06.2000", "Homme");
  $lettreSearch = ["M","P","W"];
  ?>
</head>
<body>
  <div id="all">
   <div id="topBar">
     <img id="logo" src="https://www.itescia.fr/sites/itescia/files/thumbnails/image/logocodingfactory-ptt.jpg">
     <div id="menu">
      <ul>
        <li><a href="index.php">Formulaire</a></li>
        <li><a class="active" href="index2.php">Delete User</a></li>
        <li><a href="#menu3">Menu 3</a></li>
      </ul>
    </div>
  </div>
  <div id="content">
   <div id="box1">
    <div id="textbox1">
     <p>   Personne :</p>
     <br>
     <p>  Prénom : <?php echo $personne->getNom(); ?></p>
     <p>  Nom : <?php echo $personne->getPrenom(); ?></p>
     <p>  Date de naissance : <?php echo $personne->getDdn(); ?></p>
     <p>  Sexe : <?php echo $personne->getSexe(); ?></p>
     <p>  Age : <?php echo $personne->getAge(); ?></p>
   </div>
 </div>
 <div id="box1">
  <div id="textbox1">
   <p>   Form :</p>
   <br>
   <form action="index.php" method="post">
    <?php
    echo '<p class="need">'.Form::input("prenom","Prenom","text").'</p>';
    echo '<p class="need">'.Form::input("nom","Nom","text").'</p>';
    echo '<p class="need">'.Form::input("ddn","Date de naissance","date").'</p>';
    echo '<p>'.Form::select("sexe","Sexe",[["Homme",0],["Femme",1]]).'</p>';
    echo "<p>".Form::input("createUser","","submit") ;
    ?>
  </form>
    <?php  

    if(isset($_POST['prenom'])){
      if($_POST['prenom'] != "" && $_POST['nom'] != "" && $_POST['ddn'] != ""){
        $bdd = new BDD();
        if($bdd->getBdd() != null){
        echo "<p><strong> Le compte de ".$_POST['prenom']." ".$_POST['nom']." a été créé</strong><p>";

        $nom = $_POST["nom"];
        $prenom = $_POST["prenom"];
        $ddn = $_POST["ddn"];
        $sexe = intval($_POST["sexe"]);

        $bdd->createUser($nom,$prenom,$ddn,$sexe);
        }
      }else{
        echo '<style type="text/css">.need{color: red;}</style>';
      }
    }
    ?>
</div>
</div>
</div>
</div>
</body>
<footer>
  <a id="mathis" href="http://mathistimotei.com/">© Mathis Timotei</a>
</footer>
</html>