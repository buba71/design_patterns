<?php

declare(strict_types=1);

namespace App\memento;


use App\memento\memento\ConcreteMemento;
use App\memento\memento\Memento;

final class Originator 
{

  private $state;  

  public function setState($state) 
  {
    $this->state = $state;
  }

  public function getState() 
  {
    return $this->state;
  }

  /**
   * @return Memento
   */
  public function saveToMemento(): Memento
  {
    // Save state set to create a memento object.
    return new ConcreteMemento($this->state);
  }

  /**
   * @param Memento $memento
   * 
   * @return void
   */
  public function restoreFromMemento(Memento $memento): void
  {
    $this->state = $memento->getState();
  }



}