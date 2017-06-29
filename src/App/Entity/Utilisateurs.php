<?php
/**
 * Created by PhpStorm.
 * User: oumarucho
 * Date: 28/06/2017
 * Time: 01:30
 */

namespace App\Entity;

class Utilisateurs
{
    private $id;
    private $pseudo;
    private $email;
    private $password;
    private $typed;

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
    public function getPseudo()
    {
        return $this->pseudo;
    }

    /**
     * @param mixed $pseudo
     * @return Utilisateurs
     */
    public function setPseudo($pseudo)
    {
        $this->pseudo = $pseudo;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param mixed $email
     * @return Utilisateurs
     */
    public function setEmail($email)
    {
        $this->email = $email;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * @param mixed $password
     * @return Utilisateurs
     */
    public function setPassword($password)
    {
        $this->password = $password;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTyped()
    {
        return $this->typed;
    }

    /**
     * @param mixed $typed
     * @return Utilisateurs
     */
    public function setTyped($typed)
    {
        $this->typed = $typed;
        return $this;
    }




}