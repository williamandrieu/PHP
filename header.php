<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>semaine php</title>
  <link rel="stylesheet" href="css/style.css">
  <?php
  require('src/Form.php');
  require('src/BDD.php');
  require('src/Personne.php');
  require('src/PostVerif.php');
  require('src/TableGenerator.php');
  ?>
</head>
<header>
  <div id="topBar">
     <img id="logo" src="https://www.itescia.fr/sites/itescia/files/thumbnails/image/logocodingfactory-ptt.jpg">
     <div id="menu">
      <ul>
        <li><a class="active" href="index.php">Exercices</a></li>
        <li><a class="active" href="del_user.php">Supprimer contacts</a></li>
        <li><a class="active" href="poste.php">La poste</a></li>
        <li><a class="active" href="mes_contacts.php">Mes contacts</a></li>
      </ul>
    </div>
  </div>
</header>