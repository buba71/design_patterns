<?php

declare(strict_types=1);

namespace App\proxy\Service;

/**
 * The Real Subject does the real job, albeit not in the most efficient way.
 * When a client tries to download the same file for the second time, our
 * downloader does just that, instead of fetching the result from cache.
 */
class SimpleDownloader implements Downloader
{
    /**
     * @param string $url
     * 
     * @return string
     */
    public function download(string $url): string
    { 
        echo nl2br("Downloading a file from the Internet.\n");    
        $result= file_get_contents($url);
        echo nl2br("Downloaded bytes: " .strlen($result) . "\n");

        return $result;
    }
}