<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<body class="bg welcome">

    <div class="container-fluid login-wrapper">
        <div class="header col-lg-12 col-xs-12 ">

            <div class="col-lg-4 col-xs-12 logo">
                <p id="plogo">
                    <img id="headerImg" src="<?php echo base_url(); ?>assets/images/logo/loog-carre1000x1000.png" alt="logo"/>
                </p>
            </div>
            <div class="topnav col-lg-8 col-xs-12" id="myTopnav">
                <a id="logo-res" >                   
                    <img id="headerImg" src="<?php echo base_url(); ?>assets/images/logo/logo-favicon-carre-1000.png" alt="logo"/>
                </a>
                <?php
                if (isset($connected)) {
                    echo '<a href = "' . base_url() . 'user/login_controller/logout">Déconnexion</a>';
                    echo '<a href = "' . base_url() . 'user/UserProfile_controller">Mon Profile</a>';
                } else {
                    echo '<a href = "' . base_url() . 'user/Login_controller">Connexion</a>';
                    echo '<a href = "' . base_url() . 'user/inscription_controller"> Inscription</a>';
                }
                ?>

                <a href = "<?php echo base_url() ?>welcome/gotoConcept">Le concept</a>
                <a href = "<?php echo base_url() ?>welcome/" class="">Accueil</a>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </div>
        <div class=" col-lg-12 col-xs-12 contain-wrap ">
            <div class="row">
                <div class="col-lg-12">
                </div>
            </div>
            <div class="row">
               <div class="col-lg-10 col-xs-10 event eventDetails">
                    <div class="col-lg-6 col-xs-10 containerImage" >
                        <?php
                        if ($media != '') {
                            echo '<img id="imageEvent" src="' . $media->path_media . '/' . $media->nom_media . '" alt="image event"/>';
                        } else {
                            ?>

                            <img id="imageEvent" src="<?php echo base_url() ?>assets/images/event.jpg" alt="image event"/>

                        <?php } ?>

                    </div>

                    <div class="col-lg-6 col-xs-10 " id="desc">
                        <h2 class="title">Quand? le <?php echo date_format(new DateTime($event->date_event), "d m Y") ?></h2>
                        <h2 class="title">À <?php
                            echo date_format(new DateTime($event->heure_event), "H")
                            . ' h ' . date_format(new DateTime($event->heure_event), 'i')
                            ?> précises</h2>
                        <h2 class="title">Lieux:  <?php echo $ville->nom_commune ?> </h2>
                        <h2><?php echo $presta->nom_presta; ?></h2>
                        <p><?php echo $presta->adresse_presta; ?></p>



                        <h2 class="title">Tarif:  <?php echo $event->prix_event ?> €</h2>
                        <?php
                        if (isset($connected) && $nombrePlacesRestante > 0) {
                            echo '<a id="link" href="' . base_url() . 'events/events_controller/toEventReservation?id=' . $event->id_event . '">';

                            echo ' <img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/pp-acceptance-small.png" alt="Buy now with PayPal" /> Réserver</a>';
                            echo '<br>';
                            echo '<a id="link" href="' . base_url() . 'Stripe_controller">PAY</a>';
                        } else {
                            
                        }
                        ?>
                    </div>
                </div>
                </div>
                <div class="row">
                    <div class="col-lg-10 col-xs-10 event eventDetails">
                        <h2>Déroulement de la soirée:</h2>
                        <h4 style="text-align: justify">
                            Quam quidem partem accusationis admiratus sum et moleste tuli potissimum esse Atratino datam. Neque enim decebat neque aetas illa postulabat neque, id quod animadvertere poteratis, pudor patiebatur optimi adulescentis in tali illum oratione versari. Vellem aliquis ex vobis robustioribus hunc male dicendi locum suscepisset; aliquanto liberius et fortius et magis more nostro refutaremus istam male dicendi licentiam. Tecum, Atratine, agam lenius, quod et pudor tuus moderatur orationi meae et meum erga te parentemque tuum beneficium tueri debeo.
                            <br>
                            <br>
                            Nam sole orto magnitudine angusti gurgitis sed profundi a transitu arcebantur et dum piscatorios quaerunt lenunculos vel innare temere contextis cratibus parant, effusae legiones, quae hiemabant tunc apud Siden, isdem impetu occurrere veloci. et signis prope ripam locatis ad manus comminus conserendas denseta scutorum conpage semet scientissime praestruebant, ausos quoque aliquos fiducia nandi vel cavatis arborum truncis amnem permeare latenter facillime trucidarunt.
                            <br>
                            <br>
                            Cuius acerbitati uxor grave accesserat incentivum, germanitate Augusti turgida supra modum, quam Hannibaliano regi fratris filio antehac Constantinus iunxerat pater, Megaera quaedam mortalis, inflammatrix saevientis adsidua, humani cruoris avida nihil mitius quam maritus; qui paulatim eruditiores facti processu temporis ad nocendum per clandestinos versutosque rumigerulos conpertis leviter addere quaedam male suetos falsa et placentia sibi discentes, adfectati regni vel artium nefandarum calumnias insontibus adfligebant.
                        </h4>

                        <h3>Réservations sécurisées par PayPal</h3>
                        <img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/PP_logo_h_150x38.png" alt="PayPal Logo">
                        <br>
                    </div>

                </div>
                <div class="row">
                    <?php
                    if ($presta != '') {

                        echo ' <div class="col-lg-10 col-xs-10 event eventDetails">';
                        echo $presta->nom_presta;
                        echo '<br> ';
                        if ($mediasPresta != '') {
                            foreach ($mediasPresta as $mp) {
                                ?>
                                <img src="<?php echo $mp->path_media . '/' . $mp->nom_media ?>" alt="images prestataire" style="max-height: 8em;margin: 1em;"/>
                                <?php
                            }
                        }
                        echo ' ';
                        echo '<div id="map" style="height:50%;width:50%;margin:auto;"></div>';

                        echo '</div>';
                    }
                    ?>
                </div>
            </div>


            <script src="https://maps.googleapis.com/maps/api/js?key=<?php echo $this->config->item('google_api_key'); ?>"></script>
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
            <script>


                var lat = <?php echo $presta->latitude ?>;
                var lng = <?php echo $presta->longitude ?>;
                var map;
                function initialize() {
                    var mapOptions = {
                        zoom: 12,
                        center: {lat: lat, lng: lng}
                    };
                    map = new google.maps.Map(document.getElementById("map"),
                            mapOptions);

                    var marker = new google.maps.Marker({

                        position: {lat: lat, lng: lng},
                        map: map
                    });


                    var infowindow = new google.maps.InfoWindow({
                        content: "<p>Marker Location:" + marker.getPosition() + "</p>"
                    });

                    google.maps.event.addListener(marker, "click", function () {
                        infowindow.open(map, marker);
                    });
                }

                google.maps.event.addDomListener(window, "load", initialize);
            </script>

