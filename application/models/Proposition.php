<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Proposition extends CI_Model {

        public function echange($idObjet1, $idObjet2) {
            $requette = "INSERT INTO proposition(idobjet1, dateenvoie, idobjet2, datereponse) values (%d, now(), %d, null)";
            $requette = sprintf($requette, $idObjet1, $idObjet2);
            $this->db->query($requette);
        }

        public function listeProposition($idUtilisateur) {
            $this->load->model('Utilisateur');
            $this->load->model('Objet');
            $requette = "select p.*, o.idcategorie, titre, descriptions, tarif from proposition p join objet o on p.idobjet2=o.id where idutilisateur=%d and confirmer=0 and accepter=0 and annuler=0";
            $requette = sprintf($requette, $idUtilisateur);
            $query = $this->db->query($requette);     
            $tab = array();
            $count = 0;
            foreach($query->result_array() as $row){
                $proposition = $row;
                $tab[$count]['proposition'] = $proposition;
                $tab[$count]['objet1'] = $this->Objet->donneesUnObjet($proposition['idobjet1']);
                $tab[$count]['objet2'] = $this->Objet->donneesUnObjet($proposition['idobjet2']);
                $count++;
            }
            return $tab;
        }

        public function refuserEchange($idProposition) {
            $requette = "update proposition set datereponse=now(), confirmer=1 where id=%d";
            $requette = sprintf($requette, $idProposition);
            $this->db->query($requette);
        }

        public function accepterEchange($idProposition) {
            $requette = "update proposition set datereponse=now(), confirmer=1, accepter=1 where id=%d";
            $requette = sprintf($requette, $idProposition);
            echo $requette;
            $this->db->query($requette);
        }

        public function donneesUneProposition($idProposition) {
            $requette = "select p.id, p.idobjet1, ob.idutilisateur idutilisateur1,p.idobjet2, o.idutilisateur idutilisateur2 from proposition p join (select id, idutilisateur from objet) ob on p.idobjet1=ob.id join (select id, idutilisateur from objet) o on p.idobjet2=o.id where p.id=%d";
            $requette = sprintf($requette, $idProposition);
            $query = $this->db->query($requette);     
            $tab = array();
            $count = 0;
            foreach($query->result_array() as $row){
                $tab = $row;
            }
            return $tab;
        }
       
        public function listesDeMesPropositons($idUtilisateur) {
            $this->load->model('Utilisateur');
            $this->load->model('Objet');
            $requette = "select p.*, o.idcategorie, titre, descriptions, tarif from proposition p join objet o on p.idobjet1=o.id where idutilisateur=%d and confirmer=0 and accepter=0 and annuler=0";
            $requette = sprintf($requette, $idUtilisateur);
            $query = $this->db->query($requette);     
            $tab = array();
            $count = 0;
            foreach($query->result_array() as $row){
                $proposition = $row;
                $tab[$count]['proposition'] = $proposition;
                $tab[$count]['objet1'] = $this->Objet->donneesUnObjet($proposition['idobjet1']);
                $tab[$count]['objet2'] = $this->Objet->donneesUnObjet($proposition['idobjet2']);
                $count++;
            }
            return $tab;
        }

        public function annulerEchange($idProposition) {
            $requette = "update proposition set annuler=1 where id=%d";
            $requette = sprintf($requette, $idProposition);
            $this->db->query($requette);
        }

    }
?>