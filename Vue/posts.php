       <div id="contenu">

           <?=$titre = 'Tous les posts';?>

           <div>

               <?php foreach ($posts as $post): ?>

               <div class="row">
                    <div class="col-sm-6">
                        <div class="post-block">
                             <a href="?action=postController&&id=<?=$post->getId()?>">
                                <h3><?=  $post->getTitre()?></h3>
                            </a>

                            <h4><em>  Ecrit le :<?= $post->getDatepost()?></h4>

                            <div class="red-divider"></div>
                            <p> <p> <?= $post->getIntroduction()?> </p></p>

                        </div>
                    </div>

               <?php endforeach; ?>

            </div>

        </div>

    </div>



<?php $contenu = ob_get_clean();

require 'layout.php';
