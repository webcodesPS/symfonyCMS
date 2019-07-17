<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;
use App\Service\Helper;
use Sonata\AdminBundle\Route\RouteCollection;
use Symfony\Component\Form\Extension\Core\Type\TextType;

class TranslateHomeAdmin extends AbstractAdmin
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
            ->add('name', TextType::class, [
                    'attr' => ['class' => 'form-control'],
                    'label' => 'Name',
                    'required' => true
                ]
            )
            ->add('home', null, ['label' => 'Add to home',
            'class' => 'App\Entity\Home',
            'query_builder' =>
                function($qb) {
                    return $qb->createQueryBuilder('h')->where('h.id = 1');
                }
            ])
            ->add('locale', ChoiceFieldMaskType::class, [
                'label' => 'Locale',
                'choices' => Helper::getLocaleList(),
                'required' => true
            ])
            ->add('translate', TextareaType::class, ['attr' => ['class' => 'ckeditor']])
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name', null, ['label' => 'Name'])
            ->add('home', null, ['label' => 'Home'])
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name', null, ['label' => 'Name'])
            ->add('locale', null, ['label' => 'Locale'])
            ->add('translate', 'html', ['label' => 'Translate'])
            ->add('_action', null, [
                'actions' => [
                    'edit' => [],
                    'delete' => [],
                    'move' => [
                        'template' => '@PixSortableBehavior/Default/_sort.html.twig',
                    ]
                ],
            ])
        ;
    }

}
