<?php


namespace App;

use App\Classes\Vehicles\Bus;
use App\Classes\Vehicles\Car;
use App\Classes\Vehicles\Truck;
use App\Classes\Employee;
use App\Classes\TollStation;

class Application
{
    /**
     * Execute task.
     */
    public function boot()
    {
        // set time/zone of app
        date_default_timezone_set('Europe/Belgrade');

        // create vehicles, station and employees
        $carBMW = new Car('BMW', 'M5', 'white');
        $truckMAN = new Truck('MAN', 'D26', 'white', false);
        $truckScania = new Truck('Scania', 'S730', 'grey', true);
        $busVolvo = new Bus('Volvo', '9400', 'blue');

        $tollStation = TollStation::getInstance();

        $employeePetar = new Employee($tollStation, 'Petak', 'Markovic');
        $employeeDragan = new Employee($tollStation, 'Dragan', 'Petrovic');

        // Charge pass by employees
        $employeePetar->charge($carBMW);
        $employeePetar->charge($truckScania);
        $employeeDragan->charge($truckMAN);
        $employeeDragan->charge($busVolvo);

        echo $employeePetar->getName() . ' total: ' . $employeePetar->getTotalCharged() . PHP_EOL;
        echo $employeeDragan->getName() . ' total: ' . $employeeDragan->getTotalCharged() . PHP_EOL;
        echo 'Toll station total: ' . $tollStation->getTotalCharged() . PHP_EOL;
    }
}