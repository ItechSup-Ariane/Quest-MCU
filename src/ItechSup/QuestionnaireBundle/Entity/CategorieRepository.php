<?php

namespace ItechSup\QuestionnaireBundle\Entity;

use Doctrine\ORM\EntityRepository;

/**
 * CategorieRepository
 *
 * This class was generated by the Doctrine ORM. Add your own custom
 * repository methods below.
 */
class CategorieRepository extends EntityRepository
{
    public function findAllQuestions($id){
     $query = $this->getEntityManager()
        ->createQuery('
            SELECT q FROM ItechSupQuestionnaireBundle:Question q
            WHERE q.categorie_id = :id'
        )->setParameter('id', $id);

    try {
        return $query->getResult();
    } catch (\Doctrine\ORM\NoResultException $e) {
        return null;
    }
    
    
}
}