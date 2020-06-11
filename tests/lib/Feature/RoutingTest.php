<?php

use Lib\Application;
use Lib\Routes\Router;
use PHPUnit\Framework\TestCase;

class MockApp extends Application
{
  protected function routerPath()
  {
    return $this->getApplicationRoot() . "/tests/lib/feature/mocks/router.php";
  }
}

final class RoutingTest extends TestCase
{
  public function testParsesTheRoutingFile()
  {
    $app = new MockApp();
    $app->loadRoutes();

    $this->assertEquals(
      ["/foo", "/bar", "/baz"],
      Router::instance()->listRoutes()
    );

    $this->assertTrue(true);
  }
}
