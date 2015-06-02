<?php

namespace ItechSup\QuestionnaireBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Question
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ItechSup\QuestionnaireBundle\Entity\QuestionRepository")
 */
class Question
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
     * @var Categorie
     * @ORM\ManyToOne(targetEntity="Categorie",inversedBy="questions")
     * @ORM\JoinColumn(name="categorie_id",referencedColumnName="id")
     */
    private $categorie;
    
    /**
     *
     * @var ArrayCollection()
     * @ORM\OneToMany(targetEntity="Reponse",mappedBy="question")
     */
    private $reponses;
    
    /**
     *
     * @var ArrayCollection()
     * @ORM\OneToMany(targetEntity="Commentaire",mappedBy="question")
     */
    private $commentaire;
    
    
    public function __construct() {
        $this->commentaire = new ArrayCollection();
        $this->reponses = new ArrayCollection();
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
     * @return Question
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
     * Set categorie
     *
     * @param \ItechSup\QuestionnaireBundle\Entity\Categorie $categorie
     * @return Question
     */
    public function setCategorie(\ItechSup\QuestionnaireBundle\Entity\Categorie $categorie = null)
    {
        $this->categorie = $categorie;

        return $this;
    }

    /**
     * Get categorie
     *
     * @return \ItechSup\QuestionnaireBundle\Entity\Categorie 
     */
    public function getCategorie()
    {
        return $this->categorie;
    }

    /**
     * Add reponse
     *
     * @param \ItechSup\QuestionnaireBundle\Entity\Reponse $reponses
     * @return Question
     */
    public function addReponse(\ItechSup\QuestionnaireBundle\Entity\Reponse $reponses)
    {
        $this->reponse[] = $reponses;

        return $this;
    }

    /**
     * Remove reponse
     *
     * @return Question
     * @return \ItechSup\QuestionnaireBundle\Entity\Reponse 
     */
    public function removeReponse(\ItechSup\QuestionnaireBundle\Entity\Reponse $reponses)
    {
        return $this->reponse->removeElement($reponses);
    }
    
    /**
     * Get reponse
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getReponses()
    {
        return $this->reponses;
    }

    /**q
     * Add commentaires
     *
     * @param \ItechSup\QuestionnaireBundle\Entity\Commentaire $commentaires
     * @return Question
     */
    public function addCommentaire(\ItechSup\QuestionnaireBundle\Entity\Commentaire $commentaires)
    {
        $this->commentaire[] = $commentaires;

        return $this;
    }

    /**
     * Remove commentaires
     *
     * @param \ItechSup\QuestionnaireBundle\Entity\Commentaire $commentaires
     */
    public function removeCommentaire(\ItechSup\QuestionnaireBundle\Entity\Commentaire $commentaires)
    {
        $this->commentaire->removeElement($commentaires);
    }

    /**
     * Get commentaires
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCommentaires()
    {
        return $this->commentaire;
    }
}
