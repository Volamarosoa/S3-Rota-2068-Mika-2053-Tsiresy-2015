<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Objet extends CI_Model {

        public function listeObjetParCategorie($idCategorie) {
            $requette = "select * from objet where idcategorie=%d";
            $requette = sprintf($requette, $idCategorie);
            $query = $this->db->query($requette);     
            $tab = array();
            foreach($query->result_array() as $row){
                $tab[] = $row;
            }
            
            return $tab;
        }

        public function listesDesObjest() {
            $this->load->model('Categorie');
            $this->load->model('Utilisateur');
            $this->load->model('Photo');
            $data = array();
            $idCategorie = $this->Categorie->listesCategorie();
            $count = 0;
            for($i=0; $i<count($idCategorie); $i++) {
                $tab = $this->listeObjetParCategorie($idCategorie[$i]['id']);
                for($j=0; $j<count($tab); $j++) {
                    $data[$count]['article'] = $tab[$j];
                    $data[$count]['nomcategorie'] = $idCategorie[$i]['nomcategorie'];
                    $data[$count]['utilisateur'] = $this->Utilisateur->donneesUnUtilisateur($tab[$j]['idutilisateur']);
                    $data[$count]['photo'] = $this->Photo->listePhotoParObjet($tab[$j]['id']);
                    $count++;
                }
            }
            return $data;
        }

        public function donneesUnObjet($idObjet) {
            $this->load->model('Utilisateur');
            $requette = " select * from objet join categorie on objet.idcategorie=categorie.id  where objet.id=%d";
            $requette = sprintf($requette, $idObjet);
            $query = $this->db->query($requette);     
            $tab = array();
            foreach($query->result_array() as $row){
                $valeur = $row;
                $tab['article'] = $valeur;
                $tab['utilisateur'] = $this->Utilisateur->donneesUnUtilisateur($valeur['idutilisateur']);
            }
            return $tab;
        }

        public function obejtParUtilisateur($idUtilisateur, $idCategorie) {
            $this->load->model('Utilisateur');
            $requette = "select * from objet where idutilisateur=%d and idcategorie=%d";
            $requette = sprintf($requette, $idUtilisateur, $idCategorie);
            $query = $this->db->query($requette);     
            $tab = array();
            foreach($query->result_array() as $row){
                $tab[] = $row;
            }
            return $tab;
        }

        public function listesDesObjestParUtilisateur($idUtilisateur) {
            $this->load->model('Categorie');
            $this->load->model('Utilisateur');
            $this->load->model('Photo');
            $data = array();
            $idCategorie = $this->Categorie->listesCategorie();
            $count = 0;
            for($i=0; $i<count($idCategorie); $i++) {
                $tab = $this->obejtParUtilisateur($idUtilisateur, $idCategorie[$i]['id']);
                for($j=0; $j<count($tab); $j++) {
                    $data[$count]['article'] = $tab[$j];
                    $data[$count]['nomcategorie'] = $idCategorie[$i]['nomcategorie'];
                    $data[$count]['utilisateur'] = $this->Utilisateur->donneesUnUtilisateur($tab[$j]['idutilisateur']);
                    $data[$count]['photo'] = $this->Photo->listePhotoParObjet($tab[$j]['id']);
                    $count++;
                }
            }
            return $data;
        }

        public function updateProprietaite($idObjet, $idUtilisateur) {
            $requette = "update objet set idutilisateur=%d where id=%d";
            $requette = sprintf($requette, $idUtilisateur, $idObjet);
            $this->db->query($requette);
        }

        public function listesArticleAvecPrixEstimatif($idUtilisateur, $prixMin, $prixMax) {
            $requette = " select o.*, nomcategorie from objet o join categorie c on o.idcategorie=c.id where (tarif>= (%d) or tarif <=(%d)) and idutilisateur!=%d;";
            $requette = sprintf($requette, $prixMin, $prixMax, $idUtilisateur);
            $query = $this->db->query($requette);     
            $tab = array();
            foreach($query->result_array() as $row){
                $tab[] = $row;
            }
            return $tab;
        }

        public function listesArticlePrixEstimatif($idUtilisateur, $prixMin, $prixMax, $prix) {
            $this->load->model('Categorie');
            $this->load->model('Utilisateur');
            $this->load->model('Photo');
            $data = array();
            $idCategorie = $this->Categorie->listesCategorie();
            $count = 0;
            $tab = $this->listesArticleAvecPrixEstimatif($idUtilisateur, $prixMin, $prixMax);
            for($j=0; $j<count($tab); $j++) {
                $data[$count]['article'] = $tab[$j];
                $data[$count]['nomcategorie'] = $tab[$j]['nomcategorie'];
                $data[$count]['utilisateur'] = $this->Utilisateur->donneesUnUtilisateur($tab[$j]['idutilisateur']);
                $data[$count]['photo'] = $this->Photo->listePhotoParObjet($tab[$j]['id']);
                $prixP = ($tab[$j]['tarif'] - $prix)/ 100;
                $data[$count]['pourcentage'] = $prixP;
                $count++;
            }
            
            return $data;
        }

        public function calculPrix($idObjet, $taux) {
            $donne = $this->donneesUnObjet($idObjet);
            $tarif = $donne['article']['tarif'];
            $tab = array();
            if($taux == 10){
                $tab[0] = $tarif - 1000;
                $tab[1] = $tarif + 1000;
            }
            else if($taux == 20) {
                $tab[0] = $tarif - 2000;
                $tab[1] = $tarif + 2000;
            }
            $tab[2] = $tarif;
            return $tab;
        }

        

        

    }
?>


