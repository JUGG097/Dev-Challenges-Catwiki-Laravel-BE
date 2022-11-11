<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\CatWikiService;
use Illuminate\Support\Facades\Response;

class CatWikiController extends Controller
{


    public function __construct(CatwikiService $catwikiService)
    {
        $this->catwikiService = $catwikiService;
    }

    public function healthCheck()
    {
        return Response::json([
            "success" => true
        ], 200);
    }

    public function showTopTen(Request $req)
    {
    }

    public function showCatDetails(Request $req, $pathVariable)
    {
    }

    public function showCatPhotos(Request $req, $pathVariable)
    {
    }

    public function showBreedList(Request $req)
    {
    }
}
