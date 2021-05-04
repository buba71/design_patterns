<?php

declare(strict_types=1);

namespace App\memento;

final class Caretaker 
{
  /**
   * @var array
   */
  private array $mementos = [];

  /**
   * @var Originator
   */
  private Originator $originator;

  public function __construct(Originator $originator) 
  {
    $this->originator = $originator;
  }

 
  /**
   * @return void
   */
  public function addMemento():void
  {
    $this->mementos[] = $this->originator->saveToMemento();
  } 

  /**
   * @param int $step
   * $step is used to access to the state history. $step = 1 by default.
   * 
   * @return Memento
   */
  public function pullMemento($step = 1)
  {
    if(count($this->mementos) > $step) {
      $ret_memento = '';
      for($i = 0; $i < $step; $i++) {
        array_pop($this->mementos);
      }
      return $this->mementos[count($this->mementos) - 1];
    }

    return $this->mementos[0];

  }

}