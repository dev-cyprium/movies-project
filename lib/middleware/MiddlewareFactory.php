<?php

namespace Lib\Middleware;

class MiddlewareFactory
{
  public static function from($middlewareClassList): Processable
  {
    $instances = self::instatiate($middlewareClassList);
    return new MiddlewareStack($instances);
  }

  private static function instatiate($middlewareClassList)
  {
    return array_map(function($class) {
      return new $class;
    }, $middlewareClassList);
  }
}
