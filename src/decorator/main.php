<?php

declare(strict_types=1);

use App\decorator\decorators\BaseDecorator;
use App\decorator\BaseComponent;
use App\decorator\decorators\EmailNotifierDecorator;
use App\decorator\decorators\SMSNotifierDecorator;

/**
 ***********************************************************
 * DECORATOR PATTERN in action  index
 ***********************************************************
 */


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