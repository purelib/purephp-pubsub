<?php

namespace purephp\pubsub\contract;

interface MessageObject
{
    public function getTopic(): string;
    public function getMessage();
}
