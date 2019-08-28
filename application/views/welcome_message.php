<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<body class="welcome">
    <h2>Fini le virtuel, passons au réel...</h2>
    <h2><?php echo base_url() ?></h2>

<!--    <a href="<?php echo base_url(); ?>welcome/test">accueil</a> du test-->
    <a href="<?php echo base_url(); ?>welcome/test">accueil</a> du test

    <div class="container">
        <div class="row">          
            <div class="col-6">
                <div id="search_input">
                    <div class="input-group">
                        <input id="search" name="search" type="text" class="autocomplete_input form-control" placeholder="Search" />
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        var BASE_URL = "<?php echo base_url(); ?>";

        $(document).ready(function () {
            $("#search").autocomplete({

                source: function (request, response) {
                    $.ajax({
                        url: BASE_URL + "ajax/Ajax_controller/search",

                        data: {
                            term: request.term
                        },
                        dataType: "json",
                        success: function (data) {

                            var resp = $.map(data, function (obj) {
                                return obj.nom_commune;
                            });

                            response(resp);
                        }
                    });
                },
                minLength: 3,

            });
        });
        
        

    </script>   
