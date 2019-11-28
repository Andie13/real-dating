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

