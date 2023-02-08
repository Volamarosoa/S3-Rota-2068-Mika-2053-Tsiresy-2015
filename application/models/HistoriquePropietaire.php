<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class HistoriquePropietaire extends CI_Model {

        public function creerHistorique($idobjet, $idproprietaireavant, $idproprietaireapres) {
            $requette = "INSERT INTO historiquePropietaire values(%d, %d, %d, now())";
            $requette = sprintf($requette, $idobjet, $idproprietaireavant, $idproprietaireapres);
            $this->db->query($requette);
        }

        

    }
?>