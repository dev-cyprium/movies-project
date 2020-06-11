<?php

namespace Lib\Middleware;

abstract class Middleware
{
  public abstract function call($request, Middleware $next);
}
