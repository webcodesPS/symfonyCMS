<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Route\RouteCollection;

class PageAdmin extends AbstractAdmin
{
    protected $datagridValues = [
        '_page' => 1,
        '_sort_order' => 'ASC',
        '_sort_by' => 'position',
    ];

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection->add('move', $this->getRouterIdParameter().'/move/{position}');
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', null, [
                    'label' => 'Name',
                    'required' => true
                ]
            )
            ->add('galleries', null, ['label' => 'Add galleries'])
            ->add('enabled', null, [
                    'attr' => ['checked' => 'checked'],
                    'label' => 'Is menu enabled'
                ]
            )
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
            ->add('enabled', null, ['editable' => true])
            ->add('slug', null, ['label' => 'Slug'])
            ->add('contents', ModelType::class, [
                'multiple' => true,
            ])
            ->add('galleries')
            ->add('_action', null, [
                'actions' => [
                    'edit' => [],
                    'delete' => ['template' => 'system/sonata/delete_page.html.twig'],
                    'move' => [
                        'template' => '@PixSortableBehavior/Default/_sort.html.twig',
                    ]
                ],
            ])
        ;
    }

}
