<html>
  <head>
    <meta charset="utf-8">
    <title>Mon suivi de geek</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="CSS\suivi.css">
  </head>
  <body id ="body" data-theme="light">
    <?php
      session_start(); //Création d'une session
      if(isset($_GET['suivi']))
      {
        if(isset($_SESSION['nbdrone']))
        {
          $nbdrone = $_SESSION['nbdrone'];
          //Methode 1
          echo '<div class="statistique"><a href="suivi.php?listeDrones">';
          echo '<p class="statistique_icone"><img src="Images/Icones/drone.svg"></p>';
          echo '<p class="statistique_valeur">'.$nbdrone.'</p></a></div>';
          unset($_SESSION['nbdrone']);
        }
        if(isset($_SESSION['nbvol']))
        {
          $nbvol = $_SESSION['nbvol'];
          //Methode 2
          echo "<div class='statistique'><a href='suivi.php?listeVols'>";
          echo "<p class='statistique_icone'><img src='Images/Icones/fly.svg'></p>";
          echo "<p class='statistique_valeur'>$nbvol</p></a></div>";
          unset($_SESSION['nbvol']);
        }
        if(isset($_SESSION['nbutilisateur']))
        {
          $nbutilisateur = $_SESSION['nbutilisateur'];
          echo "<div class='statistique'><a href='suivi.php?listeUtilisateurs'>";
          echo "<p class='statistique_icone'><img src='Images/Icones/man.svg'></p>";
          echo "<p class='statistique_valeur'>$nbutilisateur</p></a></div>";
          unset($_SESSION['nbutilisateur']);
        }
        else
        {
          header('Location:rest.php?suivi');
        }
      }
    ?>
  </body>
</html>
