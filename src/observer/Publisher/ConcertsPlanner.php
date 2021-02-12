<?php

declare(strict_types = 1);

namespace App\observer\Publisher;

/**
 * [Description ConcertsPlanner]
 */
final class ConcertsPlanner implements \SplSubject
{
    /**
     * @var array
     */
    private \SplObjectStorage $observers;

    /**
     * @var string
     */
    private array $state;


    public function __construct()
    { 
        $this->observers = new \SplObjectStorage();
    }

    /*
     * @param \SplObserver $observer
     * 
     * @return void
     */
    public function attach(\SplObserver $observer): void
    {
        $this->observers->attach($observer);
    }

    /**
     * @param \SplObserver $observer
     * 
     * @return void
     */
    public function detach(\SplObserver $observer): void
    {
        $this->observers->detach($observer);
    }

    /**
     * @return string state
     */
    public function getState(): array
    {
        return $this->state;
    }

    /**
     * @param string $groupName
     * @param \DateTime $date
     * @param string $location
     * 
     * @return [type]
     */
    public function plan(string $groupName, $date, string $location)
    {
        $this->state = [
            'group'     => $groupName,
            'date'      => date('d/m/Y'),
            'location'  => $location
        ];

        $this->notify();

    }

    /**
     * @return void
     */
    public function notify(): void
    {
        foreach($this->observers as $observer) {
            echo nl2br("hello\n");
            $observer->update($this); 
        }
    }
}
