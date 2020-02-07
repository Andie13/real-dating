<?php
    $em = new Events_model();
    $event = $em->getEventDetailsById($id_event);
   
?>
<body class="bg welcome">

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
                    echo '<a href = "' . base_url() . 'user/Login_controller">Connexion</a>';
                    echo '<a href = "' . base_url() . 'user/inscription_controller"> Inscription</a>';
                }
                ?>

                <a href = "<?php echo base_url() ?>welcome/gotoConcept">Le concept</a>
                <a href = "<?php echo base_url() ?>welcome/" class="">Accueil</a>
                <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                    <i class="fa fa-bars"></i>
                </a>
            </div>
        </div>
        <div class=" col-lg-12 col-xs-12 content ">
  <div class="row">
        <div class="col-md-6 col-md-offset-1">
            <div class="panel panel-default credit-card-box">
                <div class="panel-heading display-table" >
                    <div class="row display-tr" >
                        <h3 class="panel-title display-td" >Payment Details</h3>
                        <div class="display-td" >                            
                            <img class="img-responsive pull-right" src="https://i76.imgup.net/accepted_c22e0.png">
                        </div>
                    </div>                    
                </div>
                <div class="panel-body">
    
                    <?php if($this->session->flashdata('success')){ ?>
                    <div class="alert alert-success text-center">
                        
                         <a href="#" class="close" data-dismiss="alert" aria-label="close">×</a>
                            <p><?php echo $this->session->flashdata('success'); ?></p>
                        </div>
                    <?php } ?>
                     <div class="retour"><a href=" <?php echo base_url() . 'events/Events_controller?ville=' . $ville->nom_commune ?>"> 
                            <h3> <<  RETOUR VERS LA LISTE D'ÉVÉNEMENTS  <<
                            </h3>
                        </a>
                    </div>
                    <form role="form" action="<?php echo base_url().'Stripe_controller/stripePost?id='.$event->id_event;?>" method="post" class="require-validation"
                                                     data-cc-on-file="false"
                                                    data-stripe-publishable-key="<?php echo $this->config->item('stripe_key') ?>"
                                                    id="payment-form">
     
                        <div class='form-row row'>
                            <div class='col-xs-12 form-group required'>
                                <label class='control-label'>Nom sur la carte</label> <input
                                    class='form-control' size='4' type='text'>
                            </div>
                        </div>
                         <div class='form-row row'>
                            <div class='col-xs-12 form-group card required'>
                                <label class='control-label'>N° de carte</label> <input
                                    autocomplete='off' class='form-control card-number' size='20'
                                    type='text'>
                            </div>
                        </div>
      
                        <div class='form-row row'>
                            <div class='col-xs-12 col-md-12 form-group cvc required'>
                                <label class='control-label'>CVV</label> <input autocomplete='off' class='form-control card-cvc' placeholder='ex. 311' size='4'
                                    type='text'>
                            </div>
                            <br>
                            <label class='col-xs-12 col-md-12'>Expire le:</label>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>Mois</label> <input
                                    class='form-control card-expiry-month' placeholder='MM' size='2'
                                    type='text'>
                            </div>
                            <div class='col-xs-12 col-md-4 form-group expiration required'>
                                <label class='control-label'>année</label> <input
                                    class='form-control card-expiry-year' placeholder='YYYY' size='4'
                                    type='text'>
                            </div>
                        </div>
                        
                        <div class='form-row row'>
                            <div class='col-md-12 error form-group hide'>
                                <div class='alert-danger alert'>Please correct the errors and try
                                    again.</div>
                            </div>
                        </div>
      
                        <div class="row">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg btn-block" type="submit">Pay Now (<?php  echo $event->prix_event ?>€)</button>
                            </div>
                        </div>
                             
                    </form>
                </div>
            </div>        
        </div>
      <div class="col-md-3 col-md-offset-1 event">
          <h2>Récapitulatif de la commande:</h2>
          <h3><?php echo $event->nom_event;?></h3>
          <h3><?php setlocale(LC_TIME, "fr_FR"); echo strftime("1 place pour le %d %B %Y", strtotime( $event->date_event ));;?></h3>
          <h3><?php echo 'à '. date_format(new DateTime($event->heure_event), "H")
                            . ' h ' . date_format(new DateTime($event->heure_event), 'i')
                            ?></h3>
          <h2>Montant à régler: <?php echo $event->prix_event ?>€</h2>
      </div>
    </div>
        </div>
<script type="text/javascript" src="https://js.stripe.com/v2/"></script>
     
<script type="text/javascript">
$(function() {
    var $form         = $(".require-validation");
  $('form.require-validation').bind('submit', function(e) {
    var $form         = $(".require-validation"),
        inputSelector = ['input[type=email]', 'input[type=password]',
                         'input[type=text]', 'input[type=file]',
                         'textarea'].join(', '),
        $inputs       = $form.find('.required').find(inputSelector),
        $errorMessage = $form.find('div.error'),
        valid         = true;
        $errorMessage.addClass('hide');
 
        $('.has-error').removeClass('has-error');
    $inputs.each(function(i, el) {
      var $input = $(el);
      if ($input.val() === '') {
        $input.parent().addClass('has-error');
        $errorMessage.removeClass('hide');
        e.preventDefault();
      }
    });
     
    if (!$form.data('cc-on-file')) {
      e.preventDefault();
      Stripe.setPublishableKey($form.data('stripe-publishable-key'));
      Stripe.createToken({
        number: $('.card-number').val(),
        cvc: $('.card-cvc').val(),
        exp_month: $('.card-expiry-month').val(),
        exp_year: $('.card-expiry-year').val()
      }, stripeResponseHandler);
    }
    
  });
  function stripeResponseHandler(status, response) {
        if (response.error) {
            $('.error')
                .removeClass('hide')
                .find('.alert')
                .text(response.error.message);
        } else {
            var token = response['id'];
            $form.find('input[type=text]').empty();
            $form.append("<input type='hidden' name='stripeToken' value='" + token + "'/>");
            $form.get(0).submit();
        }
    }
     
});
</script>
