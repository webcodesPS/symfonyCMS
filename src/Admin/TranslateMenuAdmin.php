<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;
use App\Entity\TranslatePage;

class TranslateMenuAdmin extends AbstractAdmin
{

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('menu', null, array('label' => 'Add to menu'))
            ->add('locale', ChoiceFieldMaskType::class, [
                'label' => 'Locale',
                'choices' => TranslatePage::getLocaleList(),
                'required' => false
            ])
            ->add('translate', null, array('label' => 'Translate'))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('menu', null, array('label' => 'Menu'))
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('menu', null, array('label' => 'Menu'))
            ->add('translate', null, array('label' => 'Translate'))
            ->add('locale', null, array('label' => 'Locale'))
        ;
    }

}
