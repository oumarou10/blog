<?php
/**
 * Created by PhpStorm.
 * User: oumarucho
 * Date: 28/06/2017
 * Time: 02:17
 */

namespace App\Entity;




use App\Entity\Entity;

class Contact
{
    private $id;
    private $message;
    private $utilisateurId;

    /**
     * @return mixed
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return mixed
     */
    public function getMessage()
    {
        return $this->message;
    }

    /**
     * @param mixed $message
     * @return Contact
     */
    public function setMessage($message)
    {
        $this->message = $message;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getUtilisateurId()
    {
        return $this->utilisateurId;
    }

    /**
     * @param mixed $utilisateurId
     * @return Contact
     */
    public function setUtilisateurId($utilisateurId)
    {
        $this->utilisateurId = $utilisateurId;
        return $this;
    }




}