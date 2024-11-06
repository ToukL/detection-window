<?php

namespace Biigle\Tests\Modules\DetectionWindow;

use TestCase;
use Biigle\Services\Modules;
use Biigle\Modules\DetectionWindow\DetectionWindowServiceProvider;

class DetectionWindowServiceProviderTest extends TestCase {

    public function testServiceProvider()
    {
        $this->assertTrue(class_exists(DetectionWindowServiceProvider::class));
    }
}