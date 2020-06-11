<?php

namespace Lib;

use Lib\Middleware\Common\DispatchController;
use Lib\Middleware\Common\InitializeSession;
use Lib\Middleware\MiddlewareFactory;
use Lib\Middleware\Pipeline;

abstract class Application
{
  /**
   * @var string[]
   */
  private $middleware = [
    InitializeSession::class,
    DispatchController::class
  ];

  /**
   * Entry point for the PHP application
   */
  public function run()
  {
    $this->loadRoutes();
    $this->handleRequest();
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

  /**
   * Sets the path for the router
   */
  protected function routerPath()
  {
    return $this->getApplicationRoot() . "/src/router.php";
  }

  private function handleRequest()
  {
    $pipeline = new Pipeline(MiddlewareFactory::from($this->middleware));
  }
}
