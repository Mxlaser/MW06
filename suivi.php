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
    //---Gestion du suivi
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

    //---Gestion de la liste des drones
      if(isset($_GET['listeDrones']))
      {
        if(isset($_SESSION['listeDrones']))
        {
          $table = "<table>";
          $table .= "<tr>
                      <th>Numero drone</th>
                      <th>Marque</th>
                      <th>Modele</th>
                      <th>Reference</th>
                      <th>Date achat</th>
                      <th>Action</th>
                     </tr>";
          for($i = 0; $i < count($_SESSION['listeDrones']); $i++)
          {
              $listeDrones = $_SESSION['listeDrones'][$i];
              $table .= "<tr><form action = 'rest.php' method = 'post'>";
              foreach ($listeDrones as $cle => $valeur)
              {
                if($cle == "iddrone") //mettre en readonly l'id drone
                {
                  $table .= "<th><input type = 'text' name = $cle value = $valeur readonly></th>";
                }
                else
                {
                  $table .= "<th><input type = 'text' name = $cle value = $valeur></th>";
                }
              }
              $table .= "<th><input type = 'submit' id = 'MiseAJourListeDrones' name = 'MiseAJourListeDrones' value = 'Mettre à jour'></th></form></tr>";
          }
          $table .= "</table>";
          echo $table;
          unset($_SESSION['listeDrones']);
        }
        else
        {
          header('Location:rest.php?listeDrones');
        }
      }

    //---Gestion de la liste des vols
      if(isset($_GET['listeVols']))
      {
        if(isset($_SESSION['listeVols']))
        {
          $table = "<table>";
          $table .= "<tr>
                      <th>Numero vol</th>
                      <th>Numero utilisateur</th>
                      <th>Date vol</th>
                      <th>Numero drone</th>
                     </tr>";
          for($i = 0; $i < count($_SESSION['listeVols']); $i++)
          {
              $listeVols = $_SESSION['listeVols'][$i];
              $table .= "<tr><form action = 'rest.php' method = 'post'>";
              foreach ($listeVols as $cle => $valeur)
              {
                if($cle == "idvol") //mettre en readonly l'id vol
                {
                  $table .= "<th><input type = 'text' name = $cle value = $valeur readonly></th>";
                }
                else if($cle == "idutilisateur") //mettre en readonly l'id utilisateur
                {
                  $table .= "<th><input type = 'text' name = $cle value = $valeur readonly></th>";
                }
                else if($cle == "iddrone") //mettre en readonly l'id drone
                {
                  $table .= "<th><input type = 'text' name = $cle value = $valeur readonly></th>";
                }
                else
                {
                  $table .= "<th><input type = 'text' name = $cle value = $valeur></th>";
                }
              }
              $table .= "<th><input type = 'submit' id = 'MiseAJourListeVols' name = 'MiseAJourListeVols' value = 'Mettre à jour'></th></form></tr>";
          }
          $table .= "</table>";
          echo $table;
          unset($_SESSION['listeVols']);
        }
        else
        {
          header('Location:rest.php?listeVols');
        }
      }

    //---Gestion de la liste des utilisateurs
      if(isset($_GET['listeUtilisateurs']))
      {
        if(isset($_SESSION['listeUtilisateurs']))
        {
          $table = "<table>";
          $table .= "<tr>
                      <th>Numero utilisateur</th>
                      <th>Nom</th>
                      <th>Prenom</th>
                      <th>Email</th>
                      <th>Date de naissance</th>
                     </tr>";
          for($i = 0; $i < count($_SESSION['listeUtilisateurs']); $i++)
          {
              $listeUtilisateurs = $_SESSION['listeUtilisateurs'][$i];
              $table .= "<tr><form action = 'rest.php' method = 'post'>";
              foreach ($listeUtilisateurs as $cle => $valeur)
              {
                $table .= "<th><input type = 'text' name = $cle value = $valeur readonly></th>";
              }
          }
          $table .= "</table>";
          echo $table;
          unset($_SESSION['listeUtilisateurs']);
        }
        else
        {
          header('Location:rest.php?listeUtilisateurs');
        }
      }

    //---Affiche un erreur (ne fonctionne pas)
      /*if(isset($_GET['erreur']))
      {
        echo "<script language=\"javascript\">";
        echo "alert('erreur')"; //".$_SESSION['erreur']."
        echo "</script>";
        header('Location:rest.php?suivi');
      }*/
    ?>
  </body>
  <footer>
    <a href="index.php">Page principale</a> <!--N'apparait qu'en mode sombre qu'il faut modifier plus haut dans le date-theme du body-->
    <button type="button" id="dark_light">Mode sombre</button> <!--marche pas-->
  </footer>
</html>
