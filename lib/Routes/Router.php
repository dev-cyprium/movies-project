<?php

namespace Lib\Routes;

use Closure;

class Router
{
  private static $instance = null;

  /**
   * @var RouteBuilder
   */
  private $routeBuilder;

  public function __construct()
  {
    $this->routeBuilder = new RouteBuilder();
  }

  public static function instance()
  {
    if (self::$instance === null) {
      self::$instance = new self();
    }

    return self::$instance;
  }

  public static function draw(Closure $callback)
  {
    $callback(self::instance()->routeBuilder);
  }

  public function listRoutes()
  {
    return $this->routeBuilder->listRoutes();
  }
}
