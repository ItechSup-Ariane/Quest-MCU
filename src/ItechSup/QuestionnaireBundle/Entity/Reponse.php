<?php

namespace ItechSup\QuestionnaireBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Reponse
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ItechSup\QuestionnaireBundle\Entity\ReponseRepository")
 */
class Reponse
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
     * @ORM\Column(name="libelle", type="string", length=255)
     */
    private $libelle;
    
    /**
     *
     * @var Question
     * @ORM\ManyToOne(targetEntity="Question",inversedBy="reponses")
     * @ORM\JoinColumn(name="question_id",referencedColumnName="id")
     */
    private $question;
    
    /**
     *
     * @var ArrayCollection()
     * @ORM\OneToMany(targetEntity="Commentaire",mappedBy="reponsen")
     */
    private $commentaire;
    
    
    public function __construct() {
        $this->commentaire = new ArrayCollection();
    }

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
     * Set libelle
     *
     * @param string $libelle
     * @return Reponse
     */
    public function setLibelle($libelle)
    {
        $this->libelle = $libelle;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getLibelle()
    {
        return $this->libelle;
    }
    
    /**
     * Set question
     *
     * @param \ItechSup\QuestionnaireBundle\Entity\Question $question
     * @return reponse
     */
    public function setQuestion(\ItechSup\QuestionnaireBundle\Entity\Question $question = null)
    {
        $this->question = $question;

        return $this;
    }

    /**
     * Get question
     *
     * @return \ItechSup\QuestionnaireBundle\Entity\Question 
     */
    public function getQuestion()
    {
        return $this->question;
    }
}
