<?php

namespace App\Database;

use Illuminate\Database\Eloquent\Factories\Factory;

class BaseFactory extends Factory
{
    public function definition(): array
    {
        return [];
    }

    public static function factoryForModel(string $modelName): BaseFactory
    {
        return self::new();
    }
}
