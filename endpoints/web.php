<?php

use Src\Actions\HomeAction;
use Src\Actions\LoginAction;

/** @var \System\Router $router */

$router->get('/', HomeAction::class);
