<?php

namespace App\Admin;

use Sonata\AdminBundle\Admin\AbstractAdmin;
use Sonata\AdminBundle\Datagrid\ListMapper;
use Sonata\AdminBundle\Datagrid\DatagridMapper;
use Sonata\AdminBundle\Form\FormMapper;
use Sonata\AdminBundle\Form\Type\ChoiceFieldMaskType;
use App\Service\Helper;

class TranslateMenuAdmin extends AbstractAdmin
{

    protected function configureFormFields(FormMapper $formMapper)
    {
        $formMapper
            ->add('name', null, ['label' => 'Name'])
            ->add('menu', null, ['label' => 'Add to menu',
                'required'=>true,
                'query_builder' => function($er) {
                    $qb = $er->createQueryBuilder('m');
                        $qb
                            ->where('m.id != 1')
                            ->orderBy('m.left', 'ASC');
                    return $qb;
                }
            ])
            ->add('locale', ChoiceFieldMaskType::class, [
                'label' => 'Locale',
                'choices' => Helper::getLocaleList(),
                'required' => true
            ])
            ->add('translate', null, ['label' => 'Translate'])
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
            ->add('translate', null, ['label' => 'Translate'])
        ;
    }

}
