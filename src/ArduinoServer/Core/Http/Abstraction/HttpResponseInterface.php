<?php

declare(strict_types=1);

namespace ArduinoServer\Core\Http\Abstraction;

interface HttpResponseInterface {

    /**
     * Sends the constructed HTTP response
     */
    public function send(): void;
}
