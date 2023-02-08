<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Photo extends CI_Model {

        public function listePhotoParObjet($idObjet) {
            $requette = "select * from photo where idobjet=%d";
            $requette = sprintf($requette, $idObjet);
            $query = $this->db->query($requette);     
            $tab = array();
            foreach($query->result_array() as $row){
                $tab[] = $row;
            }
            
            return $tab;
        }

        

    }
?>