<?php
/**
 * Created by PhpStorm.
 * User: oumarucho
 * Date: 18/06/2017
 * Time: 16:32
 */

namespace App\Manager;

use PDO;
use App\Entity\Post;
use App\Entity\Utilisateurs;


class PostManager
{
    private $bdd;
    private $pdoStatement;

    public function __construct()
    {
        $this->bdd = new PDO('mysql:host=localhost;dbname=projet5;charset=utf8', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));
        $this->setDatepost = new \DateTime();
    }

    private function create(Post &$post)
    {
        $this->pdoStatement = $this->bdd->prepare('INSERT into post(titre,introduction,auteur,contenu,datepost) VALUES(:titre,:introduction,:auteur,:contenu,:NOW())');

        $this->pdoStatement->bindValue(':titre',$post->getTitre(),PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':introduction',$post->getIntroduction(),PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':auteur',$post->getAuteur(),PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':contenu',$post->getContenu(),PDO::PARAM_STR);


        $isOkay = $this->pdoStatement->execute();

        if ($isOkay)
        {
            $id = $this->bdd->lastInsertId();
            $post = $this->read($id);
            return true;
        }
        else
        {
            return false;
        }

    }

     public function read($id)
    {
        $this->pdoStatement = $this->bdd->prepare('SELECT * FROM post WHERE id = :id');

        $this->pdoStatement->bindValue(':id',$id,PDO::PARAM_INT);

        $isOkay = $this->pdoStatement->execute();

        if ($isOkay)
        {

            $post = $this->pdoStatement->fetchObject('App\Entity\Post');
        }

        else
        {

            return false;
        }

        return $post;
    }

     public function readAll()
    {
        $this->pdoStatement = $this->bdd->query('SELECT * FROM post ORDER BY datepost');

        $posts = [];

        while ($post = $this->pdoStatement->fetchObject('App\Entity\Post'))
        {
            $posts[] = $post;
        }

        return $posts;
    }

     private function update(Post $post)
    {
        $this->pdoStatement = $this->bdd->prepare('UPDATE post set titre=:titre, auteur=:auteur, introduction=:introduction, contenu=:contenu, datepost=:datepost WHERE id=:id LIMIT 1');

        $this->pdoStatement->bindValue(':titre',$post->getTitre(),PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':auteur',$post->getAuteur(),PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':introduction',$post->getIntroduction(),PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':contenu',$post->getContenu(),PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':datepost',$post->getDatepost(),PDO::PARAM_STR);


        return $this->pdoStatement->execute();
    }

     public function delete(Post $post)
    {
        $this->pdoStatement = $this->bdd->prepare('DELETE FROM post WHERE id=:id');

        $this->pdoStatement->bindValue(':id',$post->getId(),PDO::PARAM_INT);

        return $this->pdoStatement->execute();
    }

    public function save(Post $post)
    {
        if(is_null($post->getId()))
        {
            $this->create($post);
        }
        else
        {
            $this->update($post);
        }
    }

}