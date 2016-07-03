<?php 

namespace Sammy\Server;

class ServiceAvailabilityController extends CoreModuleController
{

    private $model;
    private $availabilities;

    public function __construct() {
        parent::__construct();
        $this->model = new ServiceAvailabilityModel;
        $this->availabilities = $this->model->getAvailabilities();
    }

    public function render() {
        return $this->app['twig']->render('serviceAvailability.html.twig', array(
            'availabilities' => $this->availabilities
        ));
    }

}
