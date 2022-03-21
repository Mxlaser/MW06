<?php
  $mydb=new PDO('mysql:host=localhost;dbname=MW04_drone_nikola;charset=utf8','nikola','snirlla');
  session_start(); //Création d'une session (suite en bas)
  //---Connexion---
  if(!empty($_POST))
  {
  	if(isset($_POST['valider']))
  	{
  		$pseudo=$_POST['pseudo_Utilisateur'];
  		$mdp=$_POST['mot_De_Passe_Utilisateur'];
  		$req="select nom,prenom from utilisateur where pseudo=? and mdp=?";
  		$reqpreparer=$mydb->prepare($req);
  		$tableauDeDonnees=array($pseudo, $mdp);
  		$reqpreparer->execute($tableauDeDonnees);

  		$reponse=$reqpreparer->fetchAll(PDO::FETCH_ASSOC);
  		$reponse2=count($reponse);

      $reqpreparer->closeCursor();

  		if($reponse2<1)
  			header('Location:formulaire_connexion.php?erreur=pseudo_Utilisateur');
  		else
  		{
  			setcookie("pseudo", $pseudo, "time()+3600","http://172.20.21.208/~nikola/MW05/index.php");
  			header('Location:formulaire_connexion.php');
  		}
  	}
  }

  //---Inscription---
  if(!empty($_POST))
  {
    if(isset($_POST['inscription']))
    {
      foreach ($_POST as $cle => $valeur)
      {
        $$cle = $valeur;
      }
      $req="select nom from utilisateur where pseudo=?";
      $reqpreparer=$mydb->prepare($req);
      $tableauDeDonnees=array($pseudo_Utilisateur);
      $reqpreparer->execute($tableauDeDonnees);

      $reponse=$reqpreparer->fetchAll(PDO::FETCH_ASSOC);
      $reponse2=count($reponse);

      $reqpreparer->closeCursor();

      if($reponse2<1)
      {
        $req="insert into utilisateur (nom, prenom, email, naissance, pseudo, mdp) values(?,?,?,?,?,?)";
        $reqpreparer=$mydb->prepare($req);
        $tableauDeDonnees=array($nom, $prenom, $email, $date, $pseudo_Utilisateur, $mot_De_Passe_Utilisateur);
        $reqpreparer->execute($tableauDeDonnees);

        $reqpreparer->closeCursor();

        setcookie("pseudo", $pseudo_Utilisateur, "time()+3600","http://172.20.21.208/~nikola/MW05/index.php");
        header('Location:formulaire_inscription.php');
      }
      else
      {
        header('Location:formulaire_inscription.php?erreur=pseudo_Utilisateur');
      }
    }
  }

  if(isset($_GET['deconnexion']))
  {
      setcookie("pseudo", '', "time()-1","http://172.20.21.208/~nikola/MW05/index.php");
      header('Location:index.php');
  }


//---Profil---
  if(isset($_GET['profil']))
  {
    $req="select nom,prenom,email,pseudo from utilisateur where pseudo=?";
    $reqpreparer=$mydb->prepare($req);
    $tableauDeDonnees=array($_COOKIE['pseudo']);
    $reqpreparer->execute($tableauDeDonnees);

    $reponse=$reqpreparer->fetchAll(PDO::FETCH_ASSOC);

    $nom=$reponse[0]["nom"];
    $prenom=$reponse[0]["prenom"];
    $email=$reponse[0]["email"];
    $pseudo=$pseudo[0]["pseudo"];

    $reqpreparer->closeCursor();

    header('Location:formulaire_profil.php?nom='.$nom.'&prenom='.$prenom.'&email='.$email.'&pseudo='.$_COOKIE['pseudo']);
  }

//---Mise à Jour du Profil---
  if(isset($_POST['miseAJour']))
  {
    foreach ($_POST as $cle => $valeur)
    {
      $$cle = $valeur;
    }
    $req="select idutilisateur from utilisateur where pseudo=?";
    $reqpreparer=$mydb->prepare($req);
    $tableauDeDonnees=array($_COOKIE['pseudo']);
    $reqpreparer->execute($tableauDeDonnees);

    $reponse=$reqpreparer->fetchAll(PDO::FETCH_ASSOC);
    $reponse2=count($reponse);

    $idutilisateur=$reponse[0]["idutilisateur"];

    $reqpreparer->closeCursor();
    //---Verif si le champ du pseudo est changé---
    if($pseudo_Utilisateur == $_COOKIE['pseudo'])//si pas changé
    {
      $req="update utilisateur set nom=?, prenom=?, email=? where pseudo=?"; //modifier tt sauf pseudo
      $reqpreparer=$mydb->prepare($req);
      $tableauDeDonnees=array($nom, $prenom, $email, $_COOKIE['pseudo']);
      $reqpreparer->execute($tableauDeDonnees);

      $reponse=$reqpreparer->fetchAll(PDO::FETCH_ASSOC);

      $reqpreparer->closeCursor();

      setcookie("pseudo", $pseudo_Utilisateur, "time()-1","http://172.20.21.208/~nikola/MW05/index.php");
      setcookie("pseudo", $pseudo_Utilisateur, "time()+3600","http://172.20.21.208/~nikola/MW05/index.php");
      header('Location:index.php');

    }

    else //si changé
    {
      $req="select nom from utilisateur where pseudo=?";
      $reqpreparer=$mydb->prepare($req);
      $tableauDeDonnees=array($pseudo_Utilisateur);
      $reqpreparer->execute($tableauDeDonnees);

      $reponse=$reqpreparer->fetchAll(PDO::FETCH_ASSOC);
      $reponse2=count($reponse);
    }
    //---Verif si pseudo est déjà utilisé---
    if($reponse2 < 1)//pseudo dispo
    {
      $req="update utilisateur set nom=?, prenom=?, email=?, pseudo=? where idutilisateur=?";
      $reqpreparer=$mydb->prepare($req);
      $tableauDeDonnees=array($nom, $prenom, $email, $pseudo_Utilisateur, $idutilisateur);
      $reqpreparer->execute($tableauDeDonnees);

      $reponse=$reqpreparer->fetchAll(PDO::FETCH_ASSOC);

      $reqpreparer->closeCursor();

      setcookie("pseudo", $pseudo_Utilisateur, "time()-1","http://172.20.21.208/~nikola/MW05/index.php");
      setcookie("pseudo", $pseudo_Utilisateur, "time()+3600","http://172.20.21.208/~nikola/MW05/index.php");
      header('Location:index.php');
    }

    else//---pseudo non dispo
    {
      header('Location:formulaire_profil.php?erreur&nom='.$nom.'&prenom='.$prenom.'&email='.$email.'&pseudo='.$pseudo_Utilisateur);
    }
  }

  //---Sessions
  if(isset($_GET['suivi']))
  {
    $req="select count(iddrone) as nb from drone";
    $reqpreparer=$mydb->prepare($req);
    $tableauDeDonnees=array();
    $reqpreparer->execute($tableauDeDonnees);

    $reponse=$reqpreparer->fetchAll(PDO::FETCH_ASSOC);

    $_SESSION['nbdrone']=$reponse[0]["nb"];

    $reqpreparer->closeCursor();

    header('Location:suivi.php?suivi');
  }
?>
