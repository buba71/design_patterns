<?php

declare(strict_types = 1);

namespace App\decorator;

/**
 * Interface NotifierDecoratorInterface
 */
interface NotifierDecoratorInterface {

    /**
     * @return void
     */
    public function notify(): void;
}