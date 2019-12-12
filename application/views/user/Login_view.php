   
<!-- BEGIN BODY -->
<body class=" bg welcome">
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
                    echo '<a href = "' . base_url() . 'user/UserProfile_controller">Mon Profil</a>';
                   
                } else {
                    echo '<a href = "" class="active">Connexion</a>';
                    echo '<a href = "' . base_url() . 'user/inscription_controller"> Inscription</a>';
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
        <br>
   <div class="clearfix"></div>
        <div class=" col-lg-12 col-xs-12 content">

        <div class="col-lg-8 col-xs-12 eventDetails regForm event login">

            <br>
            <h2 class="title">Connexion: </h2>
            <br>
            <?php
            if ($this->session->flashdata('err')) {
                ?>

                <div class = "display_error">
                    <?php echo $this->session->flashdata('err'); ?>
                </div>


            <?php } ?>
            <form  id="loginForm" action="<?php echo base_url(); ?>user/Login_controller/Login" method="POST" enctype="multipart/form-data">


                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="col-lg-4">
                            <label for="email">E-mail</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="email" id="lname" name="email" placeholder="Votre email..." required="">
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12 ">
                        <div class="col-lg-4">
                            <label for="mdp">Mot de passe</label>
                        </div>
                        <div class="col-lg-8">
                            <input type="password" id="lname" name="pass" placeholder="*****" required="">
				
                        </div>
                    </div>

                </div>
                <p class="formButton ">
                    <button type="submit" id="search_btn" class="btn btn-round btn-orange login-btn "><i class="">Connexion</i></button>

                </p>
                <br>
                <br>
                <a class="pull-left " id="showResetPassword" title="Password Lost and Found">Mot de passe oublié?</a>

            </form>
            <br>

            <br>

            <div class="reset" id="form_reset_password" >

                <form  action="<?php echo base_url() . 'user/Login_controller/resetPassword' ?>" id="forget-mdp" method="post" style="">



                    <h2 class="title ">Veuillez saisir votre adresse e-mail pour réinitialiser votre mot de passe.</h2>

                    <div class="col-75">
                        <input  type="email" id="lname" name="email" placeholder="Votre email..." required="">
                    </div>

                    <br>
                    <br>
                    <br>
                    <br>
                    <p class="formButton">
                        <button type="submit" id="search_btn" class="btn btn-round btn-orange"><i class="">Réinitialiser</i></button>

                    </p>
                    <br>
                    <br>
                    <a class="pull-left " id="retour" ><< Retour</a>



                </form>

            </div>

        </div>
		 </div>

    <script>
        $(document).ready(function () {
            $('.reset').hide();
            $('#showResetPassword').click(function () {
                $('.reset').toggle();
                $('#loginForm').toggle();
            });
            $('#retour').click(function () {
                $('.reset').toggle();
                $('#loginForm').toggle();
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
</body>

</html>








