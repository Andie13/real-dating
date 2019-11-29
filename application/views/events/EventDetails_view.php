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
                <a href = "#" class="active">Accueil</a>


                <?php
                if (isset($connected)) {

                    echo '<a href = "' . base_url() . 'user/UserProfile_controller">Mon Profile</a>';
                    echo '<a href = "' . base_url() . 'user/login_controller/logout">Déconnexion</a>';
                } else {
                    echo '<a href = "' . base_url() . 'user/Login_controller">Connexion</a>';
                    echo '<a href = "' . base_url() . 'user/inscription_controller"> Inscription</a>';
                }
                ?>


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
                        <?php if ($media != ''){
     echo '<img id="imageEvent" src="'. $media->path_media . '/' . $media->nom_media.'" alt="image event"/>';
                       } 
                        else{?>
                              
                            <img id="imageEvent" src="<?php echo base_url()?>assets/images/event.jpg" alt="image event"/>

                           <?php }?>

                        </div>

                        <div class="col-lg-6 col-xs-10 " id="desc">
                            <h2 class="title">Quand? le <?php echo date_format(new DateTime($event->date_event), "d m Y") ?></h2>
                            <h2 class="title">À <?php
                                echo date_format(new DateTime($event->heure_event), "H")
                                . ' h ' . date_format(new DateTime($event->heure_event), 'i')
                                ?> précises</h2>
                            <h2 class="title">Lieux:  <?php echo $ville->nom_commune ?> </h2>
                            <p>Pour un peu de suspens, le lieux reste secret.<br>
                                Il vous sera révélé quelques jours avant la soirée...</p>

                            <h2 class="title">Tarif:  <?php echo $event->prix_event ?> €</h2>
                            <?php
                            if (isset($connected) && $nombrePlacesRestante > 0) {
                                echo '<a id="link" href="' . base_url() . 'events/events_controller/toEventReservation?id=' . $event->id_event . '">';
                               
                                echo ' <img src="https://www.paypalobjects.com/webstatic/en_US/i/buttons/pp-acceptance-small.png" alt="Buy now with PayPal" /> Réserver</a>';
                                echo '<br>';
                         
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
                          A votre arrivée, l'animatrice vous accueille, vous demande votre prénom et le numéro qui vous a été attribué lors de votre réservation et vous remet une fiche que vous conservez jusqu'à la fin de la soirée, vous explique le déroulement de la soirée et l'animation s'il y en a une.
L'organisatrice vous invite à prendre place à une table.
Chaque tête à tête dure de 5 à 10 minutes. Le temps écoulé, l'animatrice demande aux hommes de changer de table, les femmes restent à leur place.
Pendant chaque tête à tête notez le maximum d'informations sur vos interlocuteurs.
A l'issue de la séance,  chaque participant inscrit sur un papier le prénom des personnes qu'il souhaite revoir et le remet à l'organisatrice. C'est l'agence qui se chargera de mettre en relation, dans les 48 h, les célibataires qui se sont réciproquement plus.
Ensuite l'animatrice invitera, séparemment, les femmes et les hommes pour faire le bilan de la soirée.
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
                        echo '</div>';
                    }
                    ?>
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
