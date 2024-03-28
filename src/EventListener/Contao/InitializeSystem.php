<?php

declare(strict_types=1);

namespace Guave\VisualRadioBundle\EventListener\Contao;

use Contao\CoreBundle\Routing\ScopeMatcher;
use Contao\System;
use Symfony\Component\HttpFoundation\RequestStack;

class InitializeSystem
{
    private RequestStack $requestStack;
    private ScopeMatcher $scopeMatcher;

    public function __construct(RequestStack $requestStack, ScopeMatcher $scopeMatcher)
    {
        $this->requestStack = $requestStack;
        $this->scopeMatcher = $scopeMatcher;
    }

    public function addSystemNecessaryThings(): void
    {
        $request = $this->requestStack->getCurrentRequest();

        if ($request === null) {
            return;
        }

        if (!$this->scopeMatcher->isBackendRequest($request)) {
            return;
        }

        $GLOBALS['TL_CSS']['visualradio'] = System::getContainer()->get('kernel')->isDebug()
            ? 'bundles/guavevisualradio/css/visualradio.css'
            : 'bundles/guavevisualradio/css/visualradio.min.css';
    }
}
