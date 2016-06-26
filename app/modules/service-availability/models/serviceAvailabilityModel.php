<?php 

namespace Sammy\Server;

use JJG\Ping;

class ServiceAvailabilityModel extends CoreModuleModel
{

    private $ping;

    public function __construct() {
        parent::__construct();
        $this->ping = new Ping($this->app->settings->get('ip'));
    }

    public function checkAvailability($service) {
        $serviceHost = (empty($this->app->settings->service($service, 'ip'))) ? $this->app->settings->get('ip') : $this->app->settings->service($service, 'ip');
        $servicePort = $this->app->settings->service($service, 'port');

        $this->ping->setHost($serviceHost);
        $this->ping->setPort($servicePort);

        $result = $this->ping->ping('fsockopen');

        return (false === $result) ? false : true;
    }
}
