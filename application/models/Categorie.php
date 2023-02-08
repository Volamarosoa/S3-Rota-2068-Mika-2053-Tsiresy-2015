<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Categorie extends CI_Model {

        public function listesCategorie() {
            $requette = "select * from categorie";
            $query = $this->db->query($requette);            
            $count = 0;
            $tab = array();
            foreach($query->result_array() as $row){
                $tab[] = $row;
            }
            
            return $tab;
        }

        

    }
?>