<?php

namespace Database\Factories;

use App\Models\Booking;
use App\Models\User;
use App\Models\Ballon;
use App\Models\FestivalDay;
use Illuminate\Database\Eloquent\Factories\Factory;

class BookingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Booking::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'customer_id' => User::factory()->create(['role' => 'user'])->id,
            'balloon_id' => Ballon::where(['capacity' => 9])->first(),
            'festival_day_id' => FestivalDay::where(['status' => 'active'])->first(),
            'special_requests' => fake()->sentence() ,
            'status' => $this->faker->randomElement(['pending', 'confirmed', 'cancelled']),
            'people_count' => $this->faker->numberBetween(1, 10),
            'created_at' => now(),
            'updated_at' => now(),
        ];
    }
}
