<?php

/** Donovan Castrillon */

// DONOVAN

namespace App\Util;

use Illuminate\Http\Request;

class ImageUtil
{
    // @param $request: Objeto request
    // @param $varName: Nombre de la variable en donde se esta guardando la imagen en el objeto request

    public static function img2htmlbase64(Request $request, string $varName): string
    {
        $imageFile = $request->file($varName);
        $base64image = base64_encode(file_get_contents($imageFile));

        return 'data:image/png;base64, '.$base64image;
    }
}
