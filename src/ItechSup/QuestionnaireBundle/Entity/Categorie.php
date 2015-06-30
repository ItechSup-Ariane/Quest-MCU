<?php

namespace ItechSup\QuestionnaireBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Categorie
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ItechSup\QuestionnaireBundle\Entity\CategorieRepository")
 */
class Categorie
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
     * @var Questionnaire
     * @ORM\ManyToOne(targetEntity="Questionnaire",inversedBy="categories")
     * @ORM\JoinColumn(name="questionnaire_id",referencedColumnName="id")
     */
    private $questionnaire;

    /**
     *
     * @var ArrayCollection()
     * @ORM\OneToMany(targetEntity="Question",mappedBy="categorie")
     */
    private $questions;

    public function __construct()
    {
        $this->questions = new ArrayCollection();
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
     * @return Categorie
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
     * Set questionnaire
     *
     * @param \ItechSup\QuestionnaireBundle\Entity\Questionnaire $questionnaire
     * @return Categorie
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
     * Add questions
     *
     * @param \ItechSup\QuestionnaireBundle\Entity\Question $questions
     * @return Categorie
     */
    public function addQuestion(\ItechSup\QuestionnaireBundle\Entity\Question $questions)
    {
        $this->questions[] = $questions;

        return $this;
    }

    /**
     * Remove questions
     *
     * @param \ItechSup\QuestionnaireBundle\Entity\Question $questions
     */
    public function removeQuestion(\ItechSup\QuestionnaireBundle\Entity\Question $questions)
    {
        $this->questions->removeElement($questions);
    }

    /**
     * Get questions
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getQuestions()
    {
        return $this->questions;
    }

}
