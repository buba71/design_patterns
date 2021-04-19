<?php

declare(strict_types = 1);

namespace App\decorator;

final class BaseComponent implements ComponentInterface
{
    /**
     * @return void
     */
    public function notify(): void
    {
        echo nl2br("Base compoment sending nofication...\n");
    }
}