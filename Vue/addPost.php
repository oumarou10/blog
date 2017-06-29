       <div id="contenu">

           <?=$titre = 'Ajout Post';?>

           <div>

               <form action="?action=postsController" method="POST">

                   <div>
                       <label for="titre"> Titre</label>
                        <input type="text" name="titre" id="titre">
                   </div>

                   <div>
                       <label for="introduction"> Introduction</label>
                        <input type="text" name="introduction" id="introduction">
                   </div>

                   <div>
                       <label for="contenu"> Contenu</label>
                        <input type="text" name="contenu" id="contenu">
                   </div>

                   <div>
                        <input type="hidden" name="datepost" id="datepost" value="<?=date('d-m-Y')?>">
                   </div>

                     <div>
                       <label for="utilisateurId"> Auteur</label>
                        <input type="hidden" name="utilisateurId" id="utilisateurId">
                   </div>


                   <div>
                       <button type="submit" class="btn btn-primary btn-lg">Envoyer</button>
                   </div>

               </form>

        </div>

    </div>

<?php $contenu = ob_get_clean();

require 'layout.php';