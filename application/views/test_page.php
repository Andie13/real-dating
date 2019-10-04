<?php
$this->load->library('session');
$eventModel = new Events_model();
?>
<!-- BEGIN BODY -->
<body class="bg">

    
    <div class="container-fluid">
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
    <div class=" clearfix"></div>
    <div class="row">
        <div class="col-lg-12 contain-wrap">

            <div class="col-10  login">
                <div class="col-12">
                    <br>
                    <h2 class="title"><?php echo $event->nom_event ?></h2>
                    <?php
                    if (isset($connected)) {
                        
                    } else {
                        ?>
                        <h3 class="accroche">Afin de réserver, veuillez vous <a href = "<?php echo base_url() ?>user/Inscription_controller">inscrire</a> ou vous <a href = "<?php echo base_url() ?>user/login_controller">connecter.</a></h3>

                    <?php }
                    ?>


                    <br>
                    <div class="col-lg-12 col-xs-12 event">
                        <div class="col-lg-6 col-xs-12 containerImage" >
                            <img id="imageEvent" src="<?php echo $media->path_media . '/' . $media->nom_media ?>" alt="image event"/>
                        </div>

                        <div class="col-lg-6 col-xs-12 " id="desc">
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
                            } else {
                                
                            }
                            ?>
                        </div>
                    </div>
                    <br>
                    <br>
                    <br>
                    <div class="col-12 regForm event" style="margin-top: 1em;">
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
                        <br>
                        <br>

                    </div>

                    <?php
                    if ($presta != '') {

                        echo ' <div class="col-12 regForm event" style="margin-top: 1em;">';
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

                    <div class="col-1"></div>

                </div>

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










