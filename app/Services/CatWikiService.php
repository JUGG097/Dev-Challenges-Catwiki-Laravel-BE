<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use ErrorException;
use Throwable;

class CatWikiService
{

    public function __construct()
    {
        $this->authHeaders = [
            "x-api-key" => "live_MhXwjew5ges6i6eWXn9CDk56UX08g37L8A3nkPnrlLcDPouOitL2bChxOHDoBvOF"
        ];
    }

    public function getBreeds($fetchKey, $catId = null)
    {
        try {
            if ($fetchKey == "topTen") {
                return Http::withHeaders($this->authHeaders)->get("https://api.thecatapi.com/v1/breeds?limit=10&page=0");
            } elseif ($fetchKey == "details") {
                return Http::withHeaders($this->authHeaders)->get("https://api.thecatapi.com/v1/breeds/" . $catId);
            } else {
                return Http::withHeaders($this->authHeaders)->get("https://api.thecatapi.com/v1/breeds/");
            }
        } catch (Throwable $e) {
            throw new ErrorException($e);
        }
        
    }

    public function getCatImages($catId, $queryLimit)
    {
        try {
            return Http::withHeaders($this->authHeaders)->get("https://api.thecatapi.com/v1/images/search?page=0&limit="
            . $queryLimit
            . "&breed_ids="
            . $catId
            . "&include_breeds=false");
        } catch (Throwable $e) {
            throw new ErrorException($e);
        }
        
    }
}
