<?php

declare(strict_types = 1);

use App\observer\Publisher\ConcertsPlanner;
use App\observer\Observers\Fan;
use App\observer\Observers\Fan2;

require_once('vendor/autoload.php');
ini_set('display_errors', '1');

echo "<h1> This is the observer pattern result</h1>";

$concertsPlanner = new ConcertsPlanner();

$fan = new Fan();
$fan2 = new Fan2();

$concertsPlanner->attach($fan);
$concertsPlanner->attach($fan2);

$concertsPlanner->plan('Coldplay', null,  'Marseille');

