<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Paypal extends CI_Controller{
    
     function  __construct(){
        parent::__construct();
        
        // Load paypal library & product model
        $this->load->library('paypal_lib','session');

     }
     
    function success(){
        
        if(isset($this->session->id_event)){
           
            
            $EventModel = new Events_model();


            $idEvent = $this->session->id_event;
            $idUser = $this->session->userId;
            $ev = $EventModel->getEventDetailsById($idEvent);
            $prix = $ev->prix_event;

            $EventModel->insertNewReservation($idUser, $idEvent, 2, 1, $prix);

            
        }
        // Get the transaction data
        $paypalInfo = $this->input->post();
      

        $data['item_name']      = $paypalInfo['item_name'];
        $data['item_number']    = $paypalInfo['item_number'];
        $data['txn_id']         = $paypalInfo["txn_id"];
        $data['payment_amt']    = $paypalInfo["mc_gross"];
        $data['currency_code']  = $paypalInfo["mc_currency"];
        $data['status']         = $paypalInfo["payment_status"];
        
        // Pass the transaction data to view
		$this->load->view('layout/header');
        $this->load->view('paypal/success', $data);
		$this->load->view('layout/footer');
    }
     
     function cancel(){
        // Load payment failed view
        $this->load->view('paypal/cancel');
     }
     
     function ipn(){
        // Paypal posts the transaction data
        $paypalInfo = $this->input->post();
        
        if(!empty($paypalInfo)){
            // Validate and get the ipn response
            $ipnCheck = $this->paypal_lib->validate_ipn($paypalInfo);

            // Check whether the transaction is valid
            if($ipnCheck){
                // Insert the transaction data in the database
                $data['user_id']        = $paypalInfo["custom"];
                $data['product_id']        = $paypalInfo["item_number"];
                $data['txn_id']            = $paypalInfo["txn_id"];
                $data['payment_gross']    = $paypalInfo["mc_gross"];
                $data['currency_code']    = $paypalInfo["mc_currency"];
                $data['payer_email']    = $paypalInfo["payer_email"];
                $data['payment_status'] = $paypalInfo["payment_status"];

                $eventModel = new Events_model();
                $eventModel->insertTransaction($data);
            }
        }
    }
}
//array(33) { ["payer_email"]=> string(20) "fody.fady@icloud.com" 
//    ["payer_id"]=> string(13) "8Y4EQ4TF3J63J" 
//    ["payer_status"]=> string(8) "VERIFIED" 
//    ["first_name"]=> string(1) "a" 
//    ["last_name"]=> string(8) "perrault" 
//    ["address_name"]=> string(10) "a perrault" 
//    ["address_street"]=> string(33) "Av. de la Pelouse, 87648672 Mayet" 
//    ["address_city"]=> string(5) "Paris" 
//    ["address_state"]=> string(6) "Alsace"
//    ["address_country_code"]=> string(2) "FR" 
//    ["address_zip"]=> string(5) "75002" 
//    ["residence_country"]=> string(2) "FR" 
//    ["txn_id"]=> string(17) "0WW44619B9544454Y" 
//    ["mc_currency"]=> string(3) "EUR" ["mc_fee"]=> string(4) 
//    "1.27" ["mc_gross"]=> string(5) "30.00" 
//    ["protection_eligibility"]=> string(8) "ELIGIBLE"
//    ["payment_fee"]=> string(4) "1.27" 
//    ["payment_gross"]=> string(5) "30.00" 
//    ["payment_status"]=> string(9) "Completed" 
//    ["payment_type"]=> string(7) "instant" 
//    ["handling_amount"]=> string(4) "0.00" 
//    ["shipping"]=> string(4) "0.00" 
//    ["item_name"]=> string(21) "SoirÃ©e Real Dating" 
//    ["item_number"]=> string(1) "3"
//    ["quantity"]=> string(1) "1" 
//    ["txn_type"]=> string(10) "web_accept" 
//    ["payment_date"]=> string(20) "2019-08-20T14:37:28Z" 
//    ["business"]=> string(19) "fody.fady@gmail.com" 
//    ["receiver_id"]=> string(13) "7SR8QCQLQWTQN" 
//    ["notify_version"]=> string(11) "UNVERSIONED" 
//    ["custom"]=> string(1) "5" 
//    ["verify_sign"]=> string(56) "Ar5fhVGouiuyQRIWioJ9XP701qNMAspPpFUdPGPFZAMchB4hdAwMcjOo" }
