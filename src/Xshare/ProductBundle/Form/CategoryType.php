<?php

namespace Xshare\ProductBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;

/**
 * Description of CategoryType
 *
 * @author vmoroi
 */
class CategoryType extends AbstractType {
    /**
     * builds the form for a category
     * @param FormBuilder $builder
     * @param array $options 
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder
            ->add('file')
            ->add('name')
            ->add('description')
            ->add('status', 'checkbox', array('required' => false));
    }

    /**
     * returns a unique name of the form
     * @return string 
     */
    public function getName()
    {
        return 'xshare_productbundle_categorytype';
    }
}