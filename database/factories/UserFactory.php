<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\User>
 */
class UserFactory extends Factory
{
    protected $model = User::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker()->name(),
            'email' => $this->faker()->unique()->email(),
            'password' => bcrypt('password'),
            'phone_number' => $this->faker()->phoneNumber(),
            'role' => 'customer',
        ];
    }
}
