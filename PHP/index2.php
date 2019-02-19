<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete User</title>
    <link rel="stylesheet" href="css/style.css">
    <?php
    require('src/Form.php');
    require('src/BDD.php');
    $bdd = new BDD();
    ?>
</head>
  <body>
     <div id="all">
           <div id="topBar">
               <img id="logo" src="https://www.itescia.fr/sites/itescia/files/thumbnails/image/logocodingfactory-ptt.jpg">
               <div id="menu">
                <ul>
                    <li><a class="active" href="index.php">Formulaire</a></li>
                    <li><a href="#menu2">Delete User</a></li>
                    <li><a href="#menu3">Menu 3</a></li>
                </ul>
               </div>
           </div>
           <div id="content">
               <div id="box1">
                <div id="textbox1">
                 <p>   Delete User :</p>
                 <br>
                 <form action="index2.php" method="post">
                    <?php Form::select("user","Utilisateur",$bdd->getUserInfo()) ?><br>
                    <input type="submit" name="ENVOYER">
                 </form>
                  <?php  

                      if(isset($_POST['user'])){
                        $user = intval($_POST["user"]);
                        //$bdd->createUserReq($nom,$prenom,$ddn,$sexe);
                        $bdd->delUserReq($user);
                        $bdd->execute();
                        header("Refresh:0");
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