<?php
    $liste=getlisteTypeHabitation();
    $listes=getlisteQuartier();

?>

<style>
    .formulaire{
        text-align: center;
        padding-top: 80px;
        width: 500px;
        height: 500px;
        background-color: rgb(255, 255, 202);
        border-radius: 30px;
        box-shadow:4px 4px 4px #888;
    }
    .btn-grey{
        background: linear-gradient(#fe464d,50%,#fe416b);
        color : white;
        font-weight: 200;
        border-color: grey;
        border-radius: .5rem;
        width: 200px;
        height: 70px;
        font-weight: bold;
    }
    input{
        border: 0px;
        background: transparent;
        border-bottom: 2px solid black;
    }
    select{
        background: transparent;
        border: 0px;
        border-bottom: 2px solid black;
    }
    p{
        text-align: left;
    }
</style>
<div class="container">
    <form action="../Traitement/insertionHabitation.php" method="POST">
        <div class="row d-flex justify-content-center align-items-center cont">
            <div class="formulaire">
                <p>Type d'Habitation :
                    <select name="typeHabitat" required>
                        <option value="">type</option>
                        <?php for($i=0; $i<count($liste);$i++) { ?>
                            <option value="<?php echo $liste[$i]['idType']; ?>"><?php echo $liste[$i]['nomType']; ?></option>
                        <?php } ?>
                    </select>
                </p>     
                <p>Nombre de Chambre : <input type="number" name="nombreChambre" required></p>
                <p>Loyer par Jour : <input type="number" name="loyerParJour" required> Ar/jour</p>
                <p>Quartier :
                    <select name="quartier" required>
                        <option value="">Quartier</option>
                        <?php for($j=0; $j< count($listes);$j++) { ?>
                            <option value="<?php echo $listes[$j]['idQuartier']; ?>"><?php echo $listes[$j]['nomQuartier']; ?></option>
                        <?php } ?>
                    </select>
                </p>
                <p>Description de l'Habitation : 
                    <textarea name="description" cols="30" rows="3" required></textarea>
                </p>
                
            </div>
            <div class="row d-flex justify-content-center align-items-center">
                <div class="col-sm-3 col-md-offset-2 d-flex justify-content-center align-items-center">
                    <button type="submit" class="btn btn-grey">Ajouter</button>
                </div>
            </div>
        </div>
    </form>
</div>