<?php
    $type=$_GET['type'];
    $quartier=$_GET['quartier'];
    $id=$_GET['idHabitation'];
    $tab=infoHabitation($id);
   	$liste=disponibilite($id);
	
?>
<div class="container">
	<p> Coucou a propos</p>
	<div id="tete">
		<p>Type habitation: <?php echo $type;?></p>
		<p>Quartier: <?php echo $quartier;?></p>
	</div>
	<hr>
	<div id="bigpicture">
		<!-- <img src="../assets/img/<?php echo $type; ?>/<?php echo $tab[0][0]; ?>.png" width="471" height="385"> -->
		<img src="../assets/img/portrait.png" width="471" height="385">
		<p><b>Description:</b>...</p>
			<!-- <?php echo $tab[1][0]; ?> -->
	</div>
	<div id="smallpicture">	
		<!-- <img id="un" src="../assets/img/<?php echo $type; ?>/<?php echo $tab[0][1]; ?>.png" width="189" height="179">
		<img id="un" src="../assets/img/<?php echo $type; ?>/<?php echo $tab[0][2]; ?>.png" width="189" height="179">
		<img id="deux" src="../assets/img/<?php echo $type; ?>/<?php echo $tab[0][3]; ?>.png" width="191" height="162">
		<img id="deux" src="../assets/img/<?php echo $type; ?>/<?php echo $tab[0][4]; ?>.png" width="191" height="162"> -->
		<div class="litle">
			<img class="un" src="../assets/img/portrait.png" width="189" height="179">
		</div>
		<div class="litle">
			<img class="un" src="../assets/img/portrait.png" width="189" height="179">
		</div>
		<div class="litle">
			<img class="deux" src="../assets/img/portrait.png" width="191" height="162">
		</div>
		<div class="litle">
			<img class="deux" src="../assets/img/portrait.png" width="191" height="162">
		</div>
	</div>
	<div class="liste">
		<form action="Accueil.php?page=Payer" method="POST"> 
			<!-- <input type="submit" value="Réserver"></button> -->
			<input type="hidden" value="<?php echo $id; ?>" name="id">
			<table width="200" border="1" class="table ">
				<tr>
					<th height="25"></th>
					<th height="25">réservation du</th>
				</tr>
				<tr>
					<td height="25">arrivée</td>
					<td height="25"> <input type="date" name="datein"> </td>
				</tr>
				<tr>
					<td height="25">départ</td>
					<td height="25"> <input type="date" name="dateout"> </td>
				</tr>
				<?php if(isset($_GET['message'])) { ?>
					<p><?php echo $_GET['message']; ?></p>
				<?php } ?>
				</table>
			<input type="submit" value="Réserver">	
		 </form>
	</div>
	<div id="reservation">
		<b>Indisponibilité:</b>
		<?php for ($i=0; $i < count($liste); $i++) { ?>
			<p><?php echo "de ".$liste[$i]['datedebut']." à ".$liste[$i]['datefin'] ?></p>
		<?php } ?>
	</div>
</div>