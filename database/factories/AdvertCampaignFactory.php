<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\AdvertCampaign>
 */
class AdvertCampaignFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            "user_id"=>"2",
            "name"=>fake()->name("male"),
            "total_budget"=>fake()->numberBetween(100,800000000),
            "daily_budget"=>fake()->numberBetween(100,800000000),
            "creative_upload"=>"imagefilehere"            
        ];
    }
}
