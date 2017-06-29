<?php

$root = $_SERVER['DOCUMENT_ROOT'].'/POO/blog';

define('ENTITY',$root.'/src/App/Entity');
define('MANAGER',$root.'/src/App/Manager');

if (isset($_GET['action']))
{
    $action = $_GET['action'];
}

else
{
    $action = 'accueilController';
}

$path = 'Controller/'.$action.'.php';

require_once $path;