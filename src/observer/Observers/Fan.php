<?php

declare(strict_types = 1);

namespace App\observer\Observers;

final class Fan implements \SplObserver
{
    /**
     * @return string
     */
    public function getLocation(): string
    {
        return 'Marseille';
    }

    /**
     * @return array
     */
    public function getFollowedGroups(): array
    {
        return [
            'RadioHead',
            'Coldplay',
            'Muse'
        ];
    }

    public function update(\SplSubject $subject)
    {
        $state = $subject->getState();

        if(in_array($state['group'], $this->getFollowedGroups()) && $state['location'] === $this->getLocation()) {
            echo nl2br("concert planned notification\n");
        }
    }
}