<?php

namespace App\Http\Controllers;

use App\Actions\UploadMediaAction;
use Illuminate\Http\Request;

class UploadFileCkeditorController extends Controller
{
    public $uploadMediaAction;

    public function __construct()
    {
        $this->uploadMediaAction = new UploadMediaAction();
    }

    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        if ($request->hasFile('upload')) {
            $request->validate([
                'upload' => 'image|mimes:jpeg,png,jpg,gif|max:1048',
            ]);

            $file = $request->file('upload');
            $path = $this->uploadMediaAction->store('editor', $file);
            $url = $this->uploadMediaAction->url($path);

            return response()->json(['fileName' => $path, 'uploaded' => 1, 'url' => $url]);
        }
    }
}
