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

                <a href = "<?php echo base_url() ?>welcome/gotoConcept"">Le concept</a>
                <a href = "#" class="active">Accueil</a>

                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </div>
        <div class=" clearfix"></div>

        <div class="content ">


            <div class="row">     
                <div class="col-lg-12">


                    <div class="col-lg-6 divSearch col-xs-9">
                        <form method="POST" class="search-form" action="<?php echo base_url(); ?>events/events_controller">
                            <div id="custom-search-input">
                                <div class="input-group">
                                    <p id="erreur-saisie"></p>
                                    <input id="search" name="search" type="text" class="autocomplete_input form-control" autocomplete="on"placeholder="ville/cp" />

                                    <button type="submit" id="search_btn" class="btn btn-round btn-orange"><i class="">Go!</i></button>
                                </div>
                            </div>
                        </form>
                    </div>


                </div>
            </div>

            <div class="clearfix"></div>

            <div class="row">
                <div class=" col-12 ">
                    <div class="col-lg-3 col-xs-10 wellogo">
                        <img   src="<?php echo base_url(); ?>assets/images/logo/logo-baseline--carre-1000.png" alt="logo"/>

                    </div>
                </div>
            </div>
            <div class="row">
                <div class=" col-12 accroche">
                    <iframe width="560" height="315" src="https://www.youtube.com/embed/ONQdXhmqALM" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>           </div>

                <div class="col-10 event about" id="accueil-about">
                    <h3>

                        Alex, Christophe et Awa Tous les 3 bercés dans les relations humaines, ont eu envie de développer le speed-dating et la mise en relation dans ce monde ou le virtuel prend le dessus sur le réel.<br>

                        Notre objectif est de favoriser ‘’la vraie rencontre’’ et de mettre en avant ‘’l’humain’’

                    </h3>
                </div>


                <div class="row">   
                    <div class="col-12 about-members">


                    </div>
                </div>

            </div>




            <script>
                var BASE_URL = "<?php echo base_url(); ?>";

                $(document).ready(function () {
                    $("#search").autocomplete({

                        source: function (request, response) {
                            $.ajax({
                                url: BASE_URL + "ajax/Ajax_controller/search",

                                data: {
                                    term: request.term
                                },
                                dataType: "json",
                                success: function (data) {


                                    var resp = $.map(data, function (obj) {
                                        return obj.nom_commune + ' (' + obj.code_postal + ')';
                                    });

                                    response(resp);
                                }
                            });
                        },
                        minLength: 3,

                    });
                    $('#search_btn').on('click', function () {


                        var valToTest = $('#search').val();
                        var reg = /([\(\)])/;
                        var eventsPage = BASE_URL + "welcome"
                        if (reg.test(valToTest)) {

                        } else {
                            event.preventDefault();
                            $('#erreur-saisie').css('color', 'red');
                            $('#erreur-saisie').css('background-color', 'white');
                            $('#erreur-saisie').css('font-size', '1em');
                            $('#erreur-saisie').text('Merci de sélestionner une ville dans la liste déroulante!')
                        }



                    });



                });


            </script>   
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
