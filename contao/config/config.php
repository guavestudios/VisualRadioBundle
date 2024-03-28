<?php

use Guave\VisualRadioBundle\EventListener\Contao\InitializeSystem;
use Guave\VisualRadioBundle\Widget\Backend\VisualRadio;

$GLOBALS['TL_HOOKS']['initializeSystem'][]   = [InitializeSystem::class, 'addSystemNecessaryThings'];
$GLOBALS['BE_FFL']['visualradio'] = VisualRadio::class;
