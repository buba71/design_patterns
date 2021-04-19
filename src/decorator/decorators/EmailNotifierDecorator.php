<?php

declare(strict_types = 1);

namespace App\decorator\decorators;

use App\decorator\ComponentInterface;
use App\decorator\NotifierDecoratorInterface;
use App\decorator\decorators\BaseDecorator;

/**
 * Class EmailNotifier
 */
final class EmailNotifierDecorator extends BaseDecorator
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
        echo nl2br("sending Email...\n");
    }
}