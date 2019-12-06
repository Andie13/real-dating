<?php

class Ajax_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url_helper');
        $this->load->helper('form');
        $this->load->database();
    }

    public function autocomplete() {
        $this->load->view('jquery-ui-autocomplete');
    }

    public function search() {

        $term = $this->input->get('term');    
	    $query = ("select * from villes where nom_commune like '$term%' 
		      or code_postal like '$term%' and latitude not like 'NULL'");

      $data = $this->$query->get()->result();
       echo json_encode($data);
    }

}
