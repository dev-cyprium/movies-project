<?php

namespace Lib;

abstract class Application 
{
  /**
   * Where to find the router for the application
   */
  protected $routesPath = APP_ROOT . "/src/router.php";
  
  /**
   * Entry point for the PHP application
   */
  public function run()
  {
    $this->loadRoutes();
  }

  private function loadRoutes()
  {
    require_once $this->routesPath;
  }
}
