<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;
use App\Service\Helper;

class ContentMenuAdmin extends AbstractAdmin
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
            ->add('menu', null, ['label' => 'Add to menu',
                'required'=>true,
                'query_builder' => function($er) {
                    return $er->createQueryBuilder('m')->orderBy('m.left', 'ASC');
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
            ->add('menu', null, ['label' => 'Menu'])
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('menu', null, ['label' => 'Menu'])
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
