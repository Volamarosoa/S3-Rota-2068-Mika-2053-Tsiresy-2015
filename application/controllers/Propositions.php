<?php 
    if ( ! defined('BASEPATH')) exit('No direct script access allowed');
    class Propositions extends CI_Controller {
        public function __construct() {
            parent::__construct();
            $this->load->library('session');
            if(!$this->session->has_userdata('mail')){
                redirect("Login/index");
            }
        }

        public function listesDeVosObjets($idObjet) {
            $this->load->library('session');
            $donne = array();
            $donne = $this->session->flashdata("donnees");
            $this->load->model('Objet');
            $this->load->model('Categorie');
            $data = array();
            $idUtilisateur = $donne['id'];
            $data['categorie'] = $this->Categorie->listesCategorie();
            $data['article'] = $this->Objet->listesDesObjestParUtilisateur($idUtilisateur) ;
            $data['idObjet'] = $idObjet;
            $this->load->view('pages/ObjetProposer', $data);
        }

        public function article() {
            $this->load->view('pages/Article');
        }

        public function faireEchange($idObjet1, $idObjet2) {
            $this->load->model('Proposition', 'pro');
            $this->pro->echange($idObjet1, $idObjet2);
            redirect("Article/index");
        }

        public function listesDesProposition() {
            $this->load->library('session');
            $donne = array();
            $donne = $this->session->flashdata("donnees");
            $idUtilisateur = $donne['id'];
            $this->load->model('Proposition');
            $data['proposition']  = $this->Proposition->listeProposition($idUtilisateur);
            $this->load->view('pages/listesDesProposition', $data);
        }

        public function refuserEchange($idProposition) {
            $this->load->model('Proposition');
            $this->Proposition->refuserEchange($idProposition);
            redirect("Propositions/listesDesProposition");
        }

        public function accepterEchange($idProposition) {
            $this->load->model('Proposition');
            $this->load->model('HistoriquePropietaire');
            $this->load->model('Objet');
            $donne = $this->Proposition->donneesUneProposition($idProposition);
            $this->HistoriquePropietaire->creerHistorique($donne['idobjet1'], $donne['idutilisateur1'], $donne['idutilisateur2']);
            $this->HistoriquePropietaire->creerHistorique($donne['idobjet2'], $donne['idutilisateur2'], $donne['idutilisateur1']);
            $this->Proposition->accepterEchange($idProposition);
            $this->Objet->updateProprietaite($donne['idobjet1'], $donne['idutilisateur2']);
            $this->Objet->updateProprietaite($donne['idobjet2'], $donne['idutilisateur1']);
            redirect("Propositions/listesDesProposition");
        }

        public function listesDeMesProposition() {
            $this->load->library('session');
            $donne = array();
            $donne = $this->session->flashdata("donnees");
            $idUtilisateur = $donne['id'];
            $this->load->model('Proposition');
            $data['proposition']  = $this->Proposition->listesDeMesPropositons($idUtilisateur);
            $this->load->view('pages/listesDeMesPropositon', $data);
        }

        public function annulerEchange($idProposition) {
            $this->load->model('Proposition');
            $this->Proposition->annulerEchange($idProposition);
            redirect("Propositions/listesDeMesProposition");
        }

        


    }
?>