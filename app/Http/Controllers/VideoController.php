<?php

namespace App\Http\Controllers;

use App\Models\Video;
use Illuminate\Http\Request;

class VideoController extends Controller
{
    public function showByJenjang($jenjang)
    {
        if (!in_array($jenjang, ['sd', 'smp', 'sma'])) {
            abort(404);
        }

        $videos = Video::where('jenjang', $jenjang)->get();
        return view('video.index', compact('videos', 'jenjang'));

    }
}
