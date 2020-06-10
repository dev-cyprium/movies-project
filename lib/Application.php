<?php

namespace Lib;

abstract class Application
{
  /**
   * Sets the path for the router
   */
  protected function routerPath()
  {
    return $this->getApplicationRoot() . "/src/router.php";
  }

  /**
   * Entry point for the PHP application
   */
  public function run()
  {
    $this->loadRoutes();
  }

  /**
   * Loads the routes from the routing path
   */
  public function loadRoutes()
  {
    require_once $this->routerPath();
  }

  /**
   * Defines application root directory
   * so we can use paths relative to it
   */
  public final function getApplicationRoot()
  {
    return dirname(dirname(__FILE__));
  }
}
