<?php

namespace App\Classes;

use App\Classes\Vehicles\Vehicle;
use App\Traits\CanLog;

class Employee
{
    use CanLog;

    /**
     * @var TollStation
     */
    protected $station;

    /**
     * @var string
     */
    protected $name;

    /**
     * @var string
     */
    protected $surname;

    /**
     * @var int
     */
    protected $totalCharged = 0;

    /**
     * Employee constructor.
     * @param TollStation $station
     * @param string $name
     * @param string $surname
     */
    public function __construct(TollStation $station, string $name, string $surname)
    {
        $this->station = $station;
        $this->name = $name;
        $this->surname = $surname;
    }

    /**
     * Charge for passed vehicle, add charged price to employee total sum
     * and to toll station instance.
     *
     * @param Vehicle $vehicle
     */
    public function charge(Vehicle $vehicle)
    {
        $charged = $vehicle->getPrice();

        $this->totalCharged += $charged;
        $this->station->addCharged($charged);

        $this->log(new Event('Naplaćena putarina za ' .
            $vehicle->getBrand() . ' ' .
            $vehicle->getModel() . ' u iznosu: ' .
            $charged));
    }

    /**
     * @return string
     */
    public function getName(): string
    {
        return "$this->name $this->surname";
    }

    /**
     * @return int
     */
    public function getTotalCharged(): int
    {
        return $this->totalCharged;
    }


}