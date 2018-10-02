<?php
/* Class simply creates the objects that you want to use. Below code uses AutomobileFactory class to create Automobile object. 
 * If you want to change something or rename something in Automobile class, you  would only have to chnage in Factory, instead of all the files
 * which uses Automobile class. creating an object is complicated job so have it at only place only.
 */

class Automobile {
    private $make;
    private $model;

    public function __construct($make, $model) {
        $this->make = $make;
        $this->model = $model;
    }

    public function getMakeAndModel() {
        return $this->make . ' - ' . $this->model;
    }
}

class AutomobileFactory {
    public static function create($make, $model) {
        return new Automobile($make, $model);
    }
}

//have factory to create Automobile object
$car = AutomobileFactory::create('Bugatti', 'Veyron');

print_r($car->getMakeAndModel());

?>