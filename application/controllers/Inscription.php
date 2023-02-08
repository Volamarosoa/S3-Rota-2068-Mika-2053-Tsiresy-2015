<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');

    class Inscription extends CI_Controller {

        public function __construct() {
           parent::__construct();
        }

        public function index() {
           
            if($erreur = $this->input->get('erreur')){
                $this->load->library('session');
                $data['erreur'] = $erreur;
                $this->load->view('pages/inscription', $data);   
            }
            else{
                $this->load->view('pages/inscription');   
            } 
        }

        public function inscription() {
            $this->load->helper('Login_helper');
            $this->load->model('Utilisateur');
            $nom = $this->input->post('nom');
            $prenom = $this->input->post('prenom');
            $genre = $this->input->post('genre');
            $contact = $this->input->post('contact');
            $mail = $this->input->post('mail');
            $psw1 = $this->input->post('psw1');
            $psw2 = $this->input->post('psw2');
            if(memePswd($psw1, $psw2)==false) {
                $erreur = "Verifier votre mot de passe";
                redirect("Inscription?erreur=". $erreur);
            }
            $id = $this->Utilisateur->testCompteMailExisteDeja($mail, $psw2);
            if(compteExist($id)) {
                $erreur = "Cette compte existe deja!";
                redirect("Inscription?erreur=". $erreur);
            }
            $this->Utilisateur->creerUtilisateur($nom, $prenom, $mail, $psw2, $contact, $genre);
            redirect("Login/singIn");
        }

        
     }

?>