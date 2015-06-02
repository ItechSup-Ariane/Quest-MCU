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
     * @var Reponse
     * @ORM\OneToOne(targetEntity="Reponse",mappedBy="question")
     */
    private $reponse;
    
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
     *
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
     *
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
     * Set reponse
     *
     * @param \ItechSup\QuestionnaireBundle\Entity\Reponse $reponse
     *
     * @return Question
     */
    public function setReponse(\ItechSup\QuestionnaireBundle\Entity\Reponse $reponse = null)
    {
        $this->reponse = $reponse;

        return $this;
    }

    /**
     * Get reponse
     *
     * @return \ItechSup\QuestionnaireBundle\Entity\Reponse
     */
    public function getReponse()
    {
        return $this->reponse;
    }

    /**
     * Add commentaire
     *
     * @param \ItechSup\QuestionnaireBundle\Entity\Commentaire $commentaire
     *
     * @return Question
     */
    public function addCommentaire(\ItechSup\QuestionnaireBundle\Entity\Commentaire $commentaire)
    {
        $this->commentaire[] = $commentaire;

        return $this;
    }

    /**
     * Remove commentaire
     *
     * @param \ItechSup\QuestionnaireBundle\Entity\Commentaire $commentaire
     */
    public function removeCommentaire(\ItechSup\QuestionnaireBundle\Entity\Commentaire $commentaire)
    {
        $this->commentaire->removeElement($commentaire);
    }

    /**
     * Get commentaire
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getCommentaire()
    {
        return $this->commentaire;
    }
}
