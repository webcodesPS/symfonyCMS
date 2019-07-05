<?php

namespace App\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\DependencyInjection\ParameterBag\ParameterBagInterface;
use Symfony\Component\HttpFoundation\Request;

class IndexController extends AbstractController
{

    private $params;
    private $theme_dir;

    public function __construct(ParameterBagInterface $params)
    {
        $this->params = $params;
        $this->theme_dir = $this->params->get('theme_dir');
    }

    /**
     * @param Request $request
     * @return Response
     */
    public function index()
    {

        return $this->render($this->theme_dir . '/index/index.html.twig', [
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
        return $this->render($this->theme_dir . '/index/page.html.twig', [
            'var' => 'Page',
        ]);
    }
}
