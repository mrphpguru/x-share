<?php

namespace Xshare\ProductBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilder;
use Symfony\Component\Translation\Translator;

/**
 * Description of CategoriesList
 *
 * @author idercaci
 */
class CategoriesList extends AbstractType {

    /**
     * @param FormBuilder $builder
     * @param array $options
     * @return void
     */
    public function buildForm(FormBuilder $builder, array $options)
    {
        $builder->add('category', 'choice', array('choices' => $options['data']));
    }

    /**
     * returns a unique name of the form
     * @return string
     */
    public function getName()
    {
        return 'xshare_productbundle_categorieslist';
    }
}