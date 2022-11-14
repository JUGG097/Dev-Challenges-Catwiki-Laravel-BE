<?php

namespace App\Helpers;

class CatWikiHelpers
{

    public function extractCatDetails($obj)
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

    public function extractBreedDetails($obj)
    {
        return [
            "id" => $obj["id"],
            "name" => $obj["name"],
        ];
    }

    public function mockCatBreedData()
    {
        return array(
            [
                "weight" => ["imperial" => "7  -  10", "metric" => "3 - 5"],
                "id" => "abys",
                "name" => "Abyssinian",
                "cfa_url" => "http=>//cfa.org/Breeds/BreedsAB/Abyssinian.aspx",
                "vetstreet_url" => "http=>//www.vetstreet.com/cats/abyssinian",
                "vcahospitals_url" => "https=>//vcahospitals.com/know-your-pet/cat-breeds/abyssinian",
                "temperament" => "Active, Energetic, Independent, Intelligent, Gentle",
                "origin" => "Egypt",
                "country_codes" => "EG",
                "country_code" => "EG",
                "description" => "The Abyssinian is easy to care for, and a joy to have in your home.",
                "life_span" => "14 - 15",
                "indoor" => 0,
                "lap" => 1,
                "alt_names" => "",
                "adaptability" => 5,
                "affection_level" => 5,
                "child_friendly" => 3,
                "dog_friendly" => 4,
                "energy_level" => 5,
                "grooming" => 1,
                "health_issues" => 2,
                "intelligence" => 5,
                "shedding_level" => 2,
                "social_needs" => 5,
                "stranger_friendly" => 5,
                "vocalisation" => 1,
                "experimental" => 0,
                "hairless" => 0,
                "natural" => 1,
                "rare" => 0,
                "rex" => 0,
                "suppressed_tail" => 0,
                "short_legs" => 0,
                "wikipedia_url" => "https=>//en.wikipedia.org/wiki/Abyssinian_(cat)",
                "hypoallergenic" => 0,
                "reference_image_id" => "0XYvRd7oD",
                "image" => [
                    "id" => "0XYvRd7oD",
                    "width" => 1204,
                    "height" => 1445,
                    "url" => "https=>//cdn2.thecatapi.com/images/0XYvRd7oD.jpg",
                ],
            ],
            [
                "weight" => ["imperial" => "7  -  10", "metric" => "3 - 5"],
                "id" => "beng",
                "name" => "Bengal",
                "cfa_url" => "http=>//cfa.org/Breeds/BreedsAB/Abyssinian.aspx",
                "vetstreet_url" => "http=>//www.vetstreet.com/cats/abyssinian",
                "vcahospitals_url" => "https=>//vcahospitals.com/know-your-pet/cat-breeds/abyssinian",
                "temperament" => "Active, Energetic, Independent, Intelligent, Gentle",
                "origin" => "Egypt",
                "country_codes" => "EG",
                "country_code" => "EG",
                "description" => "The Abyssinian is easy to care for, and a joy to have in your home.",
                "life_span" => "14 - 15",
                "indoor" => 0,
                "lap" => 1,
                "alt_names" => "",
                "adaptability" => 5,
                "affection_level" => 5,
                "child_friendly" => 3,
                "dog_friendly" => 4,
                "energy_level" => 5,
                "grooming" => 1,
                "health_issues" => 2,
                "intelligence" => 5,
                "shedding_level" => 2,
                "social_needs" => 5,
                "stranger_friendly" => 5,
                "vocalisation" => 1,
                "experimental" => 0,
                "hairless" => 0,
                "natural" => 1,
                "rare" => 0,
                "rex" => 0,
                "suppressed_tail" => 0,
                "short_legs" => 0,
                "wikipedia_url" => "https=>//en.wikipedia.org/wiki/Abyssinian_(cat)",
                "hypoallergenic" => 0,
                "reference_image_id" => "0XYvRd7oD",
                "image" => [
                    "id" => "0XYvRd7oD",
                    "width" => 1204,
                    "height" => 1445,
                    "url" => "https=>//cdn2.thecatapi.com/images/0XYvRd7oD.jpg",
                ],
            ]
        );
    }

    public function mockCatDetailsData()
    {
        return [
            "weight" => ["imperial" => "7  -  10", "metric" => "3 - 5"],
            "id" => "abys",
            "name" => "Abyssinian",
            "cfa_url" => "http=>//cfa.org/Breeds/BreedsAB/Abyssinian.aspx",
            "vetstreet_url" => "http=>//www.vetstreet.com/cats/abyssinian",
            "vcahospitals_url" => "https=>//vcahospitals.com/know-your-pet/cat-breeds/abyssinian",
            "temperament" => "Active, Energetic, Independent, Intelligent, Gentle",
            "origin" => "Egypt",
            "country_codes" => "EG",
            "country_code" => "EG",
            "description" => "The Abyssinian is easy to care for, and a joy to have in your home.",
            "life_span" => "14 - 15",
            "indoor" => 0,
            "lap" => 1,
            "alt_names" => "",
            "adaptability" => 5,
            "affection_level" => 5,
            "child_friendly" => 3,
            "dog_friendly" => 4,
            "energy_level" => 5,
            "grooming" => 1,
            "health_issues" => 2,
            "intelligence" => 5,
            "shedding_level" => 2,
            "social_needs" => 5,
            "stranger_friendly" => 5,
            "vocalisation" => 1,
            "experimental" => 0,
            "hairless" => 0,
            "natural" => 1,
            "rare" => 0,
            "rex" => 0,
            "suppressed_tail" => 0,
            "short_legs" => 0,
            "wikipedia_url" => "https=>//en.wikipedia.org/wiki/Abyssinian_(cat)",
            "hypoallergenic" => 0,
            "reference_image_id" => "0XYvRd7oD"
        ];
    }

    public function mockImagesData()
    {
        return array(
            [
                "id" => "J2PmlIizw",
                "url" => "https://cdn2.thecatapi.com/images/J2PmlIizw.jpg",
                "width" => 1080,
                "height" => 1350,
            ],
            [
                "id" => "8pCFG7gCV",
                "url" => "https://cdn2.thecatapi.com/images/8pCFG7gCV.jpg",
                "width" => 750,
                "height" => 937,
            ],
        );
    }
}
