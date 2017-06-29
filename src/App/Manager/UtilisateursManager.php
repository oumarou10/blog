<?php
/**
 * Created by PhpStorm.
 * User: oumarucho
 * Date: 28/06/2017
 * Time: 01:07
 */

namespace App\Manager;

use PDO;
use App\Entity\Utilisateurs;


class UtilisateursManager
{
    private $bdd;
    private $pdoStatement;

    public function __construct()
    {
        $this->bdd = new PDO('mysql:host=localhost;dbname=projet5;charset=utf8', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));
        $this->setDatepost = new \DateTime('Y');
    }

    private function create(Utilisateurs &$utilisateur)
    {
        $this->pdoStatement = $this->bdd->prepare('INSERT into utilisateurs(pseudo,email,password,typed) VALUES(:pseudo,:email,:password,:typed)');

        $this->pdoStatement->bindValue(':message',$utilisateur->getPseudo(),PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':message',$utilisateur->getEmail(),PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':message',$utilisateur->getPassword(),PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':message',$utilisateur->getTyped(),PDO::PARAM_INT);
        $this->pdoStatement->bindValue(':utilisateur_id',$utilisateur->getId(),PDO::PARAM_INT);

        $isOkay = $this->pdoStatement->execute();

        if ($isOkay)
        {
            $id = $this->bdd->lastInsertId();
            $utilisateur = $this->read($id);
            return true;
        }
        else
        {
            return false;
        }

    }

     public function read($id)
    {
        $this->pdoStatement = $this->bdd->prepare('SELECT * FROM utilisateurs WHERE id = :id');

        $this->pdoStatement->bindValue(':id',$id,PDO::PARAM_INT);

        $isOkay = $this->pdoStatement->execute();

        if ($isOkay)
        {

            $contact = $this->pdoStatement->fetchObject('App\Entity\Utilisateurs');
        }

        else
        {

            return false;
        }

        return $contact;
    }

     public function readAll()
    {
        $this->pdoStatement = $this->bdd->query('SELECT * FROM utilisateurs');

        $utulisateurs = [];

        while ($utilisateur = $this->pdoStatement->fetchObject('App\Entity\Utilisateurs'))
        {
            $utulisateurs[] = $utilisateur;
        }

        return $utulisateurs;
    }

     private function update(Utilisateurs $utilisateur)
    {
        $this->pdoStatement = $this->bdd->prepare('UPDATE utilisateurs set pseudo=:pseudo, :email,:password,:typed WHERE id=:id LIMIT 1');

        $this->pdoStatement->bindValue(':pseudo',$utilisateur->getPseudo(),PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':email',$utilisateur->getEmail(),PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':password',$utilisateur->getPassword(),PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':typed',$utilisateur->getTyped(),PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':id',$utilisateur->getId(),PDO::PARAM_INT);

        return $this->pdoStatement->execute();
    }

     public function delete(Utilisateurs $utilisateur)
    {
        $this->pdoStatement = $this->bdd->prepare('DELETE FROM utilisateurs WHERE id=:id');

        $this->pdoStatement->bindValue(':id',$utilisateur->getId(),PDO::PARAM_INT);

        return $this->pdoStatement->execute();
    }

    public function save(Utilisateurs $utilisateur)
    {
        if(is_null($utilisateur->getId()))
        {
            $this->create($utilisateur);
        }
        else
        {
            $this->update($utilisateur);
        }
    }


}