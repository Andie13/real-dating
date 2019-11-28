<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<body class="bg">

    <div class="login-wrapper">
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
                <div class=" col-12 accroche">
                    <img id="about" src="<?php echo base_url() ?>assets/images/img_about.jpg">
                    <p><i>"Mentions Légales : Realdate"</i></p>                
                </div>
            </div>
           
            <div class="col-10 event about">
                <p>
					text coming soon ....
                </p>
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

