<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;
use App\Service\Helper;

class ContentElementAdmin extends AbstractAdmin
{
  public function createQuery($context = 'list')
  {
    $proxyQuery = parent::createQuery('list');
    $proxyQuery->addOrderBy($proxyQuery->getRootAlias().'.locale', 'ASC');

    return $proxyQuery;
  }

  protected function configureFormFields(FormMapper $formMapper)
  {
    $formMapper
      ->add('element', null, ['label' => 'Add to element',
        'required'=>true,
        'query_builder' => function($er) {
          return $er->createQueryBuilder('e')->orderBy('e.id', 'ASC');
        }
      ])
      ->add('locale', ChoiceFieldMaskType::class, [
        'label' => 'Locale',
        'choices' => Helper::getLocaleList(),
        'required' => true
      ])
      ->add('content', null, ['label' => 'Content'])
      ->add('title', null, ['label' => 'Title'])
    ;
  }

  protected function configureDatagridFilters(DatagridMapper $datagridMapper)
  {
    $datagridMapper
      ->add('element', null, ['label' => 'Element'])
    ;
  }

  protected function configureListFields(ListMapper $listMapper)
  {
    $listMapper
      ->addIdentifier('element', null, ['label' => 'Element'])
      ->add('locale', null, ['label' => 'Locale'])
      ->add('content', null, ['label' => 'Content'])
      ->add('_action', null, [
        'actions' => [
          'edit' => [],
          'delete' => [],
        ],
      ])
    ;
  }
}
