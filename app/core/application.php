<?php 

namespace Sammy\Server;

class Application extends \Silex\Application
{

    public $settings;

    public function __construct($settingsFile, array $values = array()) {
        parent::__construct($values);

        $this->settings = new Settings($settingsFile);
    }

    public function moduleEnabled($module) {
        return $this->settings->modules->$module;
    }
}
