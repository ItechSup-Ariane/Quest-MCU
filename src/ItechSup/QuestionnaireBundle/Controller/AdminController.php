<?php

namespace ItechSup\QuestionnaireBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Sensio\Bundle\FrameworkExtraBundle\Configuration\Method;
use ItechSup\QuestionnaireBundle\Entity\Reponse;

/**
 * Admin controller.
 *
 * @Route("/admin")
 */
class AdminController extends Controller
{

    /**
     * Call the Default index view with
     * the list of survey 
     * The view show the configuration menu 
     * 
     * @Route("/" , name ="index_admin")
     */
    public function indexAction()
    {
        $em = $this->getDoctrine()->getManager();
        $questionnaires = $em->getRepository('ItechSupQuestionnaireBundle:Questionnaire')->findAll();
        if (!$questionnaires) {
            throw $this->createNotFoundException('Aucun questionnaire n\'a été trouvé');
        }

        return $this->render('ItechSupQuestionnaireBundle:Admin:index.html.twig', array(
              'questionnaires' => $questionnaires,
        ));
    }

    /**
     * Call the Admin resume view which
     * show the average note of questions for 
     * each survey
     * 
     * @Route("/resume/{id}", name="resumeQuestionnaire")
     * 
     */
    public function resumeAction($id)
    {
        $em = $this->getDoctrine()->getManager();
        $questionnaire = $em->getRepository('ItechSupQuestionnaireBundle:Questionnaire')->find($id);
        if (!$questionnaire) {
            throw $this->createNotFoundException('Impossible de trouver ce questionnaire');
        }

        return $this->render('ItechSupQuestionnaireBundle:Admin:resume.html.twig', array(
              'questionnaire' => $questionnaire,
        ));
    }

}
