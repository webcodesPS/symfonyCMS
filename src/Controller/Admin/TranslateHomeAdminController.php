<?php

namespace App\Controller\Admin;

use Sonata\AdminBundle\Controller\CRUDController;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class TranslateHomeAdminController extends CRUDController
{

//    public function editAction($id = null)
//    {
//        die($id);
//
//        $object = $this->admin->getSubject();
//
//        if (!$object) {
//        throw new NotFoundHttpException(sprintf('unable to find the object with id: %s', $id));
//        }

//        $uniqid = $this->getRequest()->query->get('uniqid');
//        $data = $this->getRequest()->request->get($uniqid);
//
//        die($this->admin->generateUrl('edit', ["id" => 3]));

        // Be careful, you may need to overload the __clone method of your object
        // to set its id to null !
//        $clonedObject = clone $object;
//
//        $clonedObject->setName($object->getName().' (Clone)');
//
//        $this->admin->create($clonedObject);
//
//        $this->addFlash('sonata_flash_success', 'Cloned successfully');

//        return new RedirectResponse($this->admin->generateUrl('edit', ["id" => 2]));
//    }
}
