<?php

use App\Controllers\PageController;
use Lib\Routes\Router;

Router::draw(function($router) {
  $router->get("/foo", PageController::class, "foo");
  $router->get("/bar", PageController::class, "bar");
  $router->get("/baz", PageController::class, "baz");
});
