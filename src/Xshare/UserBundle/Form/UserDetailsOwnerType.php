<?php

namespace Xshare\UserBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

class UserDetailsOwnerType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('username', null, array(
                'required' => false,
            ))
            ->add('firstname', null, array( 
                'required' => false,
            ))
            ->add('lastname', null, array(
                'required' => false,
            ))
            ->add('phone', null, array(
                'required' => false,
            ))    
            ->add('email', 'text', array(
                'required' => false,
            ))
            ->add('file', 'file', array(
                'required' => false,
            ))
            ->add('_token', 'hidden') 
        ;
    }

    public function getName()
    {
        return 'xshare_userbundle_userdetailsownertype';
    }


    public function getDefaultOptions(array $options)
    {
        return array(
            'data_class' => 'Xshare\UserBundle\Entity\User',
        );
    }

}