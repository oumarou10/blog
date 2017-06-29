<?php ob_start();?>

<?php

require_once ENTITY.'/Post.php';
require_once MANAGER.'/PostManager.php';
require_once ENTITY.'/Entity.php';

use App\Entity\Post;
use App\Manager\PostManager;

if (isset($_GET['id'])){
    $Id = (int) $_GET['id'];
}

$postUnique = new Post();
$em = new PostManager();

$poste = $em->read($Id);


require_once 'Vue/post.php';
