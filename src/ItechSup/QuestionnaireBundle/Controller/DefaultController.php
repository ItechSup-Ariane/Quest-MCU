<?php

namespace ItechSup\QuestionnaireBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;


class DefaultController extends Controller
{
        
    /**
     * @Route("/choix/{id}", name="afficher_questionnaire")
     * 
     */
    public function afficherAction($id){
        $em = $this->getDoctrine()->getManager();

        $questionnaire = $em->getRepository('ItechSupQuestionnaireBundle:Questionnaire')->find($id);
        if (!$questionnaire) {
            throw $this->createNotFoundException('Impossible de trouver ce questionnaire');
        }

        return $this->render('ItechSupQuestionnaireBundle:Default:afficher.html.twig', array(
            'questionnaire' => $questionnaire,
        ));
    }
    
    /**
     * @Route("/soumission/{id}", name="soumission")
     * @Method({"POST"})
     */
    public function validationAction($id){
        return $this->render('ItechSupQuestionnaireBundle:Default:index.html.twig', array(
            'id' => $id
        ));
    }
}
