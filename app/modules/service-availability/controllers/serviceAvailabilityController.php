<?php 

namespace Sammy\Server;

class ServiceAvailabilityController extends CoreModuleController
{

    private $model;

    public function __construct() {
        parent::__construct();
        $this->model = new ServiceAvailabilityModel;
    }

    public function getAvailabilities() {
        $serviceSettings = $this->app->settings->all()->services;
        $availabilities = array();

        foreach ($serviceSettings as $service => $settings) {
            if ($this->model->checkAvailability($service)) {
                $availabilities[$service] = true;
            } else {
                $availabilities[$service] = false;
            }
        }

        return $availabilities;
    }

}
