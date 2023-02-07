<?php
    // session_start();
    $id = $_POST['id'];
    echo $id;
	$datedebut = $_POST['datein'];
    echo $datedebut;
	$datefin =$_POST['dateout'];
    echo $datefin;
    $tab = $_SESSION['user'];
    $idClient = $tab['idclient'];
	$validation = reservationValide($id,$idClient,$datedebut,$datefin);
    echo $validation;
    $tarif = 1;
    // if($datefin < $datedebut){
    //     // header('location:Accueil.php?page=Propos');
    //     header('location:../index.php');
    // }
	if ($validation==0) {
		// header('location:Accueil.php?page=Propos&&message=Cette maison est deja reserve durant cette periode, Veuillez choisir une autre date');
	}
    if($validation==1){
		$tarif=tarif($id,$datedebut,$datefin);
	}
    if (isset($_GET['confirmer'])) {
        $confirmation=1;
        reservation($id,$idClient,$datedebut,$datefin,$tarif);
    }
?>
<div class="container">
    <p><b><h3>Description</h3></b></p>
    <?php if($validation==1) { ?>
        <div id="payer1">
            <center>
                <h2><b>Prix Location <?php echo $tarif; ?>Ar </b></h2>
                <p><input type="text" name="comptebanque" placeholder="votre compte banquaire"></p>
                <p><input type="password" name="comptepasse" placeholder="mot de passe banquaire"> </p>
            </center>
            <button id="b1"><a href="Accueil.php?page=Payer&&confirmer=1">Payer</a> </button>
            <button id="b2"><a href="Accueil.php?page=ListesHabitation">Accueil</a> </button>

        </div>
    <?php } 
    else {
    ?>
	<div id="payer2"> 
        <p>
            <h5>Votre réservation a été Annuler, Elle a ete deja reserver par d'autre client.Veiller inserer une autre date.</h5><br>
        </p>
        <a href="Accueil.php?page=ListesHabitation"><input type="submit" value="<<Accueil"></a>
	</div>
    <?php } ?>
    <?php if ($confirmation!=1) {  ?>
        <div id="payer2"> 
            <p>
                <h1>Votre réservation a été Annuler, Il a ete deja reserver par d'autre client.Veiller inserer une autre date.</h1><br>
				<button><a href="Accueil.php?page=ListesHabitation">Accueil</a></button>
			</p>
	    </div>
    <?php } ?>
</div>