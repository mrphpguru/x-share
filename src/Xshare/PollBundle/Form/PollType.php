<?php
namespace Xshare\PollBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

use Xshare\PollBundle\Entity;

/**
 * Product form builder
 */

class PollType extends AbstractType
{
    /**
     * builds the form
     * @param FormBuilder $builder
     * @param array $options 
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('question');
        $builder->add('answers','textarea');
        $builder->add('expired_at','date', array(
                'required' => false,
                //'widget' => 'daate',
                'format' => 'dd-MM-yyyy',
                'empty_value' => array('year' => '----', 'month' => '--', 'day' => '--'))
            );
        
        $builder->add('status','checkbox',array('required'=>false));
    }

    /**
     * returns a unique name of the form
     * @return string 
     */
    public function getName()
    {
        return 'poll';
    }
}