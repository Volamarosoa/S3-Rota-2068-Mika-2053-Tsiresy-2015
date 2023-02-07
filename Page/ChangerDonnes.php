<?php
    $idHabitation = $_GET['idHabitation'];
    $liste=getlisteTypeHabitation();
    $listes=getlisteQuartier();
    $tab = donneesUneHabitation($idHabitation);

?>

<style>
    .formulaire{
        text-align: center;
        /* display: flex;
        justify-content: center;
        align-items: center; */
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
    <div class="row d-flex justify-content-center align-items-center cont">
        <div class="formulaire">
            <p>Type d'Habitation :
                <select name="typeHabitat"  value="1">
                    <option value="">type</option>
                    <?php for($i=0; $i<count($liste);$i++) { ?>
                        <option value="<?php echo $liste[$i]['idType']; ?>" ><?php echo $liste[$i]['nomType']; ?></option>
                    <?php } ?>
                </select>
            </p>     
            <p>Nombre de Chambre : <input type="number" value="<?php echo $tab['nombreChambre']; ?>" name="nombreChambre"></p>
            <p>Loyer par Jour : <input type="number" name="loyerParJour" value="<?php echo $tab['loyerParJour']; ?>"> Ar/jour</p>
            <p>Quartier :
                <select name="quartier" id="">
                    <option value="">Quartier</option>
                    <?php for($j=0; $j< count($listes);$j++) { ?>
                        <option value="<?php echo $listes[$j]['idQuartier']; ?>"><?php echo $listes[$j]['nomQuartier']; ?></option>
                    <?php } ?>
                </select>
            </p>
            <p>Description de l'Habitation : 
                <textarea name="description" value="<?php echo $tab['description']; ?>" cols="30" rows="3"></textarea>
            </p>
            
        </div>
        <div class="row d-flex justify-content-center align-items-center">
            <div class="col-sm-3 col-md-offset-2 d-flex justify-content-center align-items-center">
                <p><a href="finTrajet.html"><button type="button" class="btn btn-grey">Finir le trajet</button></a> </p>
            </div>
        </div>
    </div>
</div>