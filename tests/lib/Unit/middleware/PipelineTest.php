<?php

use Lib\Middleware\Processable;
use Lib\Middleware\Middleware;
use Lib\Middleware\Pipeline;
use PHPUnit\Framework\TestCase;

class TimesTwoMiddleware extends Middleware
{
  public function call($request, $next)
  {
    return $next($request * 2);
  }
}

class AddTwoMiddleware extends Middleware
{
  public function call($request, $next)
  {
    return $next($request + 2);
  }
}

class MiddlewareStack implements Processable
{
  public function tasks() {
    return [
      new TimesTwoMiddleware(),
      new AddTwoMiddleware()
    ];
  }
}

final class PipelineTest extends TestCase
{
  public function testWorksOnAGivenPipeline()
  {
    $pipeline = new Pipeline(new MiddlewareStack());
    $result = $pipeline->handle(10);

    $this->assertEquals(22, $result);
  }
}
