<?php
defined('BASEPATH') OR exit('No direct script access allowed');

if (isset($userId)) {
    
} else {
    echo 'non connecté';
}
?>

<body class="login_page">
    <div class="login-wrapper">
        <div class="container-fluid">
            <div class="header col-12">

                <div class="col-4 logo">
                    <img id="headerImg" src="<?php echo base_url(); ?>assets/images/fake_logo.jpg" alt="logo"/>
                </div>
                <div class="col-6  menu">
                    <ul>
                        <?php
                        if (isset($connected)) {

                            echo '<li class = "menu"><a href = "' . base_url() . 'user/UserProfile_controller">Mon Profil </a></li>';
                            echo '<li class = "menu"><a href = "' . base_url() . 'user/login_controller/logout"> Déconnexion</a></li>';
                        } else {
                            echo '<li class = "menu"><a href = "' . base_url() . 'user/Login_controller">Connexion</a></li>';
                            echo '<li class = "menu"><a href = "' . base_url() . 'user/inscription_controller"> Inscription</a></li>';
                        }
                        ?>

                    </ul>
                </div>

            </div>
            <div class="clearfix"></div>

            <div class="row">
                <div class=" col-12 accroche">
                    <p><i>"Gestion de votre profile:"</i> </p>
                    <p><i>Bonjour <?php echo $user->nom_user . ' ' . $user->prenom_user ?></i> </p>
                    <p><i></i></p>
                </div>
            </div>
            <div class="row">  
                <div class="col-1"></div>
                <div id="tabs" class="col-10 event">
                    <ul>
                        <li class=""><a href="#tabs-1">Identification</a></li>
                        <!--<li><a href="#tabs-2">Mes endroits favoris</a></li>-->
                        <li><a href="#tabs-3">Mes Soirées</a></li>
                    </ul>
                    <div id="tabs-1" class="event">

                        <div class="col-12 tab-content">
                            <div class="center">

                                <?php
                                echo '<h2> ' .$genre.' '. $user->nom_user . ' ' . $user->prenom_user . '</h2>';
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
                            <form method="POST" action="<?php echo base_url() ?>user/UserProfile_controller/resetPassword">
                                <fieldset>
                                    <legend class="userForm">Mettre à jour Votre mot de Passe:</legend>
                                    <div class="col-4">
                                        <label>Changer de Mot de passe</label>
                                    </div>
                                    <div class="col-7">
                                        <input  type="password" name="old_pass" placeholder="ancien mot de passe"/><br>
                                        <br>
                                        <input type="password" id="pass" name="new_pass" placeholder="nouveau mot de passe"/><br>
                                        <br>
                                        <input type="password" id="confPass"  placeholder="confirler nouveau mot de passe"onchange="checkPasswordMatch()"/><br> 
                                        <div class="registrationFormAlert" id="divCheckPasswordMatch"></div>
                                    </div>
                                    <div class="col-1">
                                        <button type="submit" id="search_btn" class="btn btn-round btn-orange"><i class="">Mettre à jour</i></button>
                                    </div>
                                </fieldset>
                            </form>

                        </div>                   


                    </div>
<!--                    <div id="tabs-2">
                        <p>Morbi tincidunt, dui sit amet facilisis feugiat, odio metus gravida ante, ut pharetra massa metus id nunc. Duis scelerisque molestie turpis. Sed fringilla, massa eget luctus malesuada, metus eros molestie lectus, ut tempus eros massa ut dolor. Aenean aliquet fringilla sem. Suspendisse sed ligula in ligula suscipit aliquam. Praesent in eros vestibulum mi adipiscing adipiscing. Morbi facilisis. Curabitur ornare consequat nunc. Aenean vel metus. Ut posuere viverra nulla. Aliquam erat volutpat. Pellentesque convallis. Maecenas feugiat, tellus pellentesque pretium posuere, felis lorem euismod felis, eu ornare leo nisi vel felis. Mauris consectetur tortor et purus.</p>
                    </div>-->
                    <div id="tabs-3">

                        <?php
                        if (isset($events)) {
                            echo '<h2>Vous êtes inscrit à des événements:</h2>';
                            echo '<table>';
                            echo '<thead>
                                
                            <tr role="row">
                                <th class="sorting_asc" tabindex="0" aria-controls="example-1" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 175px;">Nom de la soirée</th>
                                <th class="sorting" tabindex="0" aria-controls="example-1" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 256px;">date</th>
                                <th class="sorting" tabindex="0" aria-controls="example-1" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 130px;">heure</th>
                                <th class="sorting" tabindex="0" aria-controls="example-1" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 43px;">statut</th>
                                <th class="sorting" tabindex="0" aria-controls="example-1" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 43px;">ref réservation</th></tr>
                        </thead>
                        <br>
                        <tbody>';
                            foreach ($events as $event) {
                               
                                $eventModel = new Events_model();
                                $eventDetail = $eventModel->getEventDetailsById($event->id_event);
                                echo' <tr>
                        <td>' . $eventDetail->nom_event . '</td>
                        <td>' . $eventDetail->date_event . '</td>
                        <td>' . $eventDetail->heure_event . '</td>
                        <td>' . $event->status_resa . '</td>
                        <td>' . $event->ref_resa . '</td>
                        </tr><br>';
                            }
                            echo '</tbody';
                            echo '</table>';
                           
                        }
                        ?>
                    </div>
                </div>
                <div class="colF-1"></div>

            </div>

        </div>
    </div>
    <script>
        $(function () {
            $("#tabs").tabs();
        });

        if (datefield.type != "date") { // if browser doesn't support input type="date", initialize date picker widget:
            jQuery(function ($) { // on document.ready
                $('#birthday').datepicker();
            });
        }
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
