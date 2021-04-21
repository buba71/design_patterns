<?php

declare(strict_types = 1);

namespace App\adapter;

final class SlackApi
{
  private string $apiKey;
  private string $login;

  public function __construct(string $apiKey, string $login)
  {
    $this->apiKey = $apiKey;
    $this->login = $login;
  }

  public function login()
  {
    // Send authentication to slack web service.
    echo nl2br("login in to a slack account with '$this->login' and '$this->apiKey' Key \n");
  }

  public function sendMessage(string $chatId, string $message)
  {
    // Send message post request to Slack web service.
    echo nl2br("Posted following message into the slack channel '$chatId' with message '$message' \n");
  }

}