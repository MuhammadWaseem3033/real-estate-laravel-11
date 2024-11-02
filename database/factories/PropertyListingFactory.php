<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\PropertyFeature;
use App\Models\PropertyStatus;
use App\Models\PropertyType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PropertyListing>
 */
class PropertyListingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'title' => $this->faker->name,
            'price' => 1000,
            'bedrooms' => 3,
            'bathrooms' => 2,
            'area_sqft' => 1239,
            'description'=> 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Maxime, excepturi?',
            'location'=>'dgkjan',
            'year_built'=>'2020',
            'status'=> 'for_sale' ,
            'property_type_id'=> PropertyType::inRandomOrder()->first()->id,
            'featured_id'=> PropertyFeature::inRandomOrder()->first()->id,
            'cat_id'=> Category::inRandomOrder()->first()->id,
            'user_id'=> 1
        ];
    }
}
