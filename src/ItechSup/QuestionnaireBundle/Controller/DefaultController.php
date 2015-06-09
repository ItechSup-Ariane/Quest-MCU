<?php

namespace ItechSup\QuestionnaireBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use ItechSup\QuestionnaireBundle\Entity\Reponse;


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
        $user = $this->getUser();
        $em = $this->getDoctrine()->getManager();
        
        foreach($_POST as $key=>$value){
            $question=$em->getRepository('ItechSupQuestionnaireBundle:Question')->find($key);
            $etudiant=$em->getRepository('ItechSupQuestionnaireBundle:Etudiant')->find($user->getId());
            $this->insertRep($question,$value,$etudiant);
        }
        return $this->render('ItechSupQuestionnaireBundle:Default:index.html.twig');
    }
    
    /**
     * @Route("/admin/resume/{id}", name="resumeQuestionnaire")
     * 
     */
    public function resumeAction($id){
        $em = $this->getDoctrine()->getManager();
        $questionnaire = $em->getRepository('ItechSupQuestionnaireBundle:Questionnaire')->find($id);
        if (!$questionnaire) {
            throw $this->createNotFoundException('Impossible de trouver ce questionnaire');
        }
        
        return $this->render('ItechSupQuestionnaireBundle:Default:resume.html.twig', array(
            'questionnaire' => $questionnaire,
        ));
    }
    
    /**
     * insert response in database
     * 
     * 
     * @param question $question
     * @param string $value
     * @param etudiant $user
     * 
     */
    public function insertRep($question,$value,$user){
        $reponse = new Reponse();
        $reponse->setNote($value);
        $reponse->setQuestion($question);
        $reponse->setEtudiant($user);

        $em = $this->getDoctrine()->getManager();
        $em->persist($reponse);
        $em->flush();
    }
}
