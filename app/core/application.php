<?php 

namespace Griff\Server;

class Application extends \Silex\Application
{

    public $settings;
    public $modules;

    public function __construct($settingsFile, array $values = array()) {
        parent::__construct($values);

        $this->settings = new Settings($settingsFile);
    }

    public function moduleEnabled($module) {
        return $this->settings->get('modules')->$module;
    }

    public function getEnabledModules() {
        $enabledModules = array();

        foreach ($this->settings->get('modules') as $module => $enabled) {
            if ($enabled) {
                $enabledModules[] = $module;
            }
        }

        return $enabledModules;
    }
}
