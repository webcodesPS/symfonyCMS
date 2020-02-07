<?php

namespace App\Controller\Admin;

use Doctrine\ORM\EntityManagerInterface;
use Sonata\AdminBundle\Controller\CRUDController;

class MenuAdminController extends CRUDController
{
    /**
     * @var EntityManagerInterface
     */
    private $_em;

    public function __construct(EntityManagerInterface $entityManager)
    {
      $this->_em = $entityManager;
    }

    public function upAction($id)
    {
        $repo = $this->_em->getRepository('App\Entity\Menu');
        $page = $repo->findOneById($id);
        if ($page->getParent()){
            $repo->moveUp($page);
        }

        return $this->redirect($this->getRequest()->headers->get('referer'));
    }

    public function downAction($id)
    {
        $repo = $this->_em->getRepository('App\Entity\Menu');
        $page = $repo->findOneById($id);
        if ($page->getParent()){
            $repo->moveDown($page);
        }

        return $this->redirect($this->getRequest()->headers->get('referer'));
    }
}
