<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Support\Facades\Storage;


class ImageController extends Controller {

    public function destroy (Request $request, $id) {
        $photo = Image::findOrFail($id); 

        Storage::delete($photo->relativePath);
        $photo->delete(); 

        return response(200);
    }

}