<?php

declare(strict_types=1);

namespace App\facade;

use App\facade\facade\YoutubeDownloader;


/**
 * ********************************************
 *  FACADE PATTERN in action
 * ********************************************
 */

 function clientCode(YoutubeDownloader $facade)
 {
    $facade->downloadVideo("https://www.youtube.com/watch?v=QH2-TGUlwu4");
 }

$facade = new YoutubeDownloader("");
clientCode($facade);