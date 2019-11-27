<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Login_controller extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->library('email', 'session');
    }

    public function index() {

        $this->load->view('layout/header');
        $this->load->view('user/Login_view');
         $this->load->view('layout/footer');
    }

    public function login() {
        $email = $this->input->post('email');
        $pass = $this->input->post('pass');

        //on hash le mot de passe
        $hash = md5($pass);

        $userModel = new Users_model();
        $user = $userModel->loginUser($email, $hash);

//        $user = si user trouvé: un objet user, sinon False

        if (!$user === FALSE) {
            //set session
            $userId = $user->id_user;
            $sessionDatas = array(
                'prenom' => $user->prenom_user,
                'nom' => $user->nom_user,
                'anniv' => $user->anniv_user,
                'email' => $user->email_user,
                'userId' => $user->id_user,
                'connected' => TRUE,
            );

//            $sessionData = $this->session->set_userdata('is_connected', TRUE);
//            $sessionData = $this->session->set_userdata('id_admin', $res);
//            
            $this->session->set_userdata($sessionDatas);


            redirect('welcome');
        } else {

            $this->session->set_flashdata('err', "identifiant ou mot de passe erroné.");
            $this->load->view('layout/header');
            $this->load->view('user/Login_view');
            $this->load->view('layout/footer');
        }
    }

    public function resetPassword() {

        $email = $this->input->post('email');

        $userModel = new Users_model();
        $isuserExist = $userModel->checkIfUserEvists($email);

        if (!$isuserExist) {

            $this->session->set_flashdata('err', 'Vous ne possédez pas de compte.');
            $this->load->view('layout/header');
            $this->load->view('user/Inscription_view');
        } else {
            // génération d'un nouveau mot de passe temporaire
            $newPass = $this->generatePassword(8);

            //For tests : 
            $newPass = '12341234';
//            Comme à l'inscription,  on hash le password
            $md5Pass = md5($newPass);

            //update database with email
            $isPassInserted = $userModel->changePassword($email, $md5Pass);

            if (!$isPassInserted) {

                $this->session->set_flashdata('err', 'Une erreur est survenue, veuillez essayer dans quelques minutes');
                $this->load->view('layout/header');
                $this->load->view('welcome');
            } else {

               
$to      = $email;
$subject = 'Changement de mot de passet';
$message = 'Bonjour, voici votre nouveau mot de passe';
$headers = 'From: anne.perrault@amaris.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

mail($to, $subject, $message, $headers);
//                $this->session->set_flashdata('err', 'Votre mot de passe à été envoyé avec succès. ');
//                $this->load->view('layout/header');
//                $this->load->view('user/Login_view');
            }
        }
    }

    public function generatePassword($_len) {

        $_alphaSmall = 'abcdefghijklmnopqrstuvwxyz';            // small letters
        $_alphaCaps = strtoupper($_alphaSmall);                // CAPITAL LETTERS
        $_numerics = '1234567890';                            // numerics
        $_specialChars = '`~!@#$%^&*()-_=+]}[{;:,<.>/?\'"\|';   // Special Characters

        $_container = $_alphaSmall . $_alphaCaps . $_numerics . $_specialChars;   // Contains all characters
        $password = '';         // will contain the desired pass

        for ($i = 0; $i < $_len; $i++) {                                 // Loop till the length mentioned
            $_rand = rand(0, strlen($_container) - 1);                  // Get Randomized Length
            $password .= substr($_container, $_rand, 1);                // returns part of the string [ high tensile strength ;) ] 
        }

        return $password;       // Returns the generated Pass
    }

    public function logout() {
        $this->session->unset_userdata('connected');
        redirect('welcome');
    }

}
