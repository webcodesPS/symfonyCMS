<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use App\Service\Helper;

class ContentMediaAdmin extends AbstractAdmin
{
    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('media', null,['label' => 'Add to media'])
            ->add('locale', ChoiceFieldMaskType::class, [
                'label' => 'Locale',
                'choices' => Helper::getLocaleList(),
                'required' => true
            ])
            ->add('name', null, [
                    'label' => 'Content name',
                    'required' => true
                ]
            )
            ->add('description', TextareaType::class,
                [
                    'attr' => ['class' => 'ckeditor'],
                    'label' => 'Content description'
                ]
            )
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('media', null, ['label' => 'Media'])
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->add('name', null, ['label' => 'Content name'])
            ->add('description', 'html', ['label' => 'Content description'])
            ->add('locale', null, ['label' => 'Locale'])
            ->add('media', null, ['label' => 'Media'])
            ->add('_action', null, [
                'actions' => [
                    'edit' => [],
                    'delete' => []
                ],
            ])
        ;
    }
}
