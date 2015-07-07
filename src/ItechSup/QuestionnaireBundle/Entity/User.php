<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace ItechSup\QuestionnaireBundle\Entity;

use FOS\UserBundle\Model\User as BaseUser;
use Doctrine\ORM\Mapping as ORM;

/**
 * @ORM\Entity
 * @ORM\Table(name="fos_user")
 */
class User extends BaseUser
{

    /**
     * @ORM\Id
     * @ORM\Column(type="integer")
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    protected $id;

    
    
    /**
     *
     * @var ArrayCollection()
     * @ORM\OneToMany(targetEntity="Reponse",mappedBy="etudiant")
     */
    protected $reponses;


    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Get Id
     *
     * @return string
     */
    function getId()
    {
        return $this->id;
    }

    /**
     * Add reponse
     *
     * @param \ItechSup\QuestionnaireBundle\Entity\Reponse $reponse
     *
     * @return User
     */
    public function addReponse(\ItechSup\QuestionnaireBundle\Entity\Reponse $reponse)
    {
        $this->reponses[] = $reponse;

        return $this;
    }

    /**
     * Remove reponse
     *
     * @param \ItechSup\QuestionnaireBundle\Entity\Reponse $reponse
     */
    public function removeReponse(\ItechSup\QuestionnaireBundle\Entity\Reponse $reponse)
    {
        $this->reponses->removeElement($reponse);
    }

    /**
     * Get reponses
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getReponses()
    {
        return $this->reponses;
    }


}
