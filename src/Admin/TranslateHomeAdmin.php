<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;
use App\Entity\TranslateHome;
use Sonata\AdminBundle\Route\RouteCollection;

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
//        $pageArray = $this->getConfigurationPool()->getContainer()->get('doctrine')->getManager()->getRepository(TranslateHome::class)->findByExampleField(1);
//        print_r($pageArray);

        $formMapper
            ->add('name', null, array('label' => 'Name'))
            ->add('home', null, array('label' => 'Add to home',
            'class' => 'App\Entity\Home',
            'required' => true,
            'query_builder' =>
                function($qb) {
                    return $qb->createQueryBuilder('h')->where('h.id = 1');
                }
            ))
            ->add('locale', ChoiceFieldMaskType::class, [
                'label' => 'Locale',
                'choices' => TranslateHome::getLocaleList(),
                'required' => false
            ])
            ->add('translate', TextareaType::class, array('attr' => array('class' => 'ckeditor')))
        ;
    }

    protected function configureDatagridFilters(DatagridMapper $datagridMapper)
    {
        $datagridMapper
            ->add('name', null, array('label' => 'Name'))
            ->add('home', null, array('label' => 'Home'))
        ;
    }

    protected function configureListFields(ListMapper $listMapper)
    {
        $listMapper
            ->addIdentifier('name', null, array('label' => 'Name'))
            ->add('translate', 'html', array('label' => 'Translate'))
            ->add('locale', null, array('label' => 'Locale'))
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

//    public function preUpdate($object) {
//        $uniqid = $this->getRequest()->query->get('uniqid');
//        $data = $this->getRequest()->request->get($uniqid);
//        $em = $this->modelManager->getEntityManager('App\Entity\Home');
//        $query = $em->createQueryBuilder('h')
//            ->select('h')
//            ->from('App\Entity\Home', 'h')
//            ->where('h.id = 1');
//        $home = $query->getQuery()->getOneOrNullResult();
//        $baseTranslateHome = new TranslateHome();
//        $baseTranslateHome->setHome($home);
//        $baseTranslateHome->setLocale($data['locale']);
//        $baseTranslateHome->setName($data['name']);
//        $baseTranslateHome->setTranslate($data['translate']);
//        $em->persist($baseTranslateHome);

}
