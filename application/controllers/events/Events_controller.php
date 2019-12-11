<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Events_Controller extends CI_Controller {

    function __construct() {
        parent::__construct();


        $this->load->library('email', 'session', 'Paypal_lib');
    }

    public function index() {

        $this->load->view('layout/header');

		        if($this->input->get('ville')!=NULL){
            $ville = $this->input->get('ville');
        }else{
            
            $ville = strtok($this->input->post('search'),'(');
        }
        
        $arrCities = $this->getNearbyCities($ville);
        $datas['events'] = $this->getEventsFromIdCities($arrCities);

        if ($this->session->connected) {
            $datas['userId'] = $this->session->userId;
            $datas['connected'] = $this->session->connected;
        }

        $this->load->view('layout/header');
        $this->load->view('events/Events_view', $datas);
        $this->load->view('layout/footer');
    }

    public function getNearbyCities($search) {

        $villeModel = new Villes_model();
        //récupère les infos de la ville sélectionnée.
        $villeDetail = $villeModel->getVilleDetails($search);
        return $arr = $villeModel->getVillesByDistance($villeDetail->latitude, $villeDetail->longitude);
    }

    public function getEventDetails($idEvent) {
        $eventModel = new Events_model();

        return $eventModel->getEventDetailsById($idEvent);
    }

    public function getEventsFromIdCities($arrayCities) {

        $eventModel = new Events_model();
        $eventsArr = array();

        foreach ($arrayCities as $city) {

            $eventArray = $eventModel->getEvents($city->id_ville);

            foreach ($eventArray as $event) {

                $eventsArr[] = $event;
            }
        }
        return $eventsArr;
    }

    public function toEventReservation() {

        $id_event = $this->input->get('id');
        $this->session->set_userdata('id_event', $id_event);
        $eventModel = new Events_model();



        //test Paypal
        // Set variables for paypal form
        $returnURL = base_url() . 'paypal/success';
        $cancelURL = base_url() . 'paypal/cancel';
        $notifyURL = base_url() . 'paypal/ipn';

        // Get product data from the database
        //$product = $this->product->getRows($id);
        $event = $eventModel->getEventDetailsById($id_event);

        // Get current user ID from the session
        $userID = $this->session->userId;

        // Add fields to paypal form
        $this->paypal_lib->add_field('return', $returnURL);
        $this->paypal_lib->add_field('cancel_return', $cancelURL);
        $this->paypal_lib->add_field('notify_url', $notifyURL);
        $this->paypal_lib->add_field('item_name', $event->nom_event);
        $this->paypal_lib->add_field('custom', $userID);
        $this->paypal_lib->add_field('item_number', $event->id_event);
        $this->paypal_lib->add_field('amount', $event->prix_event);

        // Render paypal form
        $this->paypal_lib->paypal_auto_form();
    }

    public function toEventDetails() {

        $idEvent = $this->input->get('id_event');
        $event = $this->getEventDetails($idEvent);

        $villeModel = new Villes_model();
        $eventModel = new Events_model();
        $mediasModel = new Medias_model();




        if ($event->id_presta_event != NULL) {

            $mediasPresta = $mediasModel->getAllMediaFromPresta($event->id_presta_event);

            if ($mediasPresta != FALSE) {
                $datas['mediasPresta'] = $mediasPresta;
            } else {
                $datas['mediasPresta'] = '';
            }

            $presta = $eventModel->getPrestaFromEvent($event->id_presta_event);
        } else {

            $presta = 'Le lieux ne sera dévoilé que dans quelques jours....';
        }

        if ($event->image_event != NULL) {

            $media = $mediasModel->getMediaFromEventImageId($event->image_event);


            $datas['media'] = $media;
        }else{
            $datas['media'] = '';
        }



        $nomVille = $villeModel->getNomVilleFromId($event->id_ville);
        $datas['event'] = $event;
        $datas['ville'] = $nomVille;
        $datas['presta'] = $presta;

        $nbResaByEvent = $eventModel->getNbResaByEventId($event->id_event);
        $datas['nombrePlacesRestante'] = $event->nb_places_event - $nbResaByEvent;


        if ($this->session->connected) {
            $datas['userId'] = $this->session->userId;
            $datas['connected'] = $this->session->connected;
        }
        $this->load->view('layout/header');
        $this->load->view('events/EventDetails_view', $datas);
        $this->load->view('layout/footer');
    }

}
