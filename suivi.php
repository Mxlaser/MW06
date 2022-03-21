<?php
  session_start(); //Création d'une session
  if(isset($_GET['suivi']))
  {
    if(isset($_SESSION['nbdrone']))
    {
      /*echo "$_SESSION['nbdrone']";
      unset($_SESSION['nbdrone']);*/

      $nbdrone=$_SESSION['nbdrone'];
      echo "<div class='statistique><a href='suivi.php?listeDones'>";
      echo "<p class='statistique_icone'><img src='Images/Icones/drone.svg'></p>";
      echo "<p class='statistique_valeur'>$nbdrone</p></a></div>";
      unset($_SESSION['nbdrone']);
    }
    else
    {
      header('Location:rest.php?suivi');
    }
  }
?>

<html>
  <head>
    <meta charset="utf-8">
    <title>Mon CV de geek</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Quicksand:wght@300&display=swap" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="CSS\suivi.css">
  </head>
  <body>
  </body>
</html>
