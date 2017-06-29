<?php ob_start();?>

<?php

require_once ENTITY.'/Post.php';
require_once MANAGER.'/PostManager.php';

use App\Entity\Post;
use App\Manager\PostManager;

require_once 'Vue/addPost.php';