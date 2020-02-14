<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inscription_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Inscription_controller extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->database();
        $this->load->library('session');
    }

    public function index() {
        $this->load->view('layout/header');
        $this->load->view('user/Inscription_view');
        $this->load->view('layout/footer');
    }

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

            $genre = $this->input->post('genre');
            if ($genre === 'Femme') {
                $genre = 1;
            } else {
                $genre = 2;
            }

            $nom = $this->input->post('nom');
            $prenom = $this->input->post('prenom');
            $anniv = $this->input->post('dateNaiss');
            $email = $this->input->post('email');
            $tel = $this->input->post('tel');
            $pass = $this->input->post('pass');

            $anniv = date_format(new DateTime($anniv), "Y-m-d");


            //On vérifie que l'utilisateur n'existe pas avec son email.
            $userModel = new Users_model();
            $isuserExist = $userModel->checkIfUserEvists($email);

            //isUserExist renvoit TRUE si l'utilisateur existe déjà.
            if ($isuserExist) {

                $this->session->set_flashdata('err', 'Vous semblez déjà posséder un compte.');
                $this->load->view('layout/header');
                $this->load->view('user/Inscription_view');
            } else {

                //On vérifie si l'utilisateur est majeur/
                //renvoit false si l'utilisateur est mineur
                $isOldEnoought = $this->validateAge($anniv);

                if (!$isOldEnoought) {

                    $this->session->set_flashdata('err', 'Vous devez être majeur pour pouvoir vous inscrire.');
                    $this->load->view('layout/header');
                    $this->load->view('user/Inscription_view');
                    $this->load->view('layout/footer');
                } else {


                    //on hash le mot de passe
                    $hash = md5($pass);

                    //envoi de la requête
                    $res = $userModel->registerUser($genre, $nom, $prenom, $email, $tel, $hash, $anniv);
                    if ($res != false) {

                        $this->session->set_userdata('connected', true);
                        $this->session->set_userdata('userId', $res);

                        redirect('Welcome');
                    } else {
                        redirect('Welcome');
                    }
                }
            }
        } else {
            $this->session->set_flashdata('flashError', 'Sorry Google Recaptcha Unsuccessful!!');
            $this->load->view('layout/header');
            $this->load->view('user/Inscription_view');
            $this->load->view('layout/footer');
        }
    }

    // validate birthday
    public function validateAge($anniv, $age = 18) {
        // $birthday can be UNIX_TIMESTAMP or just a string-date.
        if (is_string($anniv)) {
            $anniv = strtotime($anniv);
        }

        // check
        // 31536000 is the number of seconds in a 365 days year.
        if (time() - $anniv < $age * 31536000) {
            return false;
        }

        return true;
    }

}


    public function index() {
        $this->load->view('layout/header');
        $this->load->view('user/Inscription_view');
        $this->load->view('layout/footer');
    }

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

            $genre = $this->input->post('genre');
            if ($genre === 'Femme') {
                $genre = 1;
            } else {
                $genre = 2;
            }

            $nom = $this->input->post('nom');
            $prenom = $this->input->post('prenom');
            $anniv = $this->input->post('dateNaiss');
            $email = $this->input->post('email');
            $tel = $this->input->post('tel');
            $pass = $this->input->post('pass');

            $anniv = date_format(new DateTime($anniv), "Y-m-d");


            //On vérifie que l'utilisateur n'existe pas avec son email.
            $userModel = new Users_model();
            $isuserExist = $userModel->checkIfUserEvists($email);

            //isUserExist renvoit TRUE si l'utilisateur existe déjà.
            if ($isuserExist) {

                $this->session->set_flashdata('err', 'Vous semblez déjà posséder un compte.');
                $this->load->view('layout/header');
                $this->load->view('user/Inscription_view');
            } else {

                //On vérifie si l'utilisateur est majeur/
                //renvoit false si l'utilisateur est mineur
                $isOldEnoought = $this->validateAge($anniv);

                if (!$isOldEnoought) {

                    $this->session->set_flashdata('err', 'Vous devez être majeur pour pouvoir vous inscrire.');
                    $this->load->view('layout/header');
                    $this->load->view('user/Inscription_view');
                } else {


                    //on hash le mot de passe
                    $hash = md5($pass);

                    //envoi de la requête
                    $res = $userModel->registerUser($genre, $nom, $prenom, $email, $tel, $hash, $anniv);
                    if ($res != false) {

                        $this->session->set_userdata('connected', true);
                        $this->session->set_userdata('userId', $res);

                        redirect('Welcome');
                    } else {
                        redirect('Welcome');
                    }
                }
            }
        } else {
            $this->session->set_flashdata('flashError', 'Sorry Google Recaptcha Unsuccessful!!');
        }
    }

    // validate birthday
    public function validateAge($anniv, $age = 18) {
        // $birthday can be UNIX_TIMESTAMP or just a string-date.
        if (is_string($anniv)) {
            $anniv = strtotime($anniv);
        }

        // check
        // 31536000 is the number of seconds in a 365 days year.
        if (time() - $anniv < $age * 31536000) {
            return false;
        }

        return true;
    }

}
