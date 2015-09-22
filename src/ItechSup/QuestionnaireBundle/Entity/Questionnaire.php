<?php

namespace ItechSup\QuestionnaireBundle\Entity;

use Doctrine\ORM\Mapping as ORM;
use Doctrine\Common\Collections\ArrayCollection;

/**
 * Questionnaire
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ItechSup\QuestionnaireBundle\Entity\QuestionnaireRepository")
 */
class Questionnaire
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
     * @ORM\Column(name="titre", type="string", length=255)
     */
    private $titre;
    
    /**
     * @var ArrayCollection()
     * @ORM\ManyToMany(targetEntity="Formation", inversedBy="questionnaires")
     */
    private $formations;
    
    
    /**
     *
     * @var ArrayCollection()
     * @ORM\OneToMany(targetEntity="Categorie",mappedBy="questionnaire")
     */
    private $categories;

    /**
     *
     * @var ArrayCollection()
     * @ORM\OneToMany(targetEntity="Commentaire",mappedBy="questionnaire")
     */
    private $commentaires;

    public function __construct()
    {
        $this->categories = new ArrayCollection();
        $this->commentaires = new ArrayCollection();
        $this->etudiants = new ArrayCollection();
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
     * Set titre
     *
     * @param string $titre
     * @return Questionnaire
     */
    public function setTitre($titre)
    {
        $this->titre = $titre;

        return $this;
    }

    /**
     * Get titre
     *
     * @return string 
     */
    public function getTitre()
    {
        return $this->titre;
    }

    /**
     * Add categories
     *
     * @param \ItechSup\QuestionnaireBundle\Entity\Categorie $categories
     * @return Questionnaire
     */
    public function addCategory(\ItechSup\QuestionnaireBundle\Entity\Categorie $categories)
    {
        $this->categories[] = $categories;

        return $this;
    }

    /**
     * Remove categories
     *
     * @param \ItechSup\QuestionnaireBundle\Entity\Categorie $categories
     */
    public function removeCategory(\ItechSup\QuestionnaireBundle\Entity\Categorie $categories)
    {
        $this->categories->removeElement($categories);
    }

    /**
     * Get categories
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCategories()
    {
        return $this->categories;
    }
    
    /**
     * Set categories
     *
     * @param \ItechSup\QuestionnaireBundle\Entity\Categories $categories
     * @return Questionnaire 
     */
    public function setCategories(ArrayCollection $categories)
    {
        
        $this->categories=$categories;
    }

    /**
     * Add commentaires
     *
     * @param \ItechSup\QuestionnaireBundle\Entity\Commentaire $commentaires
     * @return Questionnaire
     */
    public function addCommentaire(\ItechSup\QuestionnaireBundle\Entity\Commentaire $commentaires)
    {
        $this->commentaires[] = $commentaires;

        return $this;
    }

    /**
     * Remove commentaires
     *
     * @param \ItechSup\QuestionnaireBundle\Entity\Commentaire $commentaires
     */
    public function removeCommentaire(\ItechSup\QuestionnaireBundle\Entity\Commentaire $commentaires)
    {
        $this->commentaires->removeElement($commentaires);
    }

    /**
     * Get commentaires
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getCommentaires()
    {
        return $this->commentaires;
    }

   
    /**
     * Add formation
     *
     * @param \ItechSup\QuestionnaireBundle\Entity\Formation $formation
     *
     * @return Questionnaire
     */
    public function addFormation(\ItechSup\QuestionnaireBundle\Entity\Formation $formation)
    {
        $this->formations[] = $formation;

        return $this;
    }

    /**
     * Remove formation
     *
     * @param \ItechSup\QuestionnaireBundle\Entity\Formation $formation
     */
    public function removeFormation(\ItechSup\QuestionnaireBundle\Entity\Formation $formation)
    {
        $this->formations->removeElement($formation);
    }

    /**
     * Get formations
     *
     * @return \Doctrine\Common\Collections\Collection
     */
    public function getFormations()
    {
        return $this->formations;
    }
    
    
}
