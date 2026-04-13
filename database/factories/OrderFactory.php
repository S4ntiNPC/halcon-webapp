<?php

namespace Database\Factories;
use Illuminate\Database\Eloquent\Factories\Factory;

class OrderFactory extends Factory
{
    public function definition()
    {
        return [
            'invoice_number' => 'FAC-' . $this->faker->unique()->randomNumber(5),
            'customer_name' => $this->faker->name(),
            'customer_number' => 'CLI-' . $this->faker->randomNumber(4),
            'fiscal_data' => 'RFC: ' . strtoupper($this->faker->lexify('????')) . $this->faker->numerify('######') . 'XXX',
            'delivery_address' => $this->faker->address(),
            'notes' => $this->faker->sentence(),
            'status' => $this->faker->randomElement(['Ordered', 'In process', 'In route', 'Delivered']),
        ];
    }
}
