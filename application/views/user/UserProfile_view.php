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

                <a href = "<?php echo base_url() ?>welcome/gotoConcept">Le concept</a>
                <a href = "<?php echo base_url() ?>welcome/" class="">Accueil</a>
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
            <div id="tabs" class="col-lg-10 col-xs-12 eventDetails   ">
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                    <ul class="nav nav-tabs  ">
                        <li class="active">
                            <a href="#id" data-toggle="tab">
                                <i class="fa fa-user"></i>Identification
                            </a>
                        </li>
                        <li>
                            <a href="#resas" data-toggle="tab">
                                <i class="fa fa-calendar"> Mes Soirées</i>
                            </a>
                        </li>

                    </ul>
                </div>
		    <div class="tab-content ">
			   <div class="tab-pane fade in active event login" id="id" >
				    <div class="center">

                        <?php
                        echo '<h2> ' . $genre . ' ' . $user->nom_user . ' ' . $user->prenom_user . '</h2>';
                        echo '<br>';
                        echo $age . ' ans';
                        ?>
                    </div>
				    <?php
                    if ($this->session->flashdata('err')) {
                        ?>

                        <div class = "display_error">
                            <?php echo $this->session->flashdata('err'); ?>
                        </div>


                        <?php
                    } else if ($this->session->flashdata('success')) {
                        ?>

                        <div class = "display_error">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>


                    <?php }
                    ?>
				   <div class="clearfix"></div>
				    <form method="POST" action="<?php echo base_url() ?>user/UserProfile_controller/changeEmail">
                        <fieldset>
                            <legend class="userForm">Mettre à jour Votre adresse de messagerie :</legend>
                            <div class="col-4">
                                <label>E-mail</label>                           
                            </div>
                            <div class="col-7">
                                <input type="email" name="email" value="<?php echo $user->email_user ?>"/><br>
                            </div>
                            <div class="col-1">
                                <button type="submit" id="search_btn" class="btn btn-round btn-orange"><i class="">Mettre à jour</i></button>
                            </div>
                        </fieldset>
                    </form>
                    <br>
                    <div class="clearfix"></div>
			    </div>
			     <div class="tab-pane fade in  event" id="resas">
			    </div>

			    
		    </div>
            </div>

        </div>

