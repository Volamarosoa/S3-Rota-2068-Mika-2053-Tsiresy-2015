<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Utilisateur extends CI_Model {

        public function checkClientExist($mail, $pswd) {
            $requette = "select * from utilisateur where mail='%s' and motdepasse='%s'";
            $requette = sprintf($requette, $mail, $pswd);
            $query = $this->db->query($requette);            
            $count = 0;
            $tab = array();
            foreach($query->result_array() as $row){
                $tab = $row;
                $count = 2;
            }
            $tab['count'] = $count;
            
            return $tab;
        }

        public function checkSuperUtilisateur($mail, $pswd) {
            $requette = "select * from administrateur where mail='%s' and motdepasse='%s'";
            $requette = sprintf($requette, $mail, $pswd);
            $query = $this->db->query($requette);
            $count = 0;
            $tab = array();
            foreach($query->result_array() as $row){
                $tab = $row;
                $count = 1;
            }
            $tab['count'] = $count;
            
            return $tab;
        }


        public function ckechCompteExist($mail, $pswd) {
            $tab = $this->checkClientExist($mail, $pswd);
            if($tab['count'] == 0){
                $tab = $this->checkSuperUtilisateur($mail, $pswd);
            }
            return $tab;
        }

        public function creerUtilisateur($nom, $prenom, $mail, $pswd, $contact, $idGenre) {
            $requette = "INSERT INTO utilisateur(nom, prenom, mail, motdepasse, contact, idGenre) values ('%s', '%s', '%s', '%s', %d, %d)";
            $requette = sprintf($requette, $nom, $prenom, $mail, $pswd, $contact, $idGenre);
            $this->db->query($requette);
        }

        public function testCompteMailExisteDeja($mail, $pswd) {
            $requette = "select id from utilisateur where mail='%s' or (mail='%s' and motdepasse='%s')";
            $requette = sprintf($requette, $mail, $mail, $pswd);
            $query = $this->db->query($requette);            
            $id = 0;
            foreach($query->result_array() as $row){
                $id = $row['id'];
            }          
            return $id;
        }

        

    }
?>