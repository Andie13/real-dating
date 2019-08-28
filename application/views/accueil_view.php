<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<body class="bg">

    <div class="container-fluid">
        <div class="header col-lg-12 col-xs-12 ">

            <div class="col-lg-4 col-xs-12 logo">
                <p id="headerImp">
                    <img id="headerImg" src="<?php echo base_url(); ?>assets/images/fake_logo.jpg" alt="logo"/>
                </p>
            </div>
            <div class="topnav col-lg-8 col-xs-12" id="myTopnav">
                <a id="logo-res" >                   
                    <img id="headerImg" src="<?php echo base_url(); ?>assets/images/fake_logo.jpg" alt="logo"/>
                </a>
                <a href = "#"class="active">Accueil</a>


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




            <div class="clearfix"></div>

            <div class="row">
                <div class=" col-12 accroche">
                    <p><i>"Fini le virtuel, passons au réel..."</i></p>
                    <p><i></i></p>
                </div>
            </div>
            <div class="row">     
                <div class="col-3"></div>
                <div class="col-lg-6  col-xs-12">
                    <form method="POST" class="search-form" action="<?php echo base_url(); ?>Events/events_controller">
                        <div id="custom-search-input">
                            <div class="input-group">
                                <input id="search" name="search" type="text" class="autocomplete_input form-control" placeholder="ville/cp" />
                                <button type="submit" id="search_btn" class="btn btn-round btn-orange"><i class="">Go!</i></button>
                            </div>
                        </div>
                    </form>
                </div>
                <div class="col-3"></div>
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
