<?php

namespace purephp\pubsub\facade;

use purephp\pubsub\Dispatcher as PubsubDispatcher;
use League\Event\EventDispatcher;

class Dispatcher
{
    protected static $instance;
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = PubsubDispatcher::newInstance(new EventDispatcher);
        }

        return self::$instance;
    }

    public static function publish($topic, $message)
    {
        self::getInstance()->publish($topic, $message);
    }

    public static function subscribe(string $topic, callable $subscriber)
    {
        self::getInstance()->subscribe($topic, $subscriber);
    }
}
