<?php

declare(strict_types = 1);

namespace App\adapter;

final class SlackNotificationAdapter implements NotificationInterface
{
  private SlackApi $slack;
  private string $chatId;

  public function __construct(SlackApi $slack, string $chatId)
  {
    $this->slack = $slack;
    $this->chatId = $chatId;
  }

  public function send(string $title, string $message)
  {
    $slackMessage = "#" . $title . "#" . strip_tags($message);
    $this->slack->login();
    $this->slack->sendMessage($this->chatId, $message);   
  }
}