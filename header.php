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
        <li><a class="active" href="index.php">Accueil</a></li>
        <li><a class="active" href="algo.php">Exercices</a></li>
        <li id="contact">La poste
            <span class="contenu">
              <a href="poste.php">Créer lettre</a>
              <a href="messages.php">Messages reçu</a>
            </span>
        </li>
        <li id="contact">Contact
            <span class="contenu">
              <a href="mes_contacts.php">Mes contacts</a>
              <a href="modifier.php">Modifier contacts</a>
              <a href="del_user.php">Suprimmer contacts</a>
            </span>
        </li>
      </ul>
    </div>
  </div>
</header>