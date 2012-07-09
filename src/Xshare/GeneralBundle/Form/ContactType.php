<?php
namespace Xshare\GeneralBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

use Xshare\GeneralBundle\Entity;

class ContactType extends AbstractType
{
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('firstname');
        $builder->add('lastname');
        $builder->add('email', 'email');
        $builder->add('phone','text',array('required'=>false));
        $builder->add('subject');
        $settings=array(
            'width'=>206,
            'height'=>57,
            'font_size'=>22,
            'length'=>7,
            'border_color'=>"cccccc"
            );
        
        $builder->add('securitycod', 'genemu_captcha',$settings);
        $builder->add('body', 'textarea');
    }

    public function getName()
    {
        return 'contact';
    }
}