<?php

namespace Xshare\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class UserDetailsType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('username', null, array(
                'required' => false,
                'read_only' => true
            ))
            ->add('firstname', null, array( 
                'required' => false,
                'read_only' => true
            ))
            ->add('lastname', null, array(
                'required' => false,
                'read_only' => true
            ))
            ->add('phone', null, array(
                'required' => false,
                'read_only' => true
            ))
            ->add('email', 'text', array(
                'required' => false,
                'read_only' => true
            ))
            ->add('user_id', 'hidden')
            ->add('_token', 'hidden') 
        ;
    }

    public function getName()
    {
        return 'xshare_userbundle_userdetailstype';
    }
}
