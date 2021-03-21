<?php

namespace App\Http\Controllers;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ImageController extends Controller
{
    public function destroy(Image $image)
    {
        if (isset($image)) {
            Storage::disk('images')->delete($image->path);
            $image->delete();
        }
        return redirect()->back()->withSuccess('Image deleted');
    }
}
