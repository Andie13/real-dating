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

		    <a href = "<?php echo base_url()?>welcome/gotoConcept"">Le concept</a>
		 <a href = "#" class="active">Accueil</a>

                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </div>

        <div class=" col-lg-12 col-xs-12 contain-wrap ">


            <div class="row">     
                <div class="col-lg-12">


                    <div class="col-lg-6 divSearch col-xs-9">
                        <form method="POST" class="search-form" action="<?php echo base_url(); ?>events/events_controller">
                            <div id="custom-search-input">
                                <div class="input-group">
                                    <input id="search" name="search" type="text" class="autocomplete_input form-control" placeholder="ville/cp" />
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
                   <video controls src="<?php echo base_url()?>assets/images/Bunny.mp4">Ici la description alternative</video>
                    <p><i>"Qui sommes nous?"</i></p>                
                </div>
            </div>
           
            <div class="col-10 event about">
                <h3>En couple depuis trois ans Christophe et Awa se sont rencontrés grâce à un speed dating.<br>

                    Tous les 3 bercés dans les relations humaines, Alex, Christophe et Awa ont eu envie de développer le speed-dating et la mise en relation dans ce monde ou le virtuel prend le dessus sur le réel.<br>

                    Notre objectif est de favoriser ‘’la vraie rencontre’’ et de mettre en avant ‘’l’humain’’

                </h3>
            </div>


            <div class="row">   

                <div class="about col-lg-3 col-xs-10 event">
                    <h2>Alex</h2>
                    <h3>
                        Ami depuis l’enfance avec Christophe<br>
                        Directeur de projet au sein d’une entreprise.<br>
                        Co-fondateur de Real Date.<br>
                    </h3>
                </div>
                <div class="about col-lg-3 col-xs-10  event">
                    <h2>Christophe</h2>
                    <h3>
                        Ami d’enfance d’Alex et compagnon de Awa.<br>
                        Créateur et dirigeant d’entreprise.<br>
                        Co-fondateur de Real Date.<br>


                    </h3>
                </div>
                <div class="about col-lg-3 col-xs-10 event">
                    <h2>Awa</h2>
                    <h3>
                        Compagne de Christophe<br>
                        Sophrologue diplômée et psychanalyse<br>
                        Co-fondatrice de Real Date.<br>


                    </h3>
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
                                    return obj.nom_commune;
                                });

                                response(resp);
                            }
                        });
                    },
                    minLength: 3,

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
