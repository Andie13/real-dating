<?php
$this->load->library('session');
$eventModel = new Events_model();
$mediasModel = new Medias_model();
setlocale(LC_TIME, "fr_FR");
?>
<!-- BEGIN BODY -->
<body class=" bg welcome">
    <div class="container-fluid login-wrapper">
        <?php
        if ($this->session->flashdata('err')) {
            ?>
            <div class = "alert alert-error">
                <?php echo $this->session->flashdata('err'); ?>
            </div>
        <?php } ?>


        <div class="header col-lg-12 col-xs-12 ">

            <div class="col-lg-4 col-xs-12 logo">
                <p id="plogo">
                    <img id="headerImg" src="<?php echo base_url(); ?>assets/images/logo/loog-carre1000x1000.png" alt="logo"/>
                </p>
            </div>
            <div class="topnav col-lg-8 col-xs-8" id="myTopnav">
                <a id="logo-res" >                   
                    <img id="headerImg" src="<?php echo base_url(); ?>assets/images/logo/logo-favicon-carre-1000.png" alt="logo"/>
                </a>
                
				


                <?php
                if (isset($connected)) {
		    echo '<a href = "' . base_url() . 'user/login_controller/logout">Déconnexion</a>';
                    echo '<a href = "' . base_url() . 'user/UserProfile_controller">Mon Profil</a>';
                   
                } else {
                    echo '<a href = "' . base_url() . 'user/Login_controller">Connexion</a>';
                    echo '<a href = "' . base_url() . 'user/inscription_controller"> Inscription</a>';
                }
                ?>

		    <a href = "<?php echo base_url()?>welcome/gotoConcept"">Le concept</a>
			 <a href = "<?php echo base_url()?>welcome/" class="">Accueil</a>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </div>
        <div class=" clearfix"></div>
        <div class=" col-lg-12 col-xs-12 content ">

            <div class="col-lg-10 col-xs-10 eventDetails">
                <div class="col-12">
                    <br>
                    <h2 class="accroche">Voici tous les évènements à venir autour de vous: </h2>
                    <?php
                    if (isset($connected)) {
                        
                    } else {
                        ?>
                        <h3 class="accroche">Afin de réserver, veuillez vous <a href = "<?php echo base_url() ?>user/Inscription_controller">inscrire</a> ou vous <a href = "<?php echo base_url() ?>user/login_controller">connecter.</a></h3>

                    <?php }
                    ?>


                    <br>
                    <?php
                    if (empty($events)) {



                        echo '<div class=" col-lg-12 col-xs-12 no-event">';
                        echo '<h2 class"title">Oups! Il n\'y a pas de soirée prévu dans cette ville pour le moment :-(</h2>';
                        echo '<br>';
                        echo '<br>';
                        echo '<a  id="retour" href="' . base_url() . 'welcome"><< Retour</a>';
                        echo '</div>';
                    } else {
                        foreach ($events as $event) {

                            if ($event->image_event != NULL) {

                                $media = $mediasModel->getMediaFromEventImageId($event->image_event);
                                $mEvent = $media->path_media . '/' . $media->nom_media;
                            } else {
                                $mEvent = base_url() . "assets/images/event.jpg";
                            }


                            $villeModel = new Villes_model();
                            $nomVille = $villeModel->getNomVilleFromId($event->id_ville);

                            $nbResaByEvent = $eventModel->getNbResaByEventId($event->id_event);


                            $nombrePlacesRestante = $event->nb_places_event - $nbResaByEvent;
                            if ($nombrePlacesRestante > 0) {


                                echo '<div class=" col-lg-4 col-xs-12 ">';
                                echo '<div class=" col-12">';

                                echo '<div class="  event col-12 col-xs-12></div>';
                                echo '<div class=" event col-10">';
                                echo '<p class="formButton">';
                                echo '<img src="' . $mEvent . '" style=" max-height:10em;;" alt=""/><br>';
                                echo '</p>';

                                echo '<h3>' . utf8_encode(strftime(" %d %B %Y", strtotime( $event->date_event ))) . '</h3>';
                                echo '<h3>' . $event->heure_event . '</h3>';

				    
				    echo '<br>';

                                echo '<p><strong>' . $event->nom_event . '</p>';
                                echo '<p>' . $nomVille->nom_commune . '</strong></p>';
                                echo '<br>';

                                echo '<p>Prix de la soirée : ' . $event->prix_event . '€</p>';
                                echo '<p>Nombre de places : ' . $event->nb_places_event . '</p>';
                                echo '<p>Plus que ' . $nombrePlacesRestante . ' places</p>';
                                echo '<br>';

                                echo '<a id="link" href="' . base_url() . 'events/events_controller/toEventDetails?id_event=' . $event->id_event . '">détails</a>';
                                echo '<br>';
                                if (isset($connected) && $nombrePlacesRestante > 0) {
                                   echo '<br>';
                                    echo '<ul>';
                                    

                                    echo '<li><a id="link" href="' . base_url() . 'events/events_controller/toEventReservation?id=' . $event->id_event . '">';
                                    echo ' <img src="'. base_url() .'assets/images/ppal.png" style="width:25%;" alt="Buy now with PayPal" /><p> Réserver avec mon conpte Paypal</p></a></li>';
                                   echo '<hr>';
                                    echo '<li><a id="link" href="' . base_url() . 'events/events_controller/toStripeReservation?id=' . $event->id_event .'"><img id="cards " src="'. base_url() .'assets/images/logo-stripe.png" style="width:50%; height:auto" alt="cards"/><p>Réservez avec une carte bancaire</p></a></li>';                        echo '</ul>';
                                    
                                    echo '<br>';
                                } else {
                                    
                                }



                                echo '</div>';
                                echo '<div class="col-1"></div>';
                                echo '</div>';
                                echo '</div>';
                            }
                        }
                    }
                    ?>






                </div>

            </div>  

        </div>

    <script>
        function myFunction() {
            var x = document.getElementById("myTopnav");
            if (x.className === "topnav") {
                x.className += " responsive";
            } else {
                x.className = "topnav";
            }
        }
    </script>

</body>

</html>









