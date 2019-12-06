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
        $this->db->distinct()
                ->like('nom_commune', $term,'after')
                ->like('code_postal',$term,'after')
                ->where('latitude',null,FALSE);
                
        
        
        $data = $this->db->get("villes")->result();

      
       echo json_encode($data);
    }

}
