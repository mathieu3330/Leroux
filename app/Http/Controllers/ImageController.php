<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ImageController extends Controller
{
    public function upload(Request $request)
    {
        $image = $request->file('image');
        $fileName = time() . '_' . $image->getClientOriginalName();

        Image::make($image)->rotate(-90)
                ->save(public_path('uploads') .'/'. $fileName, 60);

        // Build the image URL
        $imageUrl = 'uploads/' . $fileName;

        // Return the image URL
        return response()->json(['image_url' => $imageUrl]);
    }
}
