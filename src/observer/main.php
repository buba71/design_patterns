<?php

declare(strict_types=1);

use App\observer\Publisher\ConcertsPlanner;
use App\observer\Observers\Fan;
use App\observer\Observers\Fan2;

/**
 ***********************************************************
 * OBSERVER PATTERN behavior in action index
 ***********************************************************
 */

$concertsPlanner = new ConcertsPlanner();

$fan1 = new Fan();
$fan2 = new Fan2();

$concertsPlanner->attach($fan1);
$concertsPlanner->attach($fan2);

$concertsPlanner->plan('Coldplay', null,  'Marseille');
