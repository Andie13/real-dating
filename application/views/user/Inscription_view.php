   
<!-- BEGIN BODY -->
<body class=" bg welcome">
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
                    echo '<a href = "" class="active"> Inscription</a>';
                }
                ?>

		    <a href = "<?php echo base_url()?>welcome/gotoConcept">Le concept</a>
		 <a href = "<?php echo base_url()?>welcome/" class="">Accueil</a>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </div>
        <div class=" clearfix"></div>
   <div class="clearfix"></div>
        <div class=" col-lg-12 col-xs-12 content">

        <div class="col-lg-8 col-xs-12 eventDetails regForm event login">
            <br>
            <h2 class="title">Inscription: </h2>
            <br>
            <?php
            if ($this->session->flashdata('err')) {
                ?>

                <div class = "display_error">
                    <?php echo $this->session->flashdata('err'); ?>
                </div>


            <?php } ?>
            <form action="<?php echo base_url(); ?>user/Inscription_controller/formPost" method="POST" enctype="multipart/form-data">
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="col-lg-4">
                            <label for="genre"> Vous êtes:</label>
                        </div>
                        <div class="col-lg-8">
                            <input  tabindex="5" type="radio" id="minimal-radio-4" class="icheck-minimal-blue" name="genre" value="Femme" checked>
                            <label for="fname">Femme</label>

                            <input type="radio"  name="genre" value="homme">
                            <label for="fname">Homme</label>

                        </div>
                    </div>


                </div>
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="col-lg-4">
                            <label for="fname">Nom</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" id="fname" name="nom" placeholder="Votre Nom.." required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 ">

                        <div class="col-lg-4">
                            <label for="lname">Prénom</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" id="lname" name="prenom" placeholder="Votre Prénom.." required>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="col-lg-4">
                            <label for="dateNaiss">Né(e) le</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="text" name="dateNaiss" class="datepick" value=""  data-format="YYYY-MM-DD" required>

                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="col-lg-4">
                            <label for="email">E-mail</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="email" id="email" name="email" placeholder="Votre email..." required>
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="col-lg-4">
                            <label for="tel">Tel</label>
                            <button class="btn btn-round btn-colors" id="btnInfo">
                                <i class="fa fa-question"></i>
                            </button>

                        </div>
                        <div class="col-lg-8">
                            <input type="text" id="tel" name="tel" id="phone"
                                   pattern="([0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2})|([0-9]{10})" placeholder="Votre tel..." >
                        </div>
                    </div>

                </div>
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="col-lg-4">
                            <label for="country">Mot de passe</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="password" id="pass" name="pass" placeholder="*****" required>
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="col-lg-4">
                            <label for="country">Confirmez le mot de passe:</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="password" id="confPass" placeholder="*****" onchange="checkPasswordMatch()"required>
                        </div>
                    </div>

                </div>
                <div class="registrationFormAlert" id="divCheckPasswordMatch">
                </div>
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="col-lg-4">
                            <label for="subject">Anti-bot</label>
                        </div>
                        <div class="col-lg-6">
                            <div class="g-recaptcha" data-sitekey="<?php echo $this->config->item('google_key') ?>"></div> 
                            <br/>
                            <button type="submit" id="search_btn" class="btn btn-round btn-orange"><i class="">Valider</i></button>
                        </div>
                    </div>

                </div>
            </form>
      
		</div>

    </div>
    <script>
        //affichage du flashdata s'il y en a un.
        $(".display_error").delay(4000).slideUp(200, function () {
            $(this).alert('close');
        });


        // Vérification du mot de passe et de la confirmation du mot de passe.
        function checkPasswordMatch() {
            var password = $("#pass").val();
            var confirmPassword = $("#confPass").val();

            if (password != confirmPassword) {
                $("#divCheckPasswordMatch").html("Les mots de passe ne correspondent pas.").css("color", "red").css("background-color", "rgba(255,255,255,0.5)");

            } else {

                //Vérification ensuite de la taille du mot de passe.
                if (password.length < 8) {
                    $("#divCheckPasswordMatch").html("Le mot de passe doit contenir au moins 8 caractères.").css("color", "red").css("background-color", "rgba(255,255,255,0.5)");

                } else {
                    $("#divCheckPasswordMatch").html("Mots de Passe identiques").css("color", "green").css("background-color", "rgba(255,255,255,0.5)");

                }
            }

        }

        $(document).ready(function () {
            $("#pass, #confPass").keyup(checkPasswordMatch);
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
    <script type="text/javascript">
        $(document).ready(function () {
            $('.datepick').datepicker({dateFormat: "dd-mm-yy",
                showButtonPanel: true,
                changeMonth: true,
                changeYear: true,
                showOtherMonths: true,
                selectOtherMonths: true,
                yearRange: "1930:2010"
            });

            $('#btnInfo').click(function () {
                alert("Les formats requis sont: " + '\n' + '00-00-00-00-00 ou ' + '\n' + '0000000000');
            })
        });
    </script>
</body>


</html>








