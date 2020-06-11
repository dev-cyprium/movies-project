<?php

namespace Lib\Middleware\Util;

/**
 * Used in tests to provide empty middleware
 */
trait EmptyMiddleware
{
  public function call($req, $next)
  {
    return $next($req);
  }
}
