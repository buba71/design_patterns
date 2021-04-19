<?php

declare(strict_types = 1);

namespace App\decorator\decorators;

use App\decorator\ComponentInterface;

/**
 * Class Client
 * This class is the class who need to be decorate
 */
class BaseDecorator implements ComponentInterface
{
    /**
     * @var ComponentInterface
     */
    private ComponentInterface $component;

    public function __construct(ComponentInterface $component)
    {
        $this->component = $component;
    }

    /**
     * @return 
     */
    public function notify()
    {
        return $this->component->notify();
    }
}