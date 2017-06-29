<?php
/**
 * Created by PhpStorm.
 * User: oumarucho
 * Date: 18/06/2017
 * Time: 15:40
 */

namespace App\Entity;


class Post
{
    private $id;
    private $titre;
    private $auteur;
    private $introduction;
    private $contenu;
    private $datepost;

    /**
     * Post constructor.
     * @param $contenu
     */
    public function __construct($data = array())
    {
        if(!empty($data)){
            $this->hydrate($data);
        }
        //Pas de données -> données par défaut

    }


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
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * @param mixed $titre
     * @return post
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getIntroduction()
    {
        return $this->introduction;
    }

    /**
     * @param mixed $introduction
     * @return post
     */
    public function setIntroduction($introduction)
    {
        $this->introduction = $introduction;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getContenu()
    {
        return $this->contenu;
    }

    /**
     * @param mixed $contenu
     * @return post
     */
    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDatepost()
    {
        return $this->datepost;
    }

    /**
     * @param mixed $datepost
     * @return post
     */
    protected function setDatepost($datepost)
    {
        $this->datepost = $datepost;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAuteur()
    {
        return $this->auteur;
    }

    /**
     * @param mixed $auteur
     * @return Post
     */
    public function setAuteur($auteur)
    {
        $this->auteur = $auteur;
        return $this;
    }



    protected function hydrate($data)
    {
        foreach ($data as $key => $value)
        {
            $methodName = 'set' . ucfirst($key);
            if (!method_exists($this, $methodName))
            {
                throw new \UnexpectedValueException('La propriété «' . $methodName . '» n\'existe pas!');
            }
            //Sinon, on applique la propriété
            $this->$methodName($value);
        }
    }

}