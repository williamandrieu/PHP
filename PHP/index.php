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
	  $bdd = new BDD();
    ?>
</head>
	<body>
	   <div id="all">
           <div id="topBar">
               <img id="logo" src="https://www.itescia.fr/sites/itescia/files/thumbnails/image/logocodingfactory-ptt.jpg">
               <div id="menu">
                <ul>
                    <li><a href="#menu1">Formulaire</a></li>
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
	                 <?php Form::input("prenom","Prenom","text") ?><br>
	                 <?php Form::input("nom","Nom","text") ?><br>
                   <?php Form::input("ddn","Date de naissance","date") ?><br>
                   <?php Form::select("sexe","Sexe",[["Homme",0],["Femme",1]]) ?><br>
	                <input type="submit" name="ENVOYER">
                </form>
                <div>
                  <?php  

                    if(isset($_POST['prenom'])){
                      echo "<strong> Prenom : </strong>".($_POST['prenom'])."<br>";
                      echo "<strong> Nom : </strong>".($_POST['nom'])."<br>";
                      echo "<strong> Date de naissance : </strong>".($_POST['ddn'])."<br>";
                      echo "<strong> Sexe : </strong>".($_POST['sexe']."<br>");

                      $nom = $_POST["nom"];
                      $prenom = $_POST["prenom"];
                      $ddn = $_POST["ddn"];
                      $sexe = intval($_POST["sexe"]);
                      $bdd->createUserReq($nom,$prenom,$ddn,$sexe);
                      $bdd->execute();

                    }
                      
                  ?>
                </div>
                 </div>
               </div>
           </div>
       </div>
	</body>
    <footer>
        <a id="mathis" href="http://mathistimotei.com/">© Mathis Timotei</a>
    </footer>
</html>