<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ModelType;
use Sonata\AdminBundle\Route\RouteCollection;
use Sonata\DoctrineORMAdminBundle\Datagrid\ProxyQuery;
use Symfony\Component\Form\Extension\Core\Type\CheckboxType;


class MenuAdmin extends AbstractAdmin
{
    protected $datagridValues = [
        '_page' => 1,
        '_sort_order' => 'ASC',
        '_sort_by' => 'left',
    ];

    protected function configureRoutes(RouteCollection $collection)
    {
        $collection
            ->add('up', $this->getRouterIdParameter().'/up')
            ->add('down', $this->getRouterIdParameter().'/down');
    }

    public function createQuery($context = 'list')
    {
        $em = $this->modelManager->getEntityManager('App\Entity\Menu');

        $queryBuilder = $em
            ->createQueryBuilder('dl')
            ->select('dl')
            ->from('App\Entity\Menu', 'dl')
            ->where('dl.parent IS NOT NULL');

        $query = new ProxyQuery($queryBuilder);
        return $query;
    }

    protected function configureFormFields(FormMapper $formMapper)
    {
        $subject = $this->getSubject();
        $id = $subject->getId();

        $formMapper
            ->tab('Menu')
                ->with('General', ['class' => 'col-md-4'])
                    ->add('parent', null, ['label' => 'Parent',
                        'required'=>true,
                        'query_builder' => function($er) use ($id) {
                            $qb = $er->createQueryBuilder('dl');
                            if ($id) {
                                $qb
                                    ->where('dl.id <> :id')
                                    ->setParameter('id', $id)
                                    ->orderBy('dl.left', 'ASC');
                            }
                            return $qb;
                        }
                    ])
                    ->add('name', null, [
                            'label' => 'Name',
                            'required' => true
                        ]
                    )
                    ->add('enabled', CheckboxType::class, [
                        'attr' => ['checked' => 'checked'],
                        'label' => 'Is menu enabled'
                    ])
                ->end()
                ->with('Content', ['class' => 'col-md-4'])
                    ->add('translates', ModelType::class, [
                        'multiple' => true,
                    ])
                ->end()
                ->with('Owner page', ['class' => 'col-md-4'])
                    ->add('page', null, ['label' => 'Add page'])
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
            ->add('up', 'text', [
                    'template' => 'system/sonata/field_tree_up.html.twig', 'label'=>' ',
                    'header_class' => 'list-col'
                ]
            )
            ->add('down', 'text', [
                    'template' => 'system/sonata/field_tree_down.html.twig', 'label'=>' ',
                    'header_class' => 'list-col'
                ]
            )
            ->addIdentifier('laveled_title', null,
                ['sortable'=>false, 'label'=>'Laveled title'])
            ->add('enabled', null, ['editable' => true])
            ->add('translates', null, ['label' => 'Translate title menu'])
            ->add('_action', 'actions', [
                'actions' => [
                    'edit' => [],
                    'delete' => [],
                ], 'label'=> 'Action',
            ])
        ;
    }
}
