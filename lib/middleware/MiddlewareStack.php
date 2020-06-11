<?php

namespace Lib\Middleware;

class MiddlewareStack implements Processable
{
  /**
   * The middleware stack
   * @var Middleware[]
   */
  private $middleware;

  public function __construct($middleware)
  {
    $this->middleware = $middleware;
  }

  /**
   * Implemetation for the Processable interface
   */
  public function tasks()
  {
    return $this->middleware;
  }
}
