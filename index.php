<?php

declare(strict_types = 1);

use App\observer\Publisher\ConcertsPlanner;
use App\observer\Observers\Fan;
use App\observer\Observers\Fan2;
use App\decorator\decorators\BaseDecorator;
use App\decorator\BaseComponent;
use App\decorator\decorators\EmailNotifierDecorator;
use App\decorator\decorators\SMSNotifierDecorator;
use App\adapter\EmailNotification;
use App\adapter\SlackNotificationAdapter;
use App\adapter\SlackApi;
use App\adapter\NotificationInterface;

require_once('vendor/autoload.php');

ini_set('display_errors', '1');
error_reporting(E_ALL);

/**
 ***********************************************************
 * OBSERVER PATTERN
 ***********************************************************
 */
echo "<h2>Observer pattern results</h2>";

$concertsPlanner = new ConcertsPlanner();

$fan1 = new Fan();
$fan2 = new Fan2();

$concertsPlanner->attach($fan1);
$concertsPlanner->attach($fan2);

$concertsPlanner->plan('Coldplay', null,  'Marseille');


/**
 ***********************************************************
 * DECORATOR PATTERN
 ***********************************************************
 */
echo "<h2>Decorator pattern results</h2>";

// Use base component notifier.
echo '<h4>Notify with base component only</h4>';
$notifier = new BaseComponent();

$notifier->notify();

// Use all notifiers.
echo '<h4>Full notifier</h4>';

$notifier = new EmailNotifierDecorator(new BaseComponent());
$notifier = new SMSNotifierDecorator($notifier);

$notifier->notify();

// Use sms notifier only.
echo '<h4>Sms notifier only</h4>';
$notifier = new BaseComponent();
$notifier = new SMSNotifierDecorator($notifier);

$notifier->notify();

// Use email notifier only.
echo '<h4>Email notifier only</h4>';
$notifier = new BaseComponent();
$notifier = new EmailNotifierDecorator($notifier);

$notifier->notify();

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





