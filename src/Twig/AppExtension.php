<?php

namespace App\Twig;

use Twig\Extension\AbstractExtension;
use Twig\TwigFunction;
use Symfony\Component\HttpFoundation\RequestStack;
use Doctrine\Bundle\DoctrineBundle\Registry as Doctrine;

class AppExtension extends AbstractExtension
{
    /**
     * @var Doctrine
     */
    private $doctrine;

    /**
     * @var RequestStack
     */
    private $requestStack;

    function __construct(Doctrine $doctrine, RequestStack $requestStack)
    {
        $this->doctrine = $doctrine;
        $this->requestStack = $requestStack;
    }

    public function getFunctions()
    {
        return [
            new TwigFunction('print_main_menu', [$this, 'displayMenu']),
        ];
    }

    public function displayMenu()
    {
        $currentRequest = $this->requestStack->getCurrentRequest();

        return [
            $currentRequest->getDefaultLocale(),
            $currentRequest->get('page'),
            $currentRequest->get('_locale'),
        ];
    }
}