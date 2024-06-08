<?php


namespace purephp\pubsub;

use purephp\pubsub\contract\MessageObject;
use Illuminate\Contracts\Support\MessageBag;
use League\Event\HasEventName;

class MessageEventGenerator implements HasEventName, MessageObject
{
    private $topic;
    private $message;
    public function __construct($topic, $message)
    {
        $this->topic = $topic;
        $this->message = $message;
    }

    public static function newEvent($topic, $message)
    {
        return new static($topic, $message);
    }

    public function eventName(): string
    {
        return $this->topic;
    }

    function getTopic() : string {
        return $this->topic;
    }

    function getMessage() {
        return $this->message;
    }
    
}