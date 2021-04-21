<?php

declare(strict_types = 1);

namespace App\adapter;

interface NotificationInterface
{
  public function send(string $title, string $message);
  
}