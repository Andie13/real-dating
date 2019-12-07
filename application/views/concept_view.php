<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<body class="bg">
    <div class="login-wrapper container-fluid">
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
                    echo '<a href = "' . base_url() . 'user/Login_controller">Connexion</a>';
                    echo '<a href = "' . base_url() . 'user/inscription_controller"> Inscription</a>';
                }
                ?>

		        <a href = "#" class="active">Le concept</a>
		 <a href = "<?php echo base_url()?>welcome/" class="">Accueil</a>
		
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </div>

	    <div class="clearfix"></div>
        <div class=" col-lg-12 col-xs-12 content ">

            <div class="row">
                <div class=" col-12 accroche">
     
                    <p><i>"Osez le speed - dating pour faire des vraies rencontres
<br>Rencontrez des célibataires en tête à tête !
"</i></p>                
                </div>
            </div>
           
            <div class="col-10 event about">
            <h2>
            Qui peut participer à nos soirées ?
            </h2>
                <p>
					Participez seul(e), venez avec des ami(e)s ou en groupe.
Toute personne majeure désirant de lier des relations sentimentales.


                </p>
                  <h2>
          Comment sont sélectionnés les participants ?
            </h2>
                <p>
			La sélection se fait selon leur profil et leur âge.  </p>
                <h2>Où se passe l'évènement ?</h2>
                <p>Les soirées se déroulent dans un bar ou un pub branché en passant par un restaurant ou un endroit original, il y en aura pour tous les goûts.</p>
          
            <hFaut il réserver ?</h2>
            <p>Oui car les places partent très vite !
Réservez le plus rapidement possible votre inscription avant que l'on soit complet !
Les places sont à réserver sur le site web www.realdate.com
Un numéro vous sera transmis et vous sera demandé lors de votre arrivée, ceci pour vérifier votre inscription.
</p>
            <h2>Quelle tenue vestimentaire à adopter ?</h2>
            <p>Soignez votre apparence car la première impression est importante mais nous vous conseillons de porter une tenue dans laquelle vous vous sentez à l'aise.
Règles à respecter :
1 - Les participants peuvent évoquer tous les sujets qu'ils souhaitent à une condition : aucune information ne sera divulguée concernant le nom, l'adresse e-mail, le numéro de téléphone, etc.
2 - L'anonymat de chacun doit être rigoureusement respecté.
3 - Les partenaires ne doivent pas dévoiler s'ils ont l'intention de se revoir ou non après leur tête à tête.
</p>
            <h2>Comment se déroule la soirée ?</h2>
            <p>A votre arrivée, l'animatrice vous accueille, vous demande votre prénom et le numéro qui vous a été attribué lors de votre réservation et vous remet une fiche que vous conservez jusqu'à la fin de la soirée, vous explique le déroulement de la soirée et l'animation s'il y en a une.
L'organisatrice vous invite à prendre place à une table.
Chaque tête à tête dure de 5 à 10 minutes. Le temps écoulé, l'animatrice demande aux hommes de changer de table, les femmes restent à leur place.
Pendant chaque tête à tête notez le maximum d'informations sur vos interlocuteurs.
A l'issue de la séance,  chaque participant inscrit sur un papier le prénom des personnes qu'il souhaite revoir et le remet à l'organisatrice. C'est l'agence qui se chargera de mettre en relation, dans les 48 h, les célibataires qui se sont réciproquement plus.
Ensuite l'animatrice invitera, séparemment, les femmes et les hommes pour faire le bilan de la soirée.

</p>

            <h2>Prenez-vous des photos ou filmez- vous lors des soirées ?</h2>
            <p>Seulement si vous êtes d'accord.

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


