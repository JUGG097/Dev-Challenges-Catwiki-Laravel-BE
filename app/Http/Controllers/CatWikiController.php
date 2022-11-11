<?php

namespace App\Http\Controllers;

use App\Services\CatWikiService;
use Illuminate\Support\Facades\Response;
use Symfony\Component\Translation\Extractor\AbstractFileExtractor;

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

    public function showTopTen()
    {
        $payload = $this->catwikiService->getBreeds("topTen");
        if ($payload->status() != 200) {
            return Response::json([
                "success" => false,
                "message" => "3rd party api error"
            ], 503);
        }

        $extracted_data = array_map(function ($a) {
            return $this->extractCatDetails($a);
        }, $payload->json());
        return Response::json([
            "success" => true,
            "data" => $extracted_data
        ], 200);
    }

    public function showCatDetails($pathVariable)
    {
    }

    public function showCatPhotos($pathVariable)
    {
    }

    public function showBreedList()
    {
    }

    private function extractCatDetails($obj)
    {
        return [
            "id" => $obj["id"],
            "name" => $obj["name"],
            "temperament" => $obj["temperament"],
            "origin" => $obj["origin"],
            "description" => $obj["description"],
            "life_span" => $obj["life_span"],
            "adaptability" => $obj["adaptability"],
            "affection_level" => $obj["affection_level"],
            "child_friendly" => $obj["child_friendly"],
            "grooming" => $obj["grooming"],
            "health_issues" => $obj["health_issues"],
            "intelligence" => $obj["intelligence"],
            "social_needs" => $obj["social_needs"],
            "stranger_friendly" => $obj["stranger_friendly"],
            "wikipedia_url" => $obj["wikipedia_url"],
            "image" => $obj["image"],
        ];
    }
}
