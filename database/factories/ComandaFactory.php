<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Comanda>
 */
class ComandaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $price = $this->faker->numberBetween(1, 100);

        return [
            'product' => $this->faker->word(),
            'amount' => $this->faker->numberBetween(1, 10),
            'address' => $this->faker->address(),
            'price' => $price,
            'priceIva' => ($price*1.21)
        ];
    }
}
