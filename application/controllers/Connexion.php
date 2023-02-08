<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Connexion extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->library('session');
            if(!$this->session->has_userdata('mail')){
                redirect("Login/index");
            }
        }

        public function accueil() {
            $this->load->library('session');
            $data = array();
            $data = $this->session->flashdata("donnees");
            $this->load->view('pages/page', $data);
        }

        public function article() {
            $this->load->view('pages/Article');
        }
    }
?>