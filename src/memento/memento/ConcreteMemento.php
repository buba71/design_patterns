<?php

declare(strict_types=1);

namespace App\memento\memento;

/**
 * Memento can implement an interface Memento.
 */
final class ConcreteMemento implements Memento
{
  /**
   * @var mixed
   */
  private $state;

  /**
   * @var string
   */
  private string $date;

  /**
   * @param mixed $state
   */
  public function __construct($state)
  {
    $this->date = date('Y-m-d H:i:s');
    $this->state = $state;
  }

  /**
   * @return string
   */
  public function getDate(): string
  {
    return $this->date;
  }

  /**
   * @return $state
   */
  public function getState(): string
  {
    return $this->state;
  }
}