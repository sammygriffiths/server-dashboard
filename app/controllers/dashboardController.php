<?php 

namespace Sammy\Server;

use Symfony\Component\HttpFoundation\Request;

class DashboardController extends CoreController
{
    public $model;

    public function index(Request $request, Application $app) {

        $test = new ServiceAvailabilityController;
        echo "<pre>"; var_dump($test->getAvailabilities()); exit;

        return $app['twig']->render('dashboard.html.twig');
    }

}
