       <div id="contenu">

           <?=$titre = 'Post numéro';?>

           <div>



               <div class="row">
                    <div class="col-sm-6">
                        <div class="post-block">
                             <a href="?post.php">
                                <h3><?=  $poste->getTitre()?></h3>
                            </a>

                            <h4><em>  Ecrit le :<?= $poste->getDatepost()?></h4>

                            <div class="red-divider"></div>
                            <p> <p> <?= $poste->getContenu()?> </p></p>

                        </div>
                    </div>


            </div>

        </div>

    </div>

<?php $contenu = ob_get_clean();

require 'layout.php';
