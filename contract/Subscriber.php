<?php

namespace purephp\pubsub\contract;

interface Subscriber
{
    // TODO 增加优先级
    public function subscribe(string $topic, callable $subscriber);
}
