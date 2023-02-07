<?php
// si on utilise lq base sql 
// require('../connexionSQL/connexion.php');
    require('../connexion/connexion.php');
    require('function.php');
    $idHabitation = $_GET['idHabitation'];
    suppressionHabitat($idHabitation);
    header('location:../Page/Accueil.php?page=ListesHabitation&&Suppression REUSSI');
?>