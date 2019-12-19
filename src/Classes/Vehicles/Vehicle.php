<?php

namespace App\Classes\Vehicles;

use App\Classes\Event;
use App\Traits\CanLog;

abstract class Vehicle
{
    use CanLog;

    /**
     * @var string
     */
    protected $brand;

    /**
     * @var string
     */
    protected $model;

    /**
     * @var string
     */
    protected $price;

    /**
     * @var int
     */
    protected $color;

    public function __construct(string $brand, string $model, string $color)
    {
        $this->brand = $brand;
        $this->model = $model;
        $this->color = $color;
        $this->log(new Event("Kreiran $this->brand $this->model"));
    }

    /**
     * @return string
     */
    public function getBrand(): string
    {
        return $this->brand;
    }

    /**
     * @return string
     */
    public function getModel(): string
    {
        return $this->model;
    }

    /**
     * @return int
     */
    public function getPrice(): int
    {
        return $this->price;
    }


}