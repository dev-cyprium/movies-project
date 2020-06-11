<?php

use Lib\Middleware\Middleware;
use Lib\Middleware\MiddlewareFactory;
use Lib\Middleware\Util\EmptyMiddleware;
use PHPUnit\Framework\TestCase;

class AMiddleware extends Middleware
{
  use EmptyMiddleware;
}

class BMiddleware extends Middleware
{
  use EmptyMiddleware;
}

final class MiddlewareFactoryTest extends TestCase
{
  public function testCreatesMiddlewareInstancesFromClassList()
  {
    $classList = [
      AMiddleware::class,
      '\BMiddleware'
    ];

    $processable = MiddlewareFactory::from($classList);

    $this->assertInstanceOf(AMiddleware::class, $processable->tasks()[0]);
    $this->assertInstanceOf(BMiddleware::class, $processable->tasks()[1]);
  }
}
