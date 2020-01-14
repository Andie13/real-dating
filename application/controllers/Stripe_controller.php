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
    public function stripePost()
    {
        require_once('application/libraries/stripe-php/init.php');
        $id_event = $this->input->get('id'); 
        
        $ev = new Events_model();
        $event = $ev->getEventDetailsById($id_event);
       
        \Stripe\Stripe::setApiKey($this->config->item('stripe_secret'));
     
        $resp = \Stripe\Charge::create ([
                "amount" => $event->prix_event * 100,
                "currency" => "eur",
                "source" => $this->input->post('stripeToken'),
                "description" => $event->nom_event 
        ]);
        if($resp->status=="succeeded"){
		
			  $this->session->set_flashdata('success', 'Payment made successfully.');
			redirect('user/UserProfile_controller');
		  }else{
		$this->session->set_flashdata('err', 'Le paiement n\'a pas pu être effectué.');
		$datas[id_event] = $id_event; 
			  $this->load->view('layout/header');
        $this->load->view('events/Events_view', $datas);
        $this->load->view('layout/footer');
		
	}
            

    }
}
