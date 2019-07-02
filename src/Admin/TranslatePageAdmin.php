<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Route\RouteCollection;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;
use App\Service\Helper;

class TranslatePageAdmin extends AbstractAdmin
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
                    'label' => 'Translate name',
                    'required' => true
                ]
            )
            ->add('page', null, [
                    'label' => 'Add to page'
                ]
            )
            ->add('locale', ChoiceFieldMaskType::class, [
                'label' => 'Locale',
                'choices' => Helper::getLocaleList(),
                'required' => true
            ])
            ->add('translate', TextareaType::class, array('attr' => array('class' => 'ckeditor')))
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
            ->add('locale', null, array('label' => 'Locale'))
            ->add('translate', 'html', array('label' => 'Translate'))
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

    public function prePersist($object) {
//        $uniqid = $this->getRequest()->query->get('uniqid');
//        echo '<pre>';
//        print_r($this->getRequest()->request->get($uniqid));
//        echo '</pre>';
//        die();
    }

    public function preUpdate($object) {
//        echo '<pre>';
//        print_r($this->getRequest()->attributes->all());
//        echo '</pre>';
//        die();
    }

}
