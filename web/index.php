<?php

require_once __DIR__.'/../app/config/bootstrap.php';

$app->get('/', 'Sammy\Server\DashboardController::index');

$app->run();
