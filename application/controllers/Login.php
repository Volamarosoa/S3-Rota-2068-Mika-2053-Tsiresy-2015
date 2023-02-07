<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Login extends CI_Controller {

        public function __construct() {
           parent::__construct();
        }

        //connecter
        // public function index() {
        //     if($erreur = $this->input->get('erreur')){
        //         $this->load->library('session');
        //         $data['erreur'] = $erreur;
        //         $this->load->view('pages/Login', $data);
        //     }
        //     else{
        //         $this->load->view('pages/Login');
        //     }
            
        // }

        public function index() {
            $this->load->view('PremierAccueil');    
        }

        public function singIn() {
            if($erreur = $this->input->get('erreur')){
                $this->load->library('session');
                $data['erreur'] = $erreur;
                $this->load->view('pages/Login', $data);
            }
            else{
                $this->load->view('pages/Login');
            }
        }

        // public function singUp() {
        //     $this->load->view('pages/inscription');    
        // }
    
        public function login(){
            $this->load->helper('Login_helper');
            $this->load->helper('email_helper');
            $this->load->model('Utilisateur');
            $mail = $this->input->post('mail');
            $pswd = $this->input->post('pswd');
            $tab =  $this->Utilisateur->ckechCompteExist($mail, $pswd);
            if(checkCompte($tab)){
                $this->load->library('session');
                $this->session->set_flashdata("donnees" ,$tab);
                $_SESSION['mail'] = $mail;
                redirect("Connexion/accueil");
                echo "True";
            }
            else{
                $erreur = "Erreur de e-mail ou bien mot de pass invalide";
                redirect("Login/singIn?erreur=".$erreur);
                echo "False";
            }
        }

        public function deconnecter(){
            session_destroy();
            redirect("Login/index");
        }

        
     }

?>