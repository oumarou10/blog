<?php ob_start();?>

<?php

require_once ENTITY.'/Post.php';
require_once MANAGER.'/PostManager.php';

use App\Entity\Post;
use App\Manager\PostManager;

$em = new PostManager();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{
    $data = $_POST;
    $postForm = new Post($data);

    var_dump($postForm);
}

$posts = $em->readAll();

var_dump($posts);

require_once 'Vue/posts.php';