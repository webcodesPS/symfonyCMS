<?php

namespace App\EventListener;

use Symfony\Component\HttpKernel\Event\ExceptionEvent;
use Symfony\Component\HttpKernel\KernelEvents;

class ExceptionListener
{
    private $defaultLocale;

    public function __construct($defaultLocale = 'en')
    {
        $this->defaultLocale = $defaultLocale;
    }

    public function onKernelException(ExceptionEvent $event)
    {

        $request = $event->getRequest();
        if (!$request->hasPreviousSession()) {
            return;
        }

        if ($locale = $request->get('_locale')) {
            $request->setLocale($locale);
        } else {
            $request->setLocale($request->getSession()->get('_locale', $this->defaultLocale));
        }
    }

    public static function getSubscribedEvents()
    {
        return [
            KernelEvents::REQUEST => [['onKernelRequest', 15]],
        ];
    }
}