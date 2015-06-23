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
     * @var ArrayCollection()
     * @ORM\ManyToMany(targetEntity="Questionnaire", inversedBy="etudiants")
     * @ORM\JoinTable(name="etudiants_questionnaires")
     **/
     protected $questionnaires;
    
     
     /**
     *
     * @var ArrayCollection()
     * @ORM\OneToMany(targetEntity="Reponse",mappedBy="etudiant")
     */
    protected $reponses;
    
    /**
     *
     * @var Formation
     * @ORM\ManyToOne(targetEntity="Formation",inversedBy="etudiants")
     * @ORM\JoinColumn(name="formation_id",referencedColumnName="id")
     */
    protected $formation;
    
    public function __construct()
    {
        parent::__construct();
        // your own logic
    }

    

    /**
     * Set nom
     *
     * @param string $nom
     *
     * @return User
     */
    public function setNom($nom)
    {
        $this->nom = $nom;

        return $this;
    }

    /**
     * Get nom
     *
     * @return string
     */
    public function getNom()
    {
        return $this->nom;
    }

    /**
     * Set prenom
     *
     * @param string $prenom
     *
     * @return User
     */
    public function setPrenom($prenom)
    {
        $this->prenom = $prenom;

        return $this;
    }

    /**
     * Get prenom
     *
     * @return string
     */
    public function getPrenom()
    {
        return $this->prenom;
    }

    /**
     * Add questionnaire
     *
     * @param \ItechSup\QuestionnaireBundle\Entity\Questionnaire $questionnaire
     *
     * @return User
     */
    public function addQuestionnaire(\ItechSup\QuestionnaireBundle\Entity\Questionnaire $questionnaire)
    {
        $this->questionnaires[] = $questionnaire;

        return $this;
    }

    /**
     * Remove questionnaire
     *
     * @param \ItechSup\QuestionnaireBundle\Entity\Questionnaire $questionnaire
     */
    public function removeQuestionnaire(\ItechSup\QuestionnaireBundle\Entity\Questionnaire $questionnaire)
    {
        $this->questionnaires->removeElement($questionnaire);
    }

    /**
     * Get questionnaires
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getQuestionnaires()
    {
        return $this->questionnaires;
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

    /**
     * Set formation
     *
     * @param \ItechSup\QuestionnaireBundle\Entity\Formation $formation
     *
     * @return User
     */
    public function setFormation(\ItechSup\QuestionnaireBundle\Entity\Formation $formation = null)
    {
        $this->formation = $formation;

        return $this;
    }

    /**
     * Get formation
     *
     * @return \ItechSup\QuestionnaireBundle\Entity\Formation
     */
    public function getFormation()
    {
        return $this->formation;
    }
}
