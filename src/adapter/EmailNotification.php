<?php

declare(strict_types = 1);

namespace App\adapter;

final class EmailNotification implements NotificationInterface
{
  private string $adminEmail;

  public function __construct(string $email)
  {
    $this->adminEmail = $email;
  }

  public function send(string $title, string $message)
  {
    mail($this->adminEmail, $title, $message); // Throw an error warning because smtp not setted.
    echo "Sent email with title '$title' to '$this->adminEmail' that says '$message'";        
  }
}