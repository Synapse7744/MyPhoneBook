<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CompanyFactory extends Factory
{
    public function definition()
    {
        return [
            'nom' => $this->faker->name(),
            'rue' => Str::random(8),
            'cPostal' => rand(11111, 99999),
            'ville' => Str::random(8),
            'tel' => rand(1111111111,9999999999),
            'email' => $this->faker->unique()->email(),
        ];
    }
}