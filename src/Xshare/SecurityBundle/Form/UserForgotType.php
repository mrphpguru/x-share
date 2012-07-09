<?php

namespace Xshare\SecurityBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class UserForgotType extends AbstractType
{
    /**
     * generates the user forgot form
     * @param FormBuilder $builder
     * @param array $options 
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('username', null, array(
                'required' => false))
            ->add('password','repeated', array(
                'type' => 'password',
                'invalid_message' => 'user.password.not_confirmed',
                'first_name' => 'first',
                'second_name' => 'second',
                'error_bubbling' => true,
                'required' => false
            ))
            ->add('_token', 'hidden')    
        ;
    }

    /**
     * returns the unique name of the form
     * @return string 
     */
    public function getName()
    {
        return 'xshare_securitybundle_userforgottype';
    }
}
