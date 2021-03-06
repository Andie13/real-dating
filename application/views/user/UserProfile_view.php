<body class=" bg welcome">
    <div class="container-fluid login-wrapper">
        <div class="header col-lg-12 col-xs-12 ">
            -     <div class="col-lg-4 col-xs-12 logo">
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
                    <p><i>"Gestion de votre profil:"</i> </p>
                    <p><i>Bonjour <?php echo $user->nom_user . ' ' . $user->prenom_user ?></i> </p>
                    <p><i></i></p>
                </div>
            </div>
            <div id="tabs" class="col-lg-10 col-xs-12 eventDetails  event login ">
                <div class="col-lg-12 col-md-12 col-xs-12 col-sm-12">
                   <ul class="nav nav-tabs primary" id="myTab" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link active" id="home-tab" data-toggle="tab" href="#id" >
                                Identification
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" id="profile-tab" data-toggle="tab" href="#resas">
                                 Mes Soirées
                            </a>
                        </li>

                    </ul>

                </div>
		    <div class="tab-content">
                    <div class="tab-pane active event login" id="id" role="tabpanel" aria-labelledby="home-tab" >
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

                        <div class = "display_success">
                            <?php echo $this->session->flashdata('success'); ?>
                        </div>


                    <?php }
                    ?>
				   <div class="clearfix"></div>
				    <form method="POST" action="<?php echo base_url() ?>user/UserProfile_controller/changeEmail">
                        <fieldset>
                            <legend class="userForm">Mettre à jour Votre adresse de messagerie :</legend>
                            <div class="col-lg-4 col-xs-12">
                                <label>E-mail</label>                           
                            </div>
                            <div class="col-lg-7 col-xs-12">
                                <input type="email" name="email" value="<?php echo $user->email_user ?>"/><br>
                            </div>
                            <div class="col-lg-1 col-xs-12">
                                <button type="submit" id="search_btn" class="btn btn-round btn-orange"><i class="">Mettre à jour</i></button>
                            </div>
                        </fieldset>
                    </form>
                    <br>
                    <div class="clearfix"></div>
				   <form method="POST" action="<?php echo base_url() ?>user/UserProfile_controller/changeTel">
                            <fieldset>
                                <legend class="userForm">Mettre à jour votre numéro de téléphone :</legend>
                                <div class="col-lg-4 col-xs-11">
                                    <label>N° de téléphone : </label>
					
                                </div>
                                

                                <div class="col-lg-7 col-xs-12">
                                    <input type="text" id="tel" name="tel" id="phone"
                                           pattern="([0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2}-[0-9]{2})|([0-9]{10})" placeholder="Votre tel..." >
					  <p>Les formats requis sont: '00-00-00-00-00 ou  '0000000000'</p>
                                </div>
                                <div class="col-lg-1 col-xs-12">
                                    <button type="submit" id="search_btn" class="btn btn-round btn-orange"><i class="">Mettre à jour</i></button>
                                </div>
                            </fieldset>
                        </form>
                        <br>
                        <div class="clearfix"></div>
                        <form method="POST" action="<?php echo base_url() ?>user/UserProfile_controller/resetPassword">
                            <fieldset>
                                <legend class="userForm">Mettre à jour Votre mot de Passe:</legend>
                                <div class="col-lg-4 col-xs-11">
                                    <label>Changer de Mot de passe</label>
                                </div>
                                <div class="col-lg-7 col-xs-12">
                                    <input  type="password" name="old_pass" placeholder="ancien mot de passe"/><br>
                                    <br>
                                    <input type="password" id="pass" name="new_pass" placeholder="nouveau mot de passe"/><br>
                                    <br>
                                    <input type="password" id="confPass"  placeholder="confirmer nouveau mot de passe"onchange="checkPasswordMatch()"/><br> 
                                    <div class="registrationFormAlert" id="divCheckPasswordMatch"></div>
                                </div>
                                <div class="col-lg-1 col-xs-12">
                                    <button type="submit" id="search_btn" class="btn btn-round btn-orange"><i class="">Mettre à jour</i></button>
                                </div>
                            </fieldset>
                        </form>
                        <?php
                        if ($user->cagnotte > 0) {

                            echo '<p>Vous possédez un avoir de : ' . $user->cagnotte . '€</p>';
                        }
                        ?>
			    </div>
                    <div class="tab-pane  event login" id="resas" role="tabpanel" aria-labelledby="profile-tab " >
				        <?php if (isset($events)) { ?>
                        <h2>Vous êtes inscrit à des événements:</h2>
                        <table class="table table-striped dt-responsive display dataTable dtr-inline" cellspacing="0" width="100%" role="grid" aria-describedby="example-1_info" style="width: 100%;d">
                            <thead>

				    
                                <tr role="row">
                                    <th class="sorting_asc" tabindex="0" aria-controls="example-1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 175px;">Nom de la soirée</th>
                                    <th class="sorting" tabindex="0" aria-controls="example-1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 256px;">date</th>
                                    <th class="sorting" tabindex="0" aria-controls="example-1" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 130px;">heure</th>
                                    <th class="sorting" tabindex="0" aria-controls="example-1" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 43px;">statut</th>
                                    <th class="sorting" tabindex="0" aria-controls="example-1" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 43px;">ref réservation</th>
				    </tr>
                            </thead>
				<tbody>
					 <?php
                                    foreach ($events as $event) {

                                        $eventModel = new Events_model();
                                        $eventDetail = $eventModel->getEventDetailsById($event->id_event);
                                        if ($event->status_resa == 4) {
                                            $statut = 'Payée';
                                        } else {
                                            $statut = 'Annulé';
                                        }
                                        ?>
                                        <tr>
                                            <td><?php echo $eventDetail->nom_event ?></td>
                                            <td><?php echo $eventDetail->date_event ?></td>
                                            <td><?php echo $eventDetail->heure_event ?></td>
                                            <td><?php echo $statut ?></td>
                                            <td><?php echo $event->ref_resa ?></td>
                                        </tr>
                                    <?php } ?>
                            <br>
				</tbody>
				     </table>
				      <?php
                        } else {
                            echo '<h2>Vous n\'avez pas encore réservé de soirée...</h2>';
                        }
                        ?> 
                            <br>
			    </div>

			    
		    </div>
            </div>

        </div>
	    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

	            <script>
            $(function () {
                $("#tabs").tabs();
            });


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
        <script type="text/javascript">
            $(document).ready(function () {
		    
		     $('#myTab').tabs("select",0);
		    $('#myTable').DataTable( {
    responsive: true
} );
		    
                $('.datepick').datepicker({dateFormat: "dd-mm-yy",
                    showButtonPanel: true,
                    changeMonth: true,
                    changeYear: true,
                    showOtherMonths: true,
                    selectOtherMonths: true,
                    yearRange: "1930:2010"
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
		    function infoTel(){
    alert("Les formats requis sont: " + '\n' + '00-00-00-00-00 ou ' + '\n' + '0000000000');
             
}
</script>

