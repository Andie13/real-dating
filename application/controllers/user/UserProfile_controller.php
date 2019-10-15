<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class UserProfile_controller extends CI_Controller {

    public function __construct() {

        parent::__construct();
        $this->load->library('email', 'session');
    }

    public function index() {
        $this->load->view('layout/header');

        if ($this->session->connected) {

            $user = $this->getUserInfo($this->session->userId);
            if (!$user == FALSE) {
                $datas['user'] = $user;
            }
            
            $age = $this->calculAge($user->anniv_user);
            
            $eventsArray = $this->getEventUser($this->session->userId);
            if(!$eventsArray == FALSE){
                 $datas['events'] = $eventsArray;
            }
            
            $genre = $this->getUserGenre($user->genre_user);
            
            
            
            if(!$genre == NULL){
                if($genre->nom_genre =='Femme'){
                    $datas['genre'] = 'Mme';
                }else if($genre-> nom_genre =='Homme'){
                     $datas['genre'] = 'M.';
                }
                
            }
            


            $datas['userId'] = $this->session->userId;
            $datas['connected'] = $this->session->connected;
            $datas['age'] = $age;

            $this->load->view('user/userProfile_view', $datas);
        } else {
            $this->load->view('accueil_view');
        }
    }

    public function getUserInfo($id) {

        $userModel = new Users_model();
        return $userModel->getUserById($id);
    }

    public function getEventUser($id) {
        
        $eventModel = new Events_model();
        $events = $eventModel->getEventByUserId($this->session->userId);
        if(!$events==FALSE){
            return $events;
        }else{
            return FALSE;
        }
        
    }
    
    public function getUserGenre($idGenre) {
         $userModel = new Users_model();
         return $userModel->getGenreNameById($idGenre);
    }

    public function getPreferences($id) {
        
    }

    public function changeEmail() {
        $email = $this->input->post('email');
        
         $userModel = new Users_model();
         $res = $userModel->changeEmailFromUser($this->session->userId, $email);
         if($res){
              $this->session->set_flashdata('success', 'Votre email à été changé avec succès.');
                redirect('user/UserProfile_controller');
           
         }else{
              $this->session->set_flashdata('err', 'adresse email n\'a pu être changé');
                redirect('user/UserProfile_controller');
           
         }
        
        
        
    }
    public function changeTel() {
        $tel = $this->input->post('tel');
        
         $userModel = new Users_model();
         $res = $userModel->changeTelFromUser($this->session->userId, $tel);
         if($res){
              $this->session->set_flashdata('success', 'Votre N° tde téléphone à été changé avec succès.');
                redirect('user/UserProfile_controller');
           
         }else{
              $this->session->set_flashdata('err', 'Votre Numéro de téléphone n\'a pu êre mis à jour.');
                redirect('user/UserProfile_controller');
           
         }
        
        
        
    }
    public function resetPassword() {

        $oldPassword = $this->input->post('old_pass');
        
        $hash = md5($oldPassword);

        $newPassword = $this->input->post('new_pass');
        $hashNew = md5($newPassword);

        // on vérifie que l'ancien mot de passe soit correct
        $user = $this->getUserInfo($this->session->userId);
        $userModel = new Users_model();

        //row est l'user correspondant
        $row = $userModel->loginUser($user->email_user, $hash);

        if (!$row === FALSE) {
            
            $isPassChanged = $userModel->changePassword($user->email_user, $hashNew);
            if ($isPassChanged) {
                $this->session->set_flashdata('success', 'Votre nouveau mot de passe à été changé avec succès.');
                redirect('user/UserProfile_controller');
            }
        }
    }

    public function calculAge($date) {

        $age = date('Y') - date('Y', strtotime($date));

        if (date('md') < date('md', strtotime($date))) {

            return $age - 1;
        }

        return $age;
    }

}
