<?php

namespace App\Classes\Vehicles;

class Truck extends Vehicle
{
    protected $trailer;

    public function __construct(string $brand, string $model, string $color, bool $trailer = false)
    {
        parent::__construct($brand, $model, $color);

        $this->trailer = $trailer;
        $this->price = $trailer ? 450 : 350;
    }
}