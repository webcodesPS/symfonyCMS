<?php

namespace App\Controller;

use App\Entity\Page;
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
     * @return \Symfony\Component\HttpFoundation\Response
     */
    public function index(Request $request)
    {
        $home = $this->getDoctrine()
            ->getRepository(Page::class)
            ->findPage($request->getLocale());

        if(empty($home)) {
            throw $this->createNotFoundException();
        }

        return $this->render($this->theme_dir . '/index/index.html.twig', [
            'home' => $home,
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
        $page = $this->getDoctrine()
            ->getRepository(Page::class)
            ->findPage($request->getLocale());

        if(empty($page)) {
            throw $this->createNotFoundException();
        }

        return $this->render($this->theme_dir . '/index/page.html.twig', [
            'page' => $page,
            'var' => 'Subpage',
        ]);
    }
}
