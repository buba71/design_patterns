<?php

declare(strict_types = 1);

use App\observer\Publisher\ConcertsPlanner;
use App\observer\Observers\Fan;
use App\observer\Observers\Fan2;
use App\decorator\decorators\BaseDecorator;
use App\decorator\BaseComponent;
use App\decorator\decorators\EmailNotifierDecorator;
use App\decorator\decorators\SMSNotifierDecorator;

require_once('vendor/autoload.php');

ini_set('display_errors', '1');
error_reporting(E_ALL);

/**
 ***********************************************************
 * OBSERVER PATTERN
 ***********************************************************
 *  */
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
 *  */
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





