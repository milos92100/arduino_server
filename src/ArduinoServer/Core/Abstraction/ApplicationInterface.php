<?php

declare(strict_types=1);

namespace ArduinoServer\Core\Abstraction;

interface ApplicationInterface {

    /**
     * This function represents the entry point
     * of the application that implements this interface.
     */
    public function run(): void;
}
