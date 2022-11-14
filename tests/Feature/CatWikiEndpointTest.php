<?php

namespace Tests\Feature;

use App\Helpers\CatWikiHelpers;
use Tests\TestCase;
use Illuminate\Support\Facades\Http;

class CatWikiEndpointTest extends TestCase
{

    public function setUp(): void
    {
        parent::setUp();

        $this->mockHelper = $this->app->make(CatWikiHelpers::class);
    }

    public function test_getTopTen()
    {
        Http::fake([
            "https://api.thecatapi.com/v1/breeds?limit=10&page=0" => Http::response(
                $this->mockHelper->mockCatBreedData()
            )
        ]);

        $response = $this->get('/api/v1/topTen');

        $expected_response = array_map(function ($a) {
            return $this->mockHelper->extractCatDetails($a);
        }, $this->mockHelper->mockCatBreedData());

        $response->assertStatus(200)->assertExactJson(
            ["success" => true, "data" => $expected_response]
        );
    }

    public function test_getTopTen_failure()
    {
        Http::fake([
            "https://api.thecatapi.com/v1/breeds?limit=10&page=0" => Http::response(
                [],
                400
            )
        ]);

        $response = $this->get('/api/v1/topTen');

        $response->assertStatus(503);
    }

    public function test_getCatDetails()
    {
        $catId = "beng";
        $mockPayload = $this->mockHelper->mockImagesData();



        Http::fake([
            "https://api.thecatapi.com/v1/breeds/" . $catId => Http::response(
                $this->mockHelper->mockCatDetailsData()
            ),
            "https://api.thecatapi.com/v1/images/search?page=0&limit=1"
                . "&breed_ids="
                . $catId
                . "&include_breeds=false" => Http::response(
                $mockPayload
            ),
        ]);

        $response = $this->get('/api/v1/details/' . $catId);

        $expected_response = $this->mockHelper->mockCatDetailsData();
        $expected_response["image"] = $mockPayload[0];

        $response->assertStatus(200)->assertExactJson(
            ["success" => true, "data" => $this->mockHelper->extractCatDetails($expected_response)]
        );
    }

    public function test_getCatDetails_failure()
    {
        $catId = "beng";

        Http::fake([
            "https://api.thecatapi.com/v1/breeds/" . $catId => Http::response(
                [],
                400
            ),
            "https://api.thecatapi.com/v1/images/search?page=0&limit=1"
                . "&breed_ids="
                . $catId
                . "&include_breeds=false" => Http::response(
                [],
                400
            ),
        ]);

        $response = $this->get('/api/v1/details/' . $catId);

        $response->assertStatus(503);
    }

    public function test_getCatPhotos()
    {
        $catId = "beng";

        Http::fake([
            "https://api.thecatapi.com/v1/images/search?page=0&limit=8"
                . "&breed_ids="
                . $catId
                . "&include_breeds=false" => Http::response(
                $this->mockHelper->mockImagesData()
            ),
        ]);

        $response = $this->get('/api/v1/photos/' . $catId);

        $response->assertStatus(200)->assertExactJson(
            ["success" => true, "data" => $this->mockHelper->mockImagesData()]
        );
    }

    public function test_getCatPhotos_failure()
    {
        $catId = "beng";

        Http::fake([
            "https://api.thecatapi.com/v1/images/search?page=0&limit=8"
                . "&breed_ids="
                . $catId
                . "&include_breeds=false" => Http::response(
                [],
                400
            ),
        ]);

        $response = $this->get('/api/v1/photos/' . $catId);

        $response->assertStatus(503);
    }

    public function test_getBreedList()
    {
        Http::fake([
            "https://api.thecatapi.com/v1/breeds/" => Http::response(
                $this->mockHelper->mockCatBreedData()
            )
        ]);

        $response = $this->get('/api/v1/breedlist');

        $expected_response = array_map(function ($a) {
            return $this->mockHelper->extractBreedDetails($a);
        }, $this->mockHelper->mockCatBreedData());

        $response->assertStatus(200)->assertExactJson(
            ["success" => true, "data" => $expected_response]
        );
    }

    public function test_getBreedList_failure()
    {
        Http::fake([
            "https://api.thecatapi.com/v1/breeds/" => Http::response(
                [],
                400
            )
        ]);

        $response = $this->get('/api/v1/breedlist');

        $response->assertStatus(503);
    }
}
