<body class=" bg welcome">
	<div class="container-fluid login-wrapper">
		<div class="header col-lg-12 col-xs-12 ">
            -     <div class="col-lg-4 col-xs-12 logo">
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
                    echo '<a class="active" href = "' . base_url() . 'user/UserProfile_controller">Mon Profil</a>';
                   
                } else {
                    echo '<a href = "' . base_url() . 'user/Login_controller">Connexion</a>';
                    echo '<a href ="' . base_url() . 'user/inscription_controller" > Inscription</a>';
                }
                ?>

		    <a href = "<?php echo base_url()?>welcome/gotoConcept">Le concept</a>
		 <a href = "<?php echo base_url()?>welcome/" class="">Accueil</a>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </div>
		 <div class="clearfix"></div>
			<div class="content">
				 <div class="row">
            <div class=" col-12 accroche">
                <p><i>"Gestion de votre profile:"</i> </p>
                <p><i>Bonjour <?php echo $user->nom_user . ' ' . $user->prenom_user ?></i> </p>
                <p><i></i></p>
            </div>
        </div>

		</div>
		
