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
       	$this->db->where("nom_commune like .term.'%'")
		->where("code_postal like .term.'%'")
		->where("latitude not like 'NULL'");
                
        
        
        $data = $this->db->get("villes")->result();

      
       echo json_encode($data);
    }

}
