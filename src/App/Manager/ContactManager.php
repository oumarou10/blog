<?php
/**
 * Created by PhpStorm.
 * User: oumarucho
 * Date: 28/06/2017
 * Time: 01:33
 */

namespace App\Manager;

use PDO;

use App\Entity\Contact;



class ContactManager
{
    private $bdd;
    private $pdoStatement;

    public function __construct()
    {
        $this->bdd = new PDO('mysql:host=localhost;dbname=projet5;charset=utf8', 'root', 'root',array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION, PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC));
        $this->setDatepost = new \DateTime('Y');
    }

    private function create(Contact &$contact)
    {
        $this->pdoStatement = $this->bdd->prepare('INSERT into contact(message,utilisateurId) VALUES(:message,:utilisateurId)');

        $this->pdoStatement->bindValue(':message',$contact->getMessage(),PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':utilisateurId',$contact->getId(),PDO::PARAM_STR);

        $isOkay = $this->pdoStatement->execute();

        if ($isOkay)
        {
            $id = $this->bdd->lastInsertId();
            $contact = $this->read($id);
            return true;
        }
        else
        {
            return false;
        }

    }

     public function read($id)
    {
        $this->pdoStatement = $this->bdd->prepare('SELECT * FROM contact WHERE id = :id');

        $this->pdoStatement->bindValue(':id',$id,PDO::PARAM_INT);

        $isOkay = $this->pdoStatement->execute();

        if ($isOkay)
        {

            $contact = $this->pdoStatement->fetchObject('App\Entity\Contact');
        }

        else
        {

            return false;
        }

        return $contact;
    }

     public function readAll()
    {
        $this->pdoStatement = $this->bdd->query('SELECT * FROM contact');

        $contacts = [];

        while ($contact = $this->pdoStatement->fetchObject('App\Entity\Contact'))
        {
            $contacts[] = $contact;
        }

        return $contacts;
    }

     private function update(Contact $contact)
    {
        $this->pdoStatement = $this->bdd->prepare('UPDATE contact set message=:message WHERE id=:id LIMIT 1');

        $this->pdoStatement->bindValue(':message',$contact->getMessage(),PDO::PARAM_STR);
        $this->pdoStatement->bindValue(':id',$contact->getId(),PDO::PARAM_INT);

        return $this->pdoStatement->execute();
    }

     public function delete(Contact $contact)
    {
        $this->pdoStatement = $this->bdd->prepare('DELETE FROM contact WHERE id=:id');

        $this->pdoStatement->bindValue(':id',$contact->getId(),PDO::PARAM_INT);

        return $this->pdoStatement->execute();
    }

    public function save(Contact $contact)
    {
        if(is_null($contact->getId()))
        {
            $this->create($contact);
        }
        else
        {
            $this->update($contact);
        }
    }
}