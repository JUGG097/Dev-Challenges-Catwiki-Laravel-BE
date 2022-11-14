<?php

namespace App\Http\Controllers;

use App\Helpers\CatWikiHelpers;
use App\Services\CatWikiService;
use Illuminate\Support\Facades\Response;

class CatWikiController extends Controller
{


    public function __construct(CatwikiService $catwikiService, CatWikiHelpers $catwikiHelpers)
    {
        $this->catwikiService = $catwikiService;
        $this->helpers = $catwikiHelpers;
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
            return $this->helpers->extractCatDetails($a);
        }, $payload->json());
        return Response::json([
            "success" => true,
            "data" => $extracted_data
        ], 200);
    }

    public function showCatDetails($catId)
    {
        $detailsPayload = $this->catwikiService->getBreeds("details", $catId);
        if ($detailsPayload->status() != 200) {
            return Response::json([
                "success" => false,
                "message" => "3rd party api error"
            ], 503);
        }
        $detailsPayloadJson = $detailsPayload->json();

        $imagesPayload = $this->catwikiService->getCatImages($catId, "1");
        if ($imagesPayload->status() != 200) {
            return Response::json([
                "success" => false,
                "message" => "3rd party api error"
            ], 503);
        }
        $detailsPayloadJson["image"] = $imagesPayload->json()[0];

        return Response::json([
            "success" => true,
            "data" => $this->helpers->extractCatDetails($detailsPayloadJson)
        ], 200);
    }

    public function showCatPhotos($catId)
    {
        $imagesPayload = $this->catwikiService->getCatImages($catId, "8");
        if ($imagesPayload->status() != 200) {
            return Response::json([
                "success" => false,
                "message" => "3rd party api error"
            ], 503);
        }

        return Response::json([
            "success" => true,
            "data" => $imagesPayload->json()
        ], 200);
    }

    public function showBreedList()
    {
        $payload = $this->catwikiService->getBreeds("breedList");
        if ($payload->status() != 200) {
            return Response::json([
                "success" => false,
                "message" => "3rd party api error"
            ], 503);
        }

        $extracted_data = array_map(function ($a) {
            return $this->helpers->extractBreedDetails($a);
        }, $payload->json());
        return Response::json([
            "success" => true,
            "data" => $extracted_data
        ], 200);
    }
}
