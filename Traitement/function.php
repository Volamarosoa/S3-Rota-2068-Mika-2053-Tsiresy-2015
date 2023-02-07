<?php
	function login($mail, $pass){
		$connexion= connectPostgress();
		$sql1="SELECT * from client where mail='".$mail."' and passWord='".$pass."'";
		$sql2="SELECT * from superUtilisateur where mail='".$mail."' and passWord='".$pass."'";
		echo $sql1;
		echo $sql2;
		$countC = 0;
		$countA = 0;
		$client=$connexion->query($sql1);
		$client->setFetchMode(PDO::FETCH_OBJ);
		$valeur = 0;
		$tab = array();
		while( $ligne = $client->fetch() ) // on récupère la liste des membres
        {
		   $tab['type'] = 2;
		   $tab['idclient'] = $ligne->idclient;
		   $tab['nom'] = $ligne->nom;
		   $tab['prenom'] = $ligne->prenom;
		   $tab['contact'] = $ligne->contact;
        }
		if ($tab==null) {
			$admin=$connexion->query($sql2);
			$admin->setFetchMode(PDO::FETCH_OBJ);
			while($ligne = $admin->fetch() ) // on récupère la liste des membres
			{
				$tab['type'] = 1;
				$tab['idsuperutilisateur'] = $ligne->idsuperutilisateur;
				$tab['nom'] = $ligne->nom;
				$tab['prenom'] = $ligne->prenom;
				$tab['contact'] = $ligne->contact;
			}
		}
		return $tab;
	}

	function inscription($nom,$prenom,$mail,$mdp,$contact){
		$connexion= connectPostgress();
		$tab = login($mail, $pass);
		$value = 0;
		if($tab==null){
			$value = 1;
			$insert="INSERT INTO client(mail,nom,prenom,passWord,contact) values('".$mail."','".$nom."','".$prenom."','".$mdp."','".$contact."')";
			echo $insert;
			$connexion->exec($insert);
		}
		return $value;
	}

	function infoHabitation($id){
		$connexion=connectPostgress();
		$requette="SELECT * from habitation join photos on  habitation.idHabitation=photos.idHabitation where habitation.idHabitation=".$id;
		// echo $requette;
		$photo= array();
		$i=0;
		$description = "";
		$request=$connexion->query($requette);
		$request->setFetchMode(PDO::FETCH_OBJ);
		while ($ligne = $request->fetch()) {
			$photo[$i] = $ligne->photo;
			$description = $ligne->description;
			$i++;
		}
		$tab = array();
		$tab['photo'] = $photo;
		$tab['description'] = $description;
		return $tab;
	} 

	function listeHabitation(){
		$connexion=connectPostgress();
		$requette="SELECT * from habitation order by idHabitation asc";
		$resultats=$connexion->query($requette);
		$resultats->setFetchMode(PDO::FETCH_OBJ);
		$i=0;
		$tab = array();
		while($ligne = $resultats->fetch() ) // on récupère la liste des membres
		{
			$tab[$i]['idHabitation'] = $ligne->idhabitation;
			$tab[$i]['idtype'] = $ligne->idtype;
			$tab[$i]['nombreChambre'] = $ligne->nombrechambre;
			$tab[$i]['loyerParJour'] = $ligne->loyerparjour;
			$tab[$i]['idquartier'] = $ligne->idquartier;	
			$tab[$i]['description'] = $ligne->descrption;	
			$i++;
		}
		return $tab;
	}

	function donneesUneHabitation($idHabitation){
		$connexion=connectPostgress();
		$requette="SELECT * from habitation where idHabitation=".$idHabitation;
		$resultats=$connexion->query($requette);
		$resultats->setFetchMode(PDO::FETCH_OBJ);
		$i=0;
		$tab = array();
		while($ligne = $resultats->fetch() ) // on récupère la liste des membres
		{
			$tab['idHabitation'] = $ligne->idhabitation;
			$tab['idtype'] = $ligne->idtype;
			$tab['nombreChambre'] = $ligne->nombrechambre;
			$tab['loyerParJour'] = $ligne->loyerparjour;
			$tab['idquartier'] = $ligne->idquartier;	
			$tab['description'] = $ligne->descrption;	
		}
		return $tab;
	}

	function getNomTypeHabitation($idType){
		$connexion=connectPostgress();
		$requette="select * from typeHabitation where idType=".$idType;
		$resultats=$connexion->query($requette);
		$resultats->setFetchMode(PDO::FETCH_OBJ);
		while($ligne = $resultats->fetch() ) // on récupère la liste des membres
		{
			$nomType = $ligne->nomtype;	
		}
		return $nomType;
	}

	function getNomQuartier($idQuartier){
		$connexion=connectPostgress();
		$requette="select * from quartier where idQuartier=".$idQuartier;
		$resultats=$connexion->query($requette);
		$resultats->setFetchMode(PDO::FETCH_OBJ);
		while($ligne = $resultats->fetch() ) // on récupère la liste des membres
		{
			$nomQuartier = $ligne-> nomquartier;	
		}
		return $nomQuartier;
	}

	function disponibilite($id){
		$connexion=connectPostgress();
		$sql="SELECT datedebut, dateFin from habitation join disponibilite on habitation.idHabitation=disponibilite.idHabitation where habitation.idHabitation=".$id;
		// echo $sql;
		$liste=array();
		$i=0;
		$request=$connexion->query($sql);
		$request->setFetchMode(PDO::FETCH_OBJ);
		while ($ligne= $request->fetch()) {
			$liste[$i]['datedebut']=$ligne->datedebut;
			$liste[$i]['datefin']=$ligne->datefin;
			$i++;
		}
		return $liste;
	}
	
	function reservationValide($id,$idClient,$dateDebut,$datefin){
		$connexion=connectPostgress();
		$sql="select * from disponibilite where datedebut>='".$dateDebut."' and datefin<='".$datefin."' and idClient=".$idClient." and idhabitation=".$id;
		// echo $sql;
		$count = 0;
		$request=$connexion->query($sql);
		while($ligne=$request->fetch()){
			$count++;
		}
		$valided=0;
		if ($count==0) {
			$valided=1;
		}
		return $valided;
	}

	function tarif($id,$datedebut,$datefin){
		$connexion=connectPostgress();
		$sql="SELECT loyerParJour from habitation where idHabitation=".$id;
		echo $sql;
		$request = $connexion->query($sql);
		$request->setFetchMode(PDO::FETCH_OBJ);
		$prix = 0;
		while($ligne=$request->fetch()){
			$prix = $ligne->loyerparjour;
		}
		date_default_timezone_set('Europe/London');
		$datedebut=strtotime($datedebut);
		$datefin=strtotime($datefin);
		$diff = abs($datefin - $datedebut);
		$years = floor($diff / (365*60*60*24));
		$months = floor(($diff - $years * 365*60*60*24)/ (30*60*60*24));
		$days = floor(($diff - $years * 365*60*60*24 -$months*30*60*60*24)/ (60*60*24));
		$tarif = $prix * $days;
		return $tarif;
	}

	function reservation($id,$idClient,$datedebut, $datefin,$tarif){
		$connexion=connectPostgress();
		$sql="INSERT into disponibilite values(".$id.",".$idClient.",'".$datedebut."','".$datefin."',".$tarif.")";
		echo $sql;
		$connexion->exec($sql);
	}

	function ajoutPhoto($idHabitat, $photo1, $photo2, $photo3, $photo4, $photo5){
		$connexion=connectPostgress();
		$tab=array();
		$tab[0]="INSERT INTO photos(idHabitation,photo)  VALUES (".$idHabitat.",'".$photo1."')";
		$tab[1]="INSERT INTO photos(idHabitation,photo)  VALUES (".$idHabitat.",'".$photo2."')";
		$tab[2]="INSERT INTO photos(idHabitation,photo)  VALUES (".$idHabitat.",'".$photo3."')";
		$tab[3]="INSERT INTO photos(idHabitation,photo)  VALUES (".$idHabitat.",'".$photo4."')";
		$tab[4]="INSERT INTO photos(idHabitation,photo)  VALUES (".$idHabitat.",'".$photo5."')";
		for($i=0;$i<5;$i++){
			$connexion->exec($tab[$i]);
		}
	}


	function ajoutHabitation($idType,$nombreChambre,$loyerParJour,$idQuartier,$description){
		$connexion=connectPostgress();
		$insert="INSERT INTO habitation(idType,nombreChambre,loyerParJour,idQuartier,descrption) VALUES (".$idType.",".$nombreChambre.",".$loyerParJour.",".$idQuartier.",'".$description."')";
		echo $insert;
		$connexion->exec($insert);
	}

	function updateHabitat($idHabitat,$idType,$nombreChambre,$loyerParJour,$idQuartier,$description){
		$connexion=connectPostgress();
		$requete= "UPDATE habitation set idType=".$idType.", nombreChambre=".$nombreChambre.", loyerParJour=".$loyerParJour.", idQuartier=".$idQuartier.", descrption='".$description."' WHERE idHabitation=".$idHabitat." ";
		$connexion->exec($requete);
	}

	function suppressionHabitat($idHabitat){
		$connexion=connectPostgress();
		$requete= "DELETE from photos where idHabitation=".$idHabitat."";
		$connexion->exec($requete);
		$requete= "DELETE from disponibilite where idHabitation=".$idHabitat."";
		$connexion->exec($requete);
		$requete= "DELETE from habitation where idHabitation=".$idHabitat."";
		$connexion->exec($requete);
	}

	function getlisteTypeHabitation(){
		$connexion=connectPostgress();
		$requete="SELECT * from typeHabitation order by idType asc";
		$resultats=$connexion->query($requete);
		$resultats->setFetchMode(PDO::FETCH_OBJ);
		$i=0;
		$tab = array();
		while($ligne = $resultats->fetch() )
		{
			$tab[$i]['idType'] = $ligne->idtype;
			$tab[$i]['nomType'] = $ligne->nomtype;
			$i++;
		}
		return $tab;
	}

	function getlisteQuartier(){
		$connexion=connectPostgress();
		$requete="SELECT * from quartier order by idQuartier asc";
		$resultats=$connexion->query($requete);
		$resultats->setFetchMode(PDO::FETCH_OBJ);
		$i=0;
		$tab = array();
		while($ligne = $resultats->fetch() )
		{
			$tab[$i]['idQuartier'] = $ligne->idquartier;
			$tab[$i]['nomQuartier'] = $ligne->nomquartier;
			$i++;
		}
		return $tab;
	}

	function rechercheAvance($idType,$idQuartier,$description){
		$connexion=connectPostgress();
		$tab = array();
		$requete="select * from habitation where idType=".$idType." or idQuartier=".$idQuartier." or (description like '%".$description."%')"; 
		$resultats=$connexion->query($requete);
		$resultats->setFetchMode(PDO::FETCH_OBJ);
		$i=0;
		$tab = array();
		while($ligne = $resultats->fetch() )
		{
			$tab['idHabitation'] = $ligne->idhabitation;
			$tab['idtype'] = $ligne->idtype;
			$tab['nombreChambre'] = $ligne->nombrechambre;
			$tab['loyerParJour'] = $ligne->loyerparjour;
			$tab['idquartier'] = $ligne->idquartier;	
			$tab['description'] = $ligne->descrption;	
			$i++;
		}
		return $tab;
	}
?>