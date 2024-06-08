<?php

namespace purephp\pubsub\contract;

interface Publisher
{
    public function publish($topic, $message);
}
