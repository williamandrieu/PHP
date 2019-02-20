<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Delete User</title>
  <link rel="stylesheet" href="css/style.css">
  <?php
  require('src/Form.php');
  require('src/BDD.php');
  ?>
</head>
<body>
 <div id="all">
   <div id="topBar">
     <img id="logo" src="https://www.itescia.fr/sites/itescia/files/thumbnails/image/logocodingfactory-ptt.jpg">
     <div id="menu">
      <ul>
        <li><a class="active" href="index.php">Formulaire</a></li>
        <li><a href="index2.php">Delete User</a></li>
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
      <?php 
      $bdd = new BDD();
      if($bdd->getBdd() != null){
      echo Form::select("user","Utilisateur",$bdd->getUserInfo())."<br>";
      }else{
        echo Form::select("user","Utilisateur",[])."<br>";
      }
      echo Form::input("delUser","","submit");
      ?>
    </form>
    <?php  
    if(isset($_POST['user'])){
      if($bdd->getBdd() != null){
        $user = intval($_POST["user"]);
        $bdd->delUser($user);
        header("Refresh:0");
      }
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