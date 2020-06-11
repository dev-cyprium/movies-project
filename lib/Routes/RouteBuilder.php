<?php

namespace  Lib\Routes;

/**
 * Used by the consumer to draw the routes of
 * the application.
 */
class RouteBuilder
{
  private $routingTable = [];

  /**
   * Adds a new GET route to the server at the given uri
   */
  public function get($uri, $controller, $method)
  {
    $this->addRouteInfo($uri, $controller, $method, 'get');
  }

  private function addRouteInfo($uri, $controller, $method, $httpVerb)
  {
    $this->routingTable[$uri] = new RouteInfo($uri, $controller, $method, $httpVerb);
  }

  /**
   * List the routes in the application
   */
  public function listRoutes()
  {
    return array_keys($this->routingTable);
  }
}
