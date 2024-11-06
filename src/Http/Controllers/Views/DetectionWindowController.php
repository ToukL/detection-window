<?php

namespace Biigle\Modules\DetectionWindow\Http\Controllers\Views;

use Biigle\Http\Controllers\Views\Controller;
use Biigle\Video;

class DetectionWindowController extends Controller
{
    /**
     * Show the detection window sidebar view of a video.
     *
     * @param int $id video ID
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $video = Video::findOrFail($id);
        $this->authorize('access', $video);

        return view('detection-window::videosSidebar', [
            'volume' => $video->volume,
            'video' => $video
        ]);
    }
}
