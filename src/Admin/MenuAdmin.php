<?php

namespace App\Admin;

use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use RedCode\TreeBundle\Admin\AbstractTreeAdmin;

class MenuAdmin extends AbstractTreeAdmin
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
            ->tab('Menu')
                ->with('General', array('class' => 'col-md-6'))
                    ->add('name', null, [
                            'label' => 'Name',
                            'required' => true
                        ]
                    )
                    ->add('parent', null, array('label' => 'Add parent'))
                    ->add('enabled', null, [
                        'attr' => ['checked' => 'checked'],
                        'label' => 'Is menu enabled'
                    ]
                    )
                ->end()
                ->with('Owner page', array('class' => 'col-md-6'))
                    ->add('page', null, array('label' => 'Add page'))
                ->end()
            ->end()
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name', null, array('label' => 'Name'))

        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name', null, array('label' => 'Name'))
            ->add('page', null, array('label' => 'Page'))
            ->add('enabled', null, ['editable' => true])
            ->add('_action', null, array(
                'actions' => array(
                    'edit' => array(),
                    'delete' => array(),
                    'move' => [
                        'template' => '@PixSortableBehavior/Default/_sort.html.twig',
                    ]
                ),
            ))
        ;
    }
}
