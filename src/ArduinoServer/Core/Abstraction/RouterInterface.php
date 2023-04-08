<?php

declare(strict_types=1);

namespace ArduinoServer\Core\Abstraction;

use ArduinoServer\Core\Http\Abstraction\HttpRequestInterface;

interface RouterInterface {

    public function handleRequest(HttpRequestInterface $request): void;
}
