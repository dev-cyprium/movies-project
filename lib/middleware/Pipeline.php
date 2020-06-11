<?php

namespace Lib\Middleware;

use Lib\Middleware\Processable;

class Pipeline
{
  /**
   * @var Processable
   */
  private $processable;

  public function __construct(Processable $processable)
  {
    $this->processable = $processable;
  }

  /**
   * Pipes a request through the chain
   */
  public function handle($passable)
  {

    $pipeline = array_reduce(
      array_reverse($this->processable->tasks()),
      $this->carry(),
      function ($passable) {
        return $passable;
      }
    );

    return $pipeline($passable);
  }

  private function carry()
  {
    return function ($stack, $task) {
      return function ($passable) use ($stack, $task) {
        return $task->call($passable, $stack);
      };
    };
  }
}
