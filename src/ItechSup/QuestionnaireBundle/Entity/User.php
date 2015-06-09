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
    * @ORM\OneToOne(targetEntity="Etudiant")
    * @ORM\JoinColumn(name="etudiant_id", referencedColumnName="id",nullable=true)
    */
    protected $etudiant;
    
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    /**
     * Set etudiant
     *
     * @param \ItechSup\QuestionnaireBundle\Entity\Etudiant $etudiant
     *
     * @return User
     */
    public function setEtudiant(\ItechSup\QuestionnaireBundle\Entity\Etudiant $etudiant = null)
    {
        $this->etudiant = $etudiant;

        return $this;
    }

    /**
     * Get etudiant
     *
     * @return \ItechSup\QuestionnaireBundle\Entity\Etudiant
     */
    public function getEtudiant()
    {
        return $this->etudiant;
    }
}
