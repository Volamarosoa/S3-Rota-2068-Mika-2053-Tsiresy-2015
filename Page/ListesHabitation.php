<?php 
    $tabs = $_SESSION['user'];
    $tab = listeHabitation();
?>
<style>
    p{
        color: black;
    }

    .btn{
        background-color: grey;
        color: white;
    }

    .btn:hover{
        background-color: red;
        color: white;
    }

    .habitations{
        width: 350px;
        border-radius:30px;
        padding: 75px;
        box-shadow: 4px 4px 4px #888;
        margin-left: auto;
        margin-right: auto;
    }

    .za{
        margin-left: 200px;
        margin-top: -40px;
    }

    a{
        text-decoration: none;
    }
</style>
<div class="container listesHabitation">
    <div class="row cont">
        <?php for($i=0;$i<count($tab);$i++) { 
            $nomMaison = getNomTypeHabitation($tab[$i]['idtype']);
            $nomQuartier = getNomQuartier($tab[$i]['idquartier']); ?>
            <!-- le zavatra anaty boucle -->
            <div class="col-md-3 habitations">
                <div class="dropdown">
                    <?php if($tabs['type']==1) { ?>
                        <button class="btn btn-link rounded za" role="button" type="button" id="dropdownMenuLink" data-bs-toggle="dropdown" aria-expanded="false"><i class="fas fa-bars"></i></button>
                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                        <li><a class="dropdown-item" href="Accueil.php?page=ChangerDonnes&&idHabitation=<?php echo $tab[$i]['idHabitation'] ?>">Modifier</a></li>
                        <li><a class="dropdown-item" href="../Traitement/supprimerUneHabitation.php?idHabitation=<?php echo $tab[$i]['idHabitation'] ?>">Supprimer</a></li>
                        </ul>
                    <?php } ?>
                </div>
                <div class="row">
                    <img src="../assets/img/portrait.png">
                </div>
                <div class="row">
                    <p>Type de maison : <?php echo $nomMaison; ?> </p>
                    <p>Quartier: <?php echo $nomQuartier; ?> </p> 
                    <p>Loyer par jour: <?php echo $tab[$i]['loyerParJour']; ?>Ar </p>
                </div>
                <a href="Accueil.php?page=Propos&&idHabitation=<?php echo $tab[$i]['idHabitation']; ?>&&type=<?php echo $nomMaison; ?>&&quartier=<?php echo $nomQuartier; ?>"><button class="btn">Details</button></a>
            </div>
        <?php } ?>
    </div>
</div>