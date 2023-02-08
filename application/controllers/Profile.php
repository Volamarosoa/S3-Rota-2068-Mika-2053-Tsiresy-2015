<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Profile extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->library('session');
            if(!$this->session->has_userdata('mail')){
                redirect("Login/index");
            }
        }

        public function profile() {
            $this->load->library('session');
            $data = array();
            $data = $this->session->flashdata("donnees");
            $this->load->view('pages/profil', $data);
        }
    }
?>