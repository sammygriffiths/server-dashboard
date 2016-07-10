<?php 

namespace Griff\Server\ServiceStatus\Models;

use JJG\Ping;

class ServiceStatusModel extends \Griff\Server\CoreModuleModel
{

    private $ping;

    public function __construct() {
        parent::__construct();
        $this->ping = new Ping($this->app->settings->get('domain'));
    }

    public function checkStatus($service) {
        $serviceHost = null !== $this->app->settings->service($service, 'domain') ? $this->app->settings->get('domain') : $this->app->settings->service($service, 'domain');
        $servicePort = $this->app->settings->service($service, 'port');

        $this->ping->setHost($serviceHost);
        if (false === empty($servicePort)) {
            $this->ping->setPort($servicePort);
        }

        $result = $this->ping->ping('fsockopen');

        return (false === $result) ? false : true;
    }

    public function getServices() {
        $serviceSettings = $this->app->settings->all()->services;
        $services = array();

        foreach ($serviceSettings as $service => $settings) {
            $services[$service] = $settings;
            $services[$service]->live = $this->checkStatus($service);

            if (false === isset($services[$service]->domain)) {
                $services[$service]->domain = $this->app->settings->get('domain');
            }
        }

        return $services;
    }
}
