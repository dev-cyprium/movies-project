<?php

use App\Controllers\PageController;
use Lib\Routes\Router;

Router::draw(function($router) {
  $router->get("/hello", PageController::class, "hello");
});
