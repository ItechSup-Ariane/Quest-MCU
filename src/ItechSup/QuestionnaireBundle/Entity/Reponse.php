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
     * @ORM\Column(name="note", type="string", length=255)
     */
    private $note;

    /**
     * @ORM\ManyToOne(targetEntity="Question",inversedBy="reponses")
     * @ORM\JoinColumn(name="question_id", referencedColumnName="id")
     * */
    private $question;

    /**
     * @ORM\ManyToOne(targetEntity="User",inversedBy="reponses")
     * @ORM\JoinColumn(name="user_id", referencedColumnName="id")
     * */
    private $user;

    public function __construct()
    {
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
     * @param string $note
     * @return Reponse
     */
    public function setNote($note)
    {
        $this->note = $note;

        return $this;
    }

    /**
     * Get libelle
     *
     * @return string 
     */
    public function getNote()
    {
        return $this->note;
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

    /**
     * Set user
     *
     * @param \ItechSup\QuestionnaireBundle\Entity\User $user
     *
     * @return Reponse
     */
    public function setUser(\ItechSup\QuestionnaireBundle\Entity\User $user = null)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get user
     *
     * @return \ItechSup\QuestionnaireBundle\Entity\User
     */
    public function getUser()
    {
        return $this->user;
    }

}
