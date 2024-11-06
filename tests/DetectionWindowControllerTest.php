<?php

namespace Biigle\Tests\Modules\DetectionWindow\Http\Controllers\Views;

use ApiTestCase;
use Biigle\Tests\VideoTest;
class DetectionWindowControllerTest extends ApiTestCase
{
    public function testGet()
    {
        $video = VideoTest::create();
        $this->doTestApiRoute('GET', "/api/v1/videos/{$video->id}/detection-window");
    }
}