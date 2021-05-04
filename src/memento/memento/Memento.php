<?php

declare(strict_types=1);

namespace App\Memento\memento;

interface Memento
{
  /**
   * return string
   */
  public function getDate(): string;
}