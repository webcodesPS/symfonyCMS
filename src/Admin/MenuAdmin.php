<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
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
            ->add('name', null, [
                    'label' => 'Name',
                    'required' => true
                ]
            )
            ->add('page', null, array('label' => 'Add page'))
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
