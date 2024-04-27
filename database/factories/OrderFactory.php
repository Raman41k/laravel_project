<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Service;
use App\Models\User;
use App\Models\Worker;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Order>
 */
class OrderFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $company_count = Company::count();
        $worker_count = Worker::count();
        $user_count = User::count();
        $service_count = Service::count();

        return [
            'company_id' => $this->faker->numberBetween(1, $company_count),
            'worker_id' => $this->faker->numberBetween(1, $worker_count),
            'user_id' => $this->faker->numberBetween(1, $user_count),
            'service_id' => $this->faker->numberBetween(1, $service_count),
            'timeslot' => $this->faker->date(),
            'price' => $this->faker->numberBetween(100, 1000),
        ];
    }
}
