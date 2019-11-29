<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    public function index() {


        $this->load->view('layout/header');
        if ($this->session->connected) {

            $data = array(
                'userId' => $this->session->userId,
                'connected' => $this->session->connected,
            );

            $this->load->view('accueil_view', $data);
        } else {
            $this->load->view('accueil_view');
        }
        $this->load->view('layout/footer');
    }

    public function testVilles() {
        $villesModel = new Villes_model();
        $villesModel->getVilles('Marseille');
    }
    
    public function gotoAbout() {
        
        $this->load->view('layout/header');
        $this->load->view('about_view');
        $this->load->view('layout/footer');
        
    }
	public function gotoLegal() {
        
        $this->load->view('layout/header');
        $this->load->view('legal_view');
        $this->load->view('layout/footer');
        
    }
	public function gotoCGU() {
        
        $this->load->view('layout/header');
        $this->load->view('cgu_view');
        $this->load->view('layout/footer');
        
    }
	public function gotoConcept() {
        
        $this->load->view('layout/header');
        $this->load->view('concept_view');
        $this->load->view('layout/footer');
        
    }
	

}
