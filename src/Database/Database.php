<?php

namespace JasonVanLoon\MiniSentry\Database;

use Illuminate\Database\Capsule\Manager as Capsule;
use Illuminate\Events\Dispatcher;
use Illuminate\Container\Container;

final class Database
{
    private Capsule $capsule;

    public function __construct(array $config)
    {
        // Create the capsule connection
        $this->capsule = new Capsule();
        $this->capsule->addConnection($config);

        // Configure capsule settings
        $this->capsule->setEventDispatcher(new Dispatcher(new Container()));
        $this->capsule->setAsGlobal();
        $this->capsule->bootEloquent();
    }

    public function getCapsule(): Capsule
    {
        return $this->capsule;
    }
}
