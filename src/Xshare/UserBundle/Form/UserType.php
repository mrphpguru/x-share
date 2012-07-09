<?php

namespace Xshare\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class UserType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->setData($options['data']['user']);
        $builder
            ->add('username', null, array(
                'required' => false))
            ->add('firstname', null, array( 
                'required' => false))
            ->add('lastname', null, array(
                'required' => false))
            ->add('email', 'text', array('required' => false))
            ->add('password','repeated', array(
                'type' => 'password',
                'invalid_message' => 'user.password.not_confirmed',
                'first_name' => 'first',
                'second_name' => 'second',
                'error_bubbling' => true,
                'required' => false
            ))    
            ->add('phone', null, array('required' => false))
            ->add('birth_date', 'text', array(
                'required' => false))
            ->add('sex', 'choice', array(
                'choices' => array(
                'w' => $options['data']['choiceW'],
                'm' => $options['data']['choiceM']
            )))  
            ->add('file', 'file', array(
                'required' => false))
            ->add('user_id', 'hidden')
            ->add('type_access', 'hidden')
            ->add('active', 'hidden')
            ->add('_token', 'hidden')    
        ;
    }

    public function getName()
    {
        return 'xshare_userbundle_usertype';
    }
    
}
