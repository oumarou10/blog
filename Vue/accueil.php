       <div id="contenu">

            <?=$titre = 'accueil';?>

            <div class="col-xs-8 col-md-4 profile-picture">
               <p> <img src="asset/IMG_8983.JPG" alt="oumarou" class="img-circle"> </p>
            </div>

           <section id="about" class="container-fluid">
                <div class="col-xs-8 col-md-4 profile-picture">

                </div>
                <div class="heading">
                    <h1>Hello, c'est moi Lucho</h1>
                    <h3>Développeur Web</h3>
                </div>
             </section>

        </div>

<?php $contenu = ob_get_clean();

require 'layout.php';
