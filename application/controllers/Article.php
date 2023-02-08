<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Article extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->library('session');
            if(!$this->session->has_userdata('mail')){
                redirect("Login/index");
            }
        }

        public function index() {
            $this->load->model('Objet');
            $this->load->model('Categorie');
            $data = array();
            $data['categorie'] = $this->Categorie->listesCategorie();
            $data['article'] = $this->Objet->listesDesObjest();
            // var_dump($data['article']);
            $this->load->view('pages/Article', $data);
        }

        public function apropos() {
            $this->load->view('pages/apropos');
        }

        public function descriptionUnObjet() {
            $this->load->model('Objet');
            $idObjet = $this->input->get('id');
            $data['article'] = $this->Objet->donneesUnObjet($idObjet);
            $this->load->view('pages/apropos', $data);
        }

        public function listesMesArticles() {
            $this->load->library('session');
            $donne = array();
            $donne = $this->session->flashdata("donnees");
            $this->load->model('Objet');
            $this->load->model('Categorie');
            $data = array();
            $idUtilisateur = $donne['id'];
            $data['categorie'] = $this->Categorie->listesCategorie();
            $data['article'] = $this->Objet->listesDesObjestParUtilisateur($idUtilisateur) ;
            $this->load->view('pages/PrixArticle', $data);
        }

        public function rechercheArticle($idObjet, $taux) {
            $this->load->model('Objet');
            $this->load->library('session');
            $donne = array();
            $donne = $this->session->flashdata("donnees");
            $idUtilisateur = $donne['id'];
            $prix = $this->Objet->calculPrix($idObjet, $taux);
            redirect("Article/lesArticlesAvecPrix/" . $idUtilisateur . "/" . $prix[0] . "/" . $prix[1]. "/" . $prix[2]);
        }

        public function lesArticlesAvecPrix($idUtilisateur, $prixMin, $prixMax, $prix) {
            $this->load->model('Objet');
            $this->load->model('Categorie');
            $data = array();
            $data['categorie'] = $this->Categorie->listesCategorie();
            $data['article'] = $this->Objet->listesArticlePrixEstimatif($idUtilisateur, $prixMin, $prixMax, $prix);
            $this->load->view('pages/Article', $data);
        }

        
    }
?>
