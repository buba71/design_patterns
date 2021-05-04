<?php

declare(strict_types=1);

use App\adapter\EmailNotification;
use App\adapter\SlackNotificationAdapter;
use App\adapter\SlackApi;
use App\adapter\NotificationInterface;

/**
 ***********************************************************
 * ADAPTER PATTERN
 ***********************************************************
 */

/**
* CLient needs to send notifications to other services but only send Email notifications for this moment.
* We need to send Slack notifications too. How to build this? ===> ADAPTER!!
*
* The client code can work with any class that follows the Notification interface.
* @param Notification $notification
* 
* @return void
*/
function clientCode(NotificationInterface $notification): void
{
    // ...

    echo $notification->send("Website is down!",
        "<strong style='color:red;font-size: 50px;'>Alert!</strong> " .
        "Our website is not responding. Call admins and bring it up!");

    // ...
}

 echo "<h4>Client code is designed correctly and works with email notifications</h4>";
 $notification = new EmailNotification("refactor@guru.com");
 clientCode($notification);


 echo '<h4>The same client code can work with other classes via adapter</h4>';
 $slackApi = new SlackApi('XXXXXXXX', 'doe@refactor.com');
 $notification = new SlackNotificationAdapter($slackApi, 'A chat Id example');
 clientCode($notification);