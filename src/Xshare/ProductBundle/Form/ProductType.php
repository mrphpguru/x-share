<?php

namespace Xshare\ProductBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

use Xshare\ProductBundle\Entity;

/**
 * Product form builder
 */

class ProductType extends AbstractType
{
    /**
     * builds the form
     * @param FormBuilder $builder
     * @param array $options 
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        
        $builder->add('name');
        $builder->add('description','textarea');
        if (!$options['data']->getStatus()) {
            $builder->add('status','checkbox',array('required'=>false));
        }        
        $builder->add('enable','checkbox',array('required'=>false));
        $builder->add('file','file',array('required'=>false));
        $builder->add('category',null,array('empty_value'=>'-------','empty_data'  => null));
    }

    /**
     * returns a unique name of the form
     * @return string 
     */
    public function getName()
    {
        return 'product';
    }
}