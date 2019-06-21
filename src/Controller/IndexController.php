<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends AbstractController
{

    /**
     * @param Request $request
     * @return Response
     */
    public function index()
    {
        return $this->render('index/index.html.twig', [
            'var' => 'Home page',
        ]);
    }

    /**
     * @param Request $request
     * @param $page
     * @return Response
     */
    public function page(Request $request, $page): object
    {
        return $this->render('index/page.html.twig', [
            'var' => 'Page',
        ]);
    }
}
