<?php

namespace Database\Factories;

use App\Models\OrderMakanan;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

class OrderMakananFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = OrderMakanan::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nama' => $this->faker->name(),
            'tlp' => '+62' . $this->faker->randomNumber([9]),
            'alamat' => $this->faker->address(),
            'menu' => 'coffee beer',
            'qty' => $this->faker->numberBetween(1, 10),
            'harga' => $this->faker->numberBetween(15000, 50000),
            'total_harga' => $this->faker->numberBetween(50000, 120000),
            'bukti_pembayaran' => Hash::make($this->faker->word()) . '.png',
        ];
    }
}
