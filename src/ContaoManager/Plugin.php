<?php

declare(strict_types=1);

namespace Guave\VisualRadioBundle\ContaoManager;

use Contao\CoreBundle\ContaoCoreBundle;
use Contao\ManagerPlugin\Bundle\BundlePluginInterface;
use Contao\ManagerPlugin\Bundle\Config\BundleConfig;
use Contao\ManagerPlugin\Bundle\Parser\ParserInterface;
use Guave\VisualRadioBundle\GuaveVisualRadioBundle;

class Plugin implements BundlePluginInterface
{
    public function getBundles(ParserInterface $parser): array
    {
        return [
            BundleConfig::create(GuaveVisualRadioBundle::class)
                ->setLoadAfter([ContaoCoreBundle::class])
                ->setReplace(['visualradio']),
        ];
    }
}
