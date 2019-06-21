<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use App\Entity\TranslatePage;

class TranslateMediaAdmin extends AbstractAdmin
{

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('media', null, array('label' => 'Add to media'))
            ->add('locale', ChoiceFieldMaskType::class, [
                'label' => 'Locale',
                'choices' => TranslatePage::getLocaleList(),
                'required' => false
            ])
            ->add('name', null, array('label' => 'Translate name'))
            ->add('description', TextareaType::class,
                array(
                    'attr' => array('class' => 'ckeditor'),
                    'label' => 'Translate description'
                )
            )
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('media', null, array('label' => 'Media'))
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('media', null, array('label' => 'Media'))
            ->add('name', null, array('label' => 'Translate name'))
            ->add('description', 'html', array('label' => 'Translate description'))
            ->add('locale', null, array('label' => 'Locale'))
        ;
    }

}
