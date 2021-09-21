<?php

declare(strict_types = 1);

ini_set('display_errors', '1');
error_reporting(E_ALL);

require_once('vendor/autoload.php');

echo "<h2>1-Observer pattern results</h2>";
require_once('src/observer/main.php');

echo "<h2>2-Decorator pattern results</h2>";
require_once('src/decorator/main.php');

echo '<h2>3-Adapter pattern results</h2>';
require_once('src/adapter/main.php');

echo '<h2>4-Memento pattern results</h2>';
require_once('src/memento/main.php');

echo '<h2>5-Façade pattern results</h2>';
require_once('src/facade/main.php');
