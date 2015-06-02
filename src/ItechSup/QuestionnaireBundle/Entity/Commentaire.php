<?php

namespace ItechSup\QuestionnaireBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Commentaire
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ItechSup\QuestionnaireBundle\Entity\CommentaireRepository")
 */
class Commentaire
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
     * @var string
     *
     * @ORM\Column(name="zoneDeTexte", type="string", length=255)
     */
    private $zoneDeTexte;

    /**
     *
     * @var Questionnaire
     * @ORM\ManyToOne(targetEntity="Questionnaire",inversedBy="commentaires")
     * @ORM\JoinColumn(name="questionnaire_id",referencedColumnName="id")
     */
    private $questionnaire;
    
     /**
     *
     * @var Questionnaire
     * @ORM\ManyToOne(targetEntity="Question",inversedBy="commentaires")
     * @ORM\JoinColumn(name="question_id",referencedColumnName="id")
     */
    private $question;
    
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
     * @return Commentaire
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
     * Set zoneDeTexte
     *
     * @param string $zoneDeTexte
     * @return Commentaire
     */
    public function setZoneDeTexte($zoneDeTexte)
    {
        $this->zoneDeTexte = $zoneDeTexte;

        return $this;
    }

    /**
     * Get zoneDeTexte
     *
     * @return string 
     */
    public function getZoneDeTexte()
    {
        return $this->zoneDeTexte;
    }

    /**
     * Set questionnaire
     *
     * @param \ItechSup\QuestionnaireBundle\Entity\Questionnaire $questionnaire
     * @return Commentaire
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
     * Set question
     *
     * @param \ItechSup\QuestionnaireBundle\Entity\Question $question
     * @return Commentaire
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
