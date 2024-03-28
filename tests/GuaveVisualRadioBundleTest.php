<?php

declare(strict_types=1);

namespace Guave\VisualRadioBundle\Tests;

use Guave\VisualRadioBundle\GuaveVisualRadioBundle;
use PHPUnit\Framework\TestCase;

class GuaveVisualRadioBundleTest extends TestCase
{
    public function testCanBeInstantiated(): void
    {
        $bundle = new GuaveVisualRadioBundle();

        $this->assertInstanceOf('Guave\VisualRadioBundle\GuaveVisualRadioBundle', $bundle);
    }
}
