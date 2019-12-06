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

        
        $query = $this->db->query("SELECT * FROM villes WHERE nom_commune LIKE '{$term}%'OR code_postal LIKE '{$term}%'HAVING latitude IS NOT NULL");
        $data = $query->result();

      
       echo json_encode($data);
    }

}
