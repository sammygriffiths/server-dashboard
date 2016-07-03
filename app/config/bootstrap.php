<?php

require_once __DIR__.'/../vendor/autoload.php';

$app = new Griff\Server\Application(
    $settingsFile = __DIR__.'/../config/settings.json'
);

$app['debug'] = true;
error_reporting(E_ALL);

$viewsPaths = glob(__DIR__.'/..{,/modules/**}/views/{,**/}', GLOB_BRACE);

$app->register(new Silex\Provider\TwigServiceProvider(), array(
    'twig.path' => $viewsPaths,
));

$app->modules = Griff\Server\Modules::get();
