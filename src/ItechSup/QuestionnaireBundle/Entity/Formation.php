<?php

namespace ItechSup\QuestionnaireBundle\Entity;

use Doctrine\ORM\Mapping as ORM;

/**
 * Formation
 *
 * @ORM\Table()
 * @ORM\Entity(repositoryClass="ItechSup\QuestionnaireBundle\Entity\FormationRepository")
 */
class Formation
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
     * @ORM\Column(name="promotion", type="string", length=255)
     */
    private $promotion;

    /**
     *
     * @var ArrayCollection()
     * @ORM\OneToMany(targetEntity="User",mappedBy="formation")
     */
    private $etudiants;
    
    
    public function __construct() {
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
     * Set libelle
     *
     * @param string $libelle
     * @return Formation
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
     * Set promotion
     *
     * @param string $promotion
     * @return Formation
     */
    public function setPromotion($promotion)
    {
        $this->promotion = $promotion;

        return $this;
    }

    /**
     * Get promotion
     *
     * @return string 
     */
    public function getPromotion()
    {
        return $this->promotion;
    }

    /**
     * Add etudiants
     *
     * @param \ItechSup\QuestionnaireBundle\Entity\Etudiant $etudiants
     * @return Formation
     */
    public function addEtudiant(\ItechSup\QuestionnaireBundle\Entity\Etudiant $etudiants)
    {
        $this->etudiants[] = $etudiants;

        return $this;
    }

    /**
     * Remove etudiants
     *
     * @param \ItechSup\QuestionnaireBundle\Entity\Etudiant $etudiants
     */
    public function removeEtudiant(\ItechSup\QuestionnaireBundle\Entity\Etudiant $etudiants)
    {
        $this->etudiants->removeElement($etudiants);
    }

    /**
     * Get etudiants
     *
     * @return \Doctrine\Common\Collections\Collection 
     */
    public function getEtudiants()
    {
        return $this->etudiants;
    }
}
