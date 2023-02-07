<?php 
    session_start();
    //si on utilise lq base sql 
    // require('../connexionSQL/connexion.php');
    require('../connexion/connexion.php');
    require('function.php');
    echo "coucou";
    $idType = $_POST['typeHabitat'];
    $nbChambre = $_POST['nombreChambre'];
    $tarif = $_POST['loyerParJour'];
    $idQuartier = $_POST['quartier'];
    $description = $_POST['description'];
    ajoutHabitation($idType,$nbChambre,$tarif,$idQuartier,$description);
    header('location:../Page/Accueil.php?page=AjoutHabitation&&Ajout REUSSI');

?>