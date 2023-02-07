
<?php
    session_start();
    require('../connexion/connexion.php');
    // si on utilise lq base sql 
    // require('../connexionSQL/connexion.php');
    require('function.php');

    $mailaka = $_POST['mail'];
    $mdp = $_POST['pass'];
    $login=login($mailaka,$mdp);
    echo $login;
    if ($login!=null) {
        $_SESSION['user'] = $login;
        header('location:../Page/Accueil.php?page=ListesHabitation');
    }
    else{
        $msg = "Verifier votre mail ou mdp!!";
        header('location:../index.php?msg='.$msg);
    }
?>