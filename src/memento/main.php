<?php

declare(strict_types=1);


use App\memento\Originator;
use App\memento\Caretaker;
use App\memento\Memento;

/**
 * ********************************************
 *  MEMENTO PATTERN in action
 * ********************************************
 */


$originator = new Originator();
$caretaker = new Caretaker($originator);

$originator->setState('foo'); // state object may be initiate by a constructor too.
echo nl2br('Current state: ' . $originator->getState() . "\n");

//Procedure: Originator sets state, saves state to Memento,
//Join Memento to the CareTaker queue
$caretaker->addMemento($originator->saveToMemento());

$originator->setState('foo2');
echo nl2br('Current state: ' . $originator->getState() . "\n");
$caretaker->addMemento($originator->saveToMemento());

$originator->setState('foo3');
echo nl2br('Current state: ' . $originator->getState() . "\n");
$caretaker->addMemento($originator->saveToMemento());

// Get the Memento object from Caretaker and put the state of the Memento object.
// Assigned to Originator.
echo '<h4>Get the previous state</h4>';
$originator->restoreFromMemento($caretaker->pullMemento());
echo nl2br('Current state: ' . $originator->getState() . "\n");