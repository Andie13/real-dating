   
<!-- BEGIN BODY -->
<body class=" bg">
    <div class="login-wrapper">


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
                <a href = "#"class="active">Connexion</a>
                <a href = "<?php echo base_url() ?>user/Inscription_controller">Inscription</a>

                <a href = "<?php echo base_url() ?>welcome">Accueil</a>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </div>
        <div class=" clearfix"></div>
        <br>
        <br>


        <div class="col-lg-2"></div>
        <div class="col-lg-8 col-xs-12 regForm login">

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
                    <div class="col-25">
                        <label for="email">E-mail</label>
                    </div>
                    <div class="col-75">
                        <input type="email" id="lname" name="email" placeholder="Votre email..." required="">
                    </div>
                </div>
                <div class="row">
                    <div class="col-25">
                        <label for="mdp">Mot de passe</label>
                    </div>
                    <div class="col-75">
                        <input type="password" id="lname" name="pass" placeholder="*****" required="">
                    </div>
                </div>
                <p class="formButton">
                    <button type="submit" id="search_btn" class="btn btn-round btn-orange"><i class="">Connexion</i></button>

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
        <div class="col-lg-2"></div>

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








