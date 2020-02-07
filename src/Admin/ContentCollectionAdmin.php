<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelListType;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;
use App\Service\Helper;

class ContentCollectionAdmin extends AbstractAdmin
{

  protected function configureFormFields(FormMapper $formMapper)
  {
    $formMapper
      ->add('name', null, [
          'label' => 'Content name',
          'required' => true
        ]
      )
    ;

    if (!$this->hasParentFieldDescription()) {
      $formMapper->add('collection', ModelListType::class, [
        'required' => true
      ]);
    }

    $formMapper
      ->add('locale', ChoiceFieldMaskType::class, [
        'label' => 'Locale',
        'choices' => Helper::getLocaleList(),
        'required' => true
      ])
      ->add('content', TextareaType::class, ['attr' => ['class' => 'ckeditor']])
    ;
  }

  protected function configureDatagridFilters(DatagridMapper $datagridMapper)
  {
    $datagridMapper
      ->add('name', null, ['label' => 'Name'])
    ;
  }

  protected function configureListFields(ListMapper $listMapper)
  {
    $listMapper
      ->addIdentifier('name', null, ['label' => 'Name'])
      ->add('locale', null, ['label' => 'Locale'])
      ->add('content', 'html', ['label' => 'Content'])
      ->add('collection', null, ['label' => 'Collection'])
      ->add('_action', null, [
        'actions' => [
          'edit' => [],
          'delete' => []
        ],
      ])
    ;
  }
}
