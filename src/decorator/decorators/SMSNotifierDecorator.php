<?php

declare(strict_types = 1);

namespace App\decorator\decorators;

use App\decorator\ComponentInterface;
use App\decorator\NotifierDecoratorInterface;
use App\decorator\decorators\BaseDecorator;

/**
 * Class SMSNotifier
 */
final class SMSNotifierDecorator extends BaseDecorator
{
    /**
     * @return void
     */
    public function notify(): void
    {
        parent::notify();
        $this->sendSMS();
    }

    /**
     * @return void
     */
    public function sendSMS(): void
    {
        echo nl2br("Sending SMS...\n" );
    }
}