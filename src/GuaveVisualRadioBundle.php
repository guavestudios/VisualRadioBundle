<?php

declare(strict_types=1);

namespace Guave\VisualRadioBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class GuaveVisualRadioBundle extends Bundle
{
    public function getPath(): string
    {
        return \dirname(__DIR__);
    }
}
