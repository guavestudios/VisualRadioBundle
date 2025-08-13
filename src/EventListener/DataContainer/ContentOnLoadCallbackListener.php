<?php

namespace Guave\VisualRadioBundle\EventListener\DataContainer;

use Contao\CoreBundle\DependencyInjection\Attribute\AsCallback;
use Contao\System;

#[AsCallback(table: 'tl_content', target: 'config.onload')]
class ContentOnLoadCallbackListener
{
    public function __invoke(): void
    {
        $GLOBALS['TL_CSS']['guavevisualradio'] = System::getContainer()->get('kernel')->isDebug()
            ? 'bundles/guavevisualradio/css/backend.css'
            : 'bundles/guavevisualradio/css/backend.min.css';
    }
}
