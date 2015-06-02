<?php

namespace ItechSup\QuestionnaireBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * QuestionnaireRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class QuestionnaireRepository extends EntityRepository
{
    public function findGraph($id){
     $query = $this->getEntityManager()
        ->createQuery('
            SELECT q.id as idquestionnaire,q.titre,c.id as idcategorie,c.libelle as lblcategorie,qt.id as idquestion,qt.libelle as lblquestion,r.id as idreponse,r.note FROM ItechSupQuestionnaireBundle:Questionnaire q
            JOIN q.Categorie c
            JOIN c.Question qt
            JOIN qt.Reponse r
            WHERE q.id = :id
            ORDER BY q,c,qt'
        )->setParameter('id', $id);

    try {
        return $query->getResult();
    } catch (\Doctrine\ORM\NoResultException $e) {
        return null;
    }
}
    public function findAllCategories($titre){
     $query = $this->getEntityManager()
        ->createQuery('
            SELECT c FROM ItechSupQuestionnaireBundle:Categorie c
            JOIN c.Questionnaire q
            WHERE q.titre = :titre'
        )->setParameter('titre', $titre);

    try {
        return $query->getSingleResult();
    } catch (\Doctrine\ORM\NoResultException $e) {
        return null;
    }
    
    
}
}