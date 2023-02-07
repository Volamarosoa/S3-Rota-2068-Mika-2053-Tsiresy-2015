<?php
    require('../connexion/connexion.php');
    //si on utilise lq base sql 
    // require('../connexionSQL/connexion.php');
    require('function.php');

    $nom=$_POST['nom'];
    $prenom=$_POST['prenom'];
    $contact=$_POST['contact'];
    $mail=$_POST['email'];
    $mdp=$_POST['password'];
    $confirmapass=$_POST['confirmpass'];
    if($mdp==$confirmapass) {
        $inscription = inscription($nom,$prenom,$mail,$mdp,$contact);
        if($inscription==1)  header('location:../index.php');
        else {
            $message = "Cette compte existe deja!";
            header('location:../Page/Inscription.php?msg='.$message);
        }    
       
    } else {
        $message = "Verifier le mot de passe que vous aviez retapez!";
        header('location:../Page/Inscription.php?msg='.$message);
    }



?>

   