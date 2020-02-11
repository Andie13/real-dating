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
                <a href = "#" class="">Accueil</a>

                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </div>
        <div class=" clearfix"></div>

        <div class="content ">




            <div class="clearfix"></div>


            <div class="row">
                <div class="col-lg-12 event about" id="success-paypal">
                    <h4 class="success">Merci, Votre réservation à bien été enregistrée.</h4>

                    <p>Item Name : <span><?php echo $item_name; ?></span></p>
                    <p>Item Number : <span><?php echo $item_number; ?></span></p>
                    <p>TXN ID : <span><?php echo $txn_id; ?></span></p>
                    <p>Amount Paid : <span>$<?php echo $payment_amt . ' ' . $currency_code; ?></span></p>
                    <p>Payment Status : <span><?php echo $status; ?></span></p>

                    <a href="<?php echo base_url(); ?>user/userProfile_controller">Back to Products</a>

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
