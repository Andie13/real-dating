<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class FormController_controller extends CI_Controller {

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
        $this->load->library('session');
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function index() {
        $this->load->view('layout/header');
        $this->load->view('formPost');
        $this->load->view('layout/footer');
    }

    /**
     * Get All Data from this method.
     *
     * @return Response
     */
    public function formPost() {
        $recaptchaResponse = trim($this->input->post('g-recaptcha-response'));

        $userIp = $this->input->ip_address();

        $secret = $this->config->item('google_secret');

        $url = "https://www.google.com/recaptcha/api/siteverify?secret=" . $secret . "&response=" . $recaptchaResponse . "&remoteip=" . $userIp;

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        $output = curl_exec($ch);
        curl_close($ch);

        $status = json_decode($output, true);

        if ($status['success']) {
            redirect('welcome');
        } else {
            $this->session->set_flashdata('flashError', 'Sorry Google Recaptcha Unsuccessful!!');
        }

       // redirect('form', 'refresh');
    }

}
