<?php
defined('BASEPATH') OR exit('No direct script access allowed');
   
class Stripe_controller extends CI_Controller {
    
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function __construct() {
       parent::__construct();
       $this->load->library("session");
       $this->load->helper('url');
    }
    
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
    public function index()
    {
        $this->load->view('layout/header');
        $this->load->view('stripe/my_stripe');
        $this->load->view('layout/footer');

    }
       
    /**
     * Get All Data from this method.
     *
     * @return Response
    */
      public function stripePost() {
        require_once('application/libraries/stripe-php/init.php');
        $id_event = $this->input->get('id');

        $ev = new Events_model();
        $event = $ev->getEventDetailsById($id_event);


        $idUser = $this->session->userId;

        //insert resa to db
        $EventModel = new Events_model();
        $isInsertedDb = $EventModel->insertNewReservation($idUser, $event->id_event, 1, 1, $event->prix_event);


			 //$isInsertedDb returns false if a problem occured
			 //returns id resa if everything worked properly
			
        if ($isInsertedDb != false) {
            //if resa is inserted

            \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));

            $resp = \Stripe\Charge::create([
                        "amount" => $event->prix_event * 100,
                        "currency" => "eur",
                        "source" => $this->input->post('stripeToken'),
                        "description" => $event->nom_event
            ]);
            if ($resp->status == "succeeded") {
                //if paiement is accepted
                $this->session->set_flashdata('success', 'Payment made successfully.');
                redirect('user/UserProfile_controller');
            } else {

                //paiment not authorized
                //1 cancel resa for user 
                $idResa = $isInsertedDb;
                $userModel = new Resas_model();
                $userModel->cancelResa($idResa);
                
                //2 set flash erreur
                $this->session->set_flashdata('err', 'Le paiement n\'a pas pu être effectué.');
                  redirect('user/UserProfile_controller');
            }
        } else {
            //db not accessible so no resa recorded no paiment taken
             $this->session->set_flashdata('err', 'La réservation n\'a pas été effectuée dû à un problème technique. Aucun prélèvement n\'a été effectué.');
             redirect('user/UserProfile_controller');
           
            
        }
    }
}
