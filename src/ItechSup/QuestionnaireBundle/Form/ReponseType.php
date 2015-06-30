<?php

namespace ItechSup\QuestionnaireBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\OptionsResolver\OptionsResolverInterface;

class ReponseType extends AbstractType
{

    /**
     * @param FormBuilderInterface $builder
     * @param array $options
     */
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder
            ->add('libelle')
            ->add('question', null, array('property' => 'libelle'))
        ;
    }

    /**
     * @param OptionsResolverInterface $resolver
     */
    public function setDefaultOptions(OptionsResolverInterface $resolver)
    {
        $resolver->setDefaults(array(
          'data_class' => 'ItechSup\QuestionnaireBundle\Entity\Reponse'
        ));
    }

    /**
     * @return string
     */
    public function getName()
    {
        return 'itechsup_questionnairebundle_reponse';
    }

}
