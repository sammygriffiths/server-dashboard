<?php 

namespace Griff\Server\ServiceStatus\Controllers;

class ServiceStatusController extends \Griff\Server\CoreModuleController
{

    private $statuses;

    public function __construct() {
        parent::__construct();
        $this->services = $this->model->getServices();
    }

    public function render() {
        return $this->app['twig']->render('serviceStatus.html.twig', array(
            'services' => $this->services
        ));
    }

}
