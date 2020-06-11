<?php

namespace Lib\Routes;

class RouteInfo
{
  public $controller;
  public $uri;
  public $method;
  public $httpVerb;

  public function __construct($uri, $controller, $method, $httpVerb)
  {
    $this->uri = $uri;
    $this->controller =  $controller;
    $this->method = $method;
    $this->httpVerb = $httpVerb;
  }
}