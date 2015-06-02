<?php

namespace ItechSup\QuestionnaireBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Etudiant
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ItechSup\QuestionnaireBundle\Entity\EtudiantRepository")
 */
class Etudiant
{
    /**
     * @var integer
     *
     * @ORM\Column(name="id", type="integer")
     * @ORM\Id
     * @ORM\GeneratedValue(strategy="AUTO")
     */
    private $id;

    /**
     * @var string
     *
     * @ORM\Column(name="nom", type="string", length=255)
     */
    private $nom;

    /**
     * @var string
     *
     * @ORM\Column(name="prenom", type="string", length=255)
     */
    private $prenom;

    /**
     *
     * @var Questionnaire
     * @ORM\OneToOne(targetEntity="Questionnaire") 
     */
    private $questionnaire;
    
    /**
     *
     * @var Formation
     * @ORM\ManyToOne(targetEntity="Formation",inversedBy="etudiants")
     * @ORM\JoinColumn(name="formation_id",referencedColumnName="id")
     */
    private $formation;
    
    /**
     * Get id
     *
     * @return integer 
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set nom
     *
     * @param string $nom
     * @return Etudiant
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
     * @return Etudiant
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
     * Set questionnaire
     *
     * @param \ItechSup\QuestionnaireBundle\Entity\Questionnaire $questionnaire
     * @return Etudiant
     */
    public function setQuestionnaire(\ItechSup\QuestionnaireBundle\Entity\Questionnaire $questionnaire = null)
    {
        $this->questionnaire = $questionnaire;

        return $this;
    }

    /**
     * Get questionnaire
     *
     * @return \ItechSup\QuestionnaireBundle\Entity\Questionnaire 
     */
    public function getQuestionnaire()
    {
        return $this->questionnaire;
    }

    /**
     * Set formation
     *
     * @param \ItechSup\QuestionnaireBundle\Entity\Formation $formation
     * @return Etudiant
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
