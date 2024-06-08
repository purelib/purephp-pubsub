<?php

namespace purephp\pubsub;

use purephp\pubsub\contract\Publisher;
use purephp\pubsub\contract\Subscriber;
use League\Event\EventDispatcher;

class Dispatcher implements Publisher, Subscriber
{
    protected $eventDispatcher;
    public function __construct(EventDispatcher $eventDispatcher)
    {
        $this->eventDispatcher = $eventDispatcher;
    }

    public static function newInstance(EventDispatcher $dispatcher)
    {
        $instance = new self($dispatcher);
        return self::$instance;
    }

    public function publish($topic, $message)
    {
        $event = MessageEventGenerator::newEvent($topic, $message);
        $this->eventDispatcher->dispatch($event);
    }

    public function subscribe(string $topic, callable $subscriber)
    {
        $this->eventDispatcher->subscribeTo($topic, $subscriber);
    }
}
