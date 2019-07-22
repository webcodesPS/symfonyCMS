<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\AdminBundle\Form\Type\ModelType;


class HomeAdmin extends AbstractAdmin
{

    protected function configureRoutes(RouteCollection $collection): void
    {
        $collection->remove('create');
        $collection->remove('delete');
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->tab('Home page')
                ->with('Edit name', ['class' => 'col-md-2'])
                    ->add('name', null, [
                        'label' => 'Name',
                        'required' => true
                        ]
                    )
                ->end()
                ->with('Add/Delete Contents', ['class' => 'col-md-5'])
                    ->add('translates', ModelType::class, [
                        'multiple' => true,
                    ])
                ->end()
                ->with('Add/Delete Galleries', ['class' => 'col-md-5'])
                    ->add('galleries', ModelType::class, [
                        'multiple' => true,
                    ])
                ->end()
            ->end()
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
            ->add('translates', null, ['label' => 'Translate content'])
            ->add('galleries', null, ['label' => 'Galleries'])
            ->add('_action', null, [
                'actions' => [
                    'edit' => [],
                ],
            ])
        ;
    }

}
