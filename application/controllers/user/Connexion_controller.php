<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Connexion_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
    }
    public function index() {
        echo 'je suis le sign in  controller';
    }
}

