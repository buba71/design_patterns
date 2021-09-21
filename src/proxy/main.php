<?php

declare(strict_types=1);

use App\proxy\Service\Downloader;
use App\proxy\Service\SimpleDownloader;
use App\proxy\Proxy\CachingDownloader;
/**
 * The client code may issue several similar download requests. In this case,
 * the caching proxy saves time and traffic by serving results from cache.
 *
 * The client is unaware that it works with a proxy because it works with
 * downloaders via the abstract interface.
 */
function proxyClientCode(Downloader $subject)
{
    // ...

    $result = $subject->download("https://example.com/");

    // Duplicate download requests could be cached for a speed gain.

    $result = $subject->download("https://example.com/");

    // ...
}

echo "Executing client code with real subject:\n";
$realSubject = new SimpleDownloader();
proxyClientCode($realSubject);

echo "\n";

echo "Executing the same client code with a proxy:\n";
$proxy = new CachingDownloader($realSubject);
proxyClientCode($proxy);