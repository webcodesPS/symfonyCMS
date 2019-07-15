<?php

namespace App\Controller\Admin;

use Sonata\AdminBundle\Controller\CRUDController;

class DataListAdminController extends CRUDController
{
    public function upAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $repo = $em->getRepository('App\Entity\DataList');
        $page = $repo->findOneById($id);
        if ($page->getParent()){
            $repo->moveUp($page);
        }
        return $this->redirect($this->getRequest()->headers->get('referer'));
    }

    public function downAction($id)
    {
        $em = $this->getDoctrine()->getEntityManager();
        $repo = $em->getRepository('App\Entity\DataList');
        $page = $repo->findOneById($id);
        if ($page->getParent()){
            $repo->moveDown($page);
        }
        return $this->redirect($this->getRequest()->headers->get('referer'));
    }
}
